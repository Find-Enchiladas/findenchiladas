<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Dining_Hall_Food;
use App\Dining_Halls;
use Goutte\Client;
use Carbon\Carbon;
use DB;

class MenuScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $client = new Client();
      $crawler = $client->request('GET', 'https://aspc.pomona.edu/menu/');
      $status_code = $client->getResponse()->getStatus();
      if($status_code==200) {
          echo '200 OK<br>';
      }
      $date = substr(Carbon::today(),0,10);
      $crawler->filter('table')->last()->filter('tr')->each(function ($row) use($date) {
        $count = 0;
        $row->filter('td ul')->each(function ($node, $count) use($date) {
          $diningHall = ucwords(substr($node->parents()->parents()->attr('id'), 0, -5));
          if($diningHall == 'Cmc') {
            $diningHall = 'Collins';
          }
          $node->filter('li')->each(function ($node1) use($count, $diningHall, $date) {
            if($count == 0) {
              $meal = 'breakfast';
            }
            elseif($count == 1) {
              $meal = 'lunch';
            }
            else {
              $meal = 'dinner';
            }
            $food = $node1->text();
            echo "For ".$meal." we have ".$food." at ".$diningHall;
            echo "<br>";
            $count++;
            //$store_id = DB::table('stores')->where('sh_name', $diningHall)->value('store_id');
            $id = DB::table('dining_halls')->where('nickname', $diningHall)->value('id');
            if (Dining_Hall_Food::where('food_name', $food)->where('meal', '=', $meal)->where('dining_id', $id)->where('date_served', $date)->exists()) {
              echo $food." already exists for ".$meal." on".$date;
            }
            else {
              $entry = new Dining_Hall_Food;
              $entry->dining_id = $id;
              $entry->food_name = $food;
              $entry->meal = $meal;
              $entry->date_served = $date;
              $entry->save();
              echo $food." saved for ".$diningHall." id ".$id;
            }
          });
        });
      });
    }
}

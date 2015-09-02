<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dining_Hall_Food;
use App\Dining_Halls;
use Goutte\Client;
use Carbon\Carbon;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function search(Request $request) {
      $food_name = $request->input('food');
      $list = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food_name.'%')->get();
      return view('search', ['list' => $list, 'food' => $food_name]);
    }

    public function scrape5CMenu() {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

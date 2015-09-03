<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Message extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:messages';

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
        $twilio = new \Aloha\Twilio\Twilio(env('TWILIO_SID'), env('TWILIO_TOKEN'), env('TWILIO_NUMBER'));
      $users = DB::table('users')->get();
      foreach($users as $user) {
        $number = $user->phone;
        $name = $user->first_name;
        $phone = $user->phone;
        $favorites = DB::table('favorites')->where('user_id', $user->id)->get();
        $preferences = DB::table('dining_trans_halls')->where('user_id', $user->id)->where('preference', 1)->get();
        $message = "Hi " . $name . ", Today you can find
";
        foreach($favorites as $food) {

        //needs if statement for eliminate non-matches
          $foodNameAllCaps = strtoupper($food->food_name); //caps lock this
          $submessage = "";
          foreach($preferences as $preference) { //preference is the dining halls that they want to know about
            $hall = DB::table('dining_halls')->select('nickname')->where('id', $preference->dining_id)->get()[0]->nickname;
            //if weekend...
            //$breakfast = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'breakfast')->count(); //an integer value
            $breakfast1 = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'breakfast')->get(); //food name
            foreach($breakfast1 as $breakfast) {
              $submessage = $submessage."[".$hall." for Breakfast]
";
            }
            //$lunch = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'lunch')->count();
            $lunch1 = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'lunch')->get();
            foreach($lunch1 as $lunch) {
              $submessage = $submessage."[".$hall." for Lunch]
";
            }
            //$dinner = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'dinner')->count();
            $dinner1 = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'dinner')->get();
            foreach($dinner1 as $dinner) {
              $submessage = $submessage."[".$hall." for Dinner]
";
            }
          }
        if ($submessage != "") {
            $message = $message."
".$foodNameAllCaps." at:
";
            $message = $message.$submessage;
            }
        }
        $message = $message."
for specifics, visit findenchiladas.com/search";
        $twilio->message('+1'.$phone, $message);
      }
      echo $message;
      echo 'SENT!';
    }
}

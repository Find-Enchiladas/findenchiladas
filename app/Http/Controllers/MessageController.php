<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageController extends Controller
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

    public function sendMessage() {
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

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
        $favorites = DB::table('favorites')->where('user_id', $user->id)->get();
        $preferences = DB::table('dining_trans_halls')->where('user_id', $user->id)->where('preference', 1)->get();
        $message = "Yo. ";
        foreach($favorites as $food) {
          $foodName = $food->food_name;
          foreach($preferences as $preference) {
            $hall = DB::table('dining_halls')->select('nickname')->where('id', $preference->dining_id)->get()[0]->nickname;
            //if weekend...
            $breakfast = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'breakfast')->count();
            $breakfast1 = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'breakfast')->get();
            foreach($breakfast1 as $breakfast) {
              $message = $message.$breakfast->food_name." will be served at ".$hall." for breakfast | ";
            }
            $lunch = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'lunch')->count();
            $lunch1 = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'lunch')->get();
            foreach($lunch1 as $lunch) {
              $message = $message.$lunch->food_name." will be served at ".$hall." for lunch | ";
            }
            $dinner = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'dinner')->count();
            $dinner1 = DB::table('dining_hall_food')->where('food_name', 'LIKE', '%'.$food->food_name.'%')->where('dining_id', $preference->dining_id)->where('meal', 'dinner')->get();
            foreach($dinner1 as $dinner) {
              $message = $message.$dinner->food_name." will be served at ".$hall." for dinner | ";
            }
          }
        }
      }
      echo $message;
      $twilio->message('+18183577953', $message);
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

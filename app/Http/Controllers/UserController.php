<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Diner_Trans_Hall;
use App\Favorites;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      if(\Auth::check()) {
        return redirect('user');
      }
      return view('home');
    }

    public function showFav() {
      $favorites = DB::table('favorites')->where('user_id', \Auth::user()->id)->get();
      return view('user', ['favorites' => $favorites]);
    }

    public function storeFav(Request $request) {
      $favorite = new Favorites;
      $favorite->user_id = \Auth::user()->id;
      $favorite->food_name = $request->input('food');
      $favorite->save();
      $request->session()->flash('added-favorite', 'Favorite Added.');
      return redirect('/user');
    }

    public function deleteFavorite($id) {
      if(\Auth::check()) {
        $fav = Favorites::findOrFail($id);
        $fav->delete();

        return redirect('/user');
      }
      else {
        return redirect('/');
      }
    }

    public function settings() {
      if(\Auth::check()) {
        $settings = DB::table('users')->where('id', \Auth::user()->id)->get();
        return view('settings', ['settings' => $settings]);
      }
      else {
        return redirect('/');
      }

    }
    public function sms(Request $request) {
      if(\Auth::check()) {
        $user = \Auth::user();
        $user->smsNotify = $request->input('smsVal');
        $user->save();
        return redirect('/user/settings');


      }
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
        //if statement check for duplicates
        $user = new User;
        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->college = $request->input('college');
        $user->gender = $request->input('gender');
        if(empty($request->input('textMsg'))) {
          $user->smsNotify = 0;
        }
        else {
          $user->smsNotify = 1;
        }
        if(empty($request->input('emailMsg'))) {
          $user->emailNotify = 0;
        }
        else {
          $user->emailNotify = 1;
        }
        $user->notifyTime = $request->input('notifyTime');
        $user->save();
        $id = $user->id;

        $collins = new Diner_Trans_Hall;
        if(empty($request->input('collins'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $collins->dining_id = 1;
        $collins->user_id = $id;
        $collins->preference = $pref;
        $collins->save();

        $scripps = new Diner_Trans_Hall;
        if(empty($request->input('scripps'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $scripps->dining_id = 5;
        $scripps->user_id = $id;
        $scripps->preference = $pref;
        $scripps->save();

        $pitzer = new Diner_Trans_Hall;
        if(empty($request->input('pitzer'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $pitzer->dining_id = 6;
        $pitzer->user_id = $id;
        $pitzer->preference = $pref;
        $pitzer->save();

        $hMudd = new Diner_Trans_Hall;
        if(empty($request->input('hMudd'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $hMudd->dining_id = 4;
        $hMudd->user_id = $id;
        $hMudd->preference = $pref;
        $hMudd->save();

        $frank = new Diner_Trans_Hall;
        if(empty($request->input('frank'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $frank->dining_id = 2;
        $frank->user_id = $id;
        $frank->preference = $pref;
        $frank->save();

        $frary = new Diner_Trans_Hall;
        if(empty($request->input('frary'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $frary->dining_id = 3;
        $frary->user_id = $id;
        $frary->preference = $pref;
        $frary->save();

        $olden = new Diner_Trans_Hall;
        if(empty($request->input('olden'))) {
          $pref = 0;
        }
        else {
          $pref = 1;
        }
        $olden->dining_id = 7;
        $olden->user_id = $id;
        $olden->preference = $pref;
        $olden->save();
        return view('home');
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

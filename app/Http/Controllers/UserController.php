<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
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
      return view('index');
    }

    public function login()
    {
      if(\Auth::check()) {
        return redirect('user');
      }
      return view('auth/login');
    }

    public function home()
    {
      if(\Auth::check()) {
        $favorites = DB::table('favorites')->where('user_id', \Auth::user()->id)->get();
        return view('users/index', ['favorites' => $favorites]);
      }
      return view('auth/login');
    }

    public function updateFavorites(Request $request) {
      Favorites::where('user_id', \Auth::user()->id)->delete();
      foreach($request['favorites'] as $fav) {
          $favorite = new Favorites;
          $favorite->user_id = \Auth::user()->id;
          $favorite->food_name = $fav;
          $favorite->save();
      }
      $request->session()->flash('added-favorite', 'Updated Favorites.');
      return redirect('/user');
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
        if($request->input('sms')) {
          $user->smsNotify = $request->input('sms');
        }
        else {
          $user->smsNotify = 0;
        }
        $user->save();
        return redirect('/user');


      }
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

        if($request->input('frank')) {
          $collins = new Diner_Trans_Hall;
          $collins->dining_id = 1;
          $collins->user_id = $id;
          $collins->preference = $request->input('collins');
          $collins->save();
        }

        if($request->input('frank')) {
          $scripps = new Diner_Trans_Hall;
          $scripps->dining_id = 5;
          $scripps->user_id = $id;
          $scripps->preference = $request->input('scripps');
          $scripps->save();
        }

        if($request->input('frank')) {
          $pitzer = new Diner_Trans_Hall;
          $pitzer->dining_id = 6;
          $pitzer->user_id = $id;
          $pitzer->preference = $request->input('pitzer');
          $pitzer->save();
        }

        if($request->input('frank')) {
          $hMudd = new Diner_Trans_Hall;
          $hMudd->dining_id = 4;
          $hMudd->user_id = $id;
          $hMudd->preference = $request->input('hMudd');
          $hMudd->save();
        }

        if($request->input('frank')) {
          $frank = new Diner_Trans_Hall;
          $frank->dining_id = 2;
          $frank->user_id = $id;
          $frank->preference = $request->input('frank');
          $frank->save();
        }

        if($request->input('frank')) {
          $frary = new Diner_Trans_Hall;
          $frary->dining_id = 3;
          $frary->user_id = $id;
          $frary->preference = $request->input('collins');
          $frary->save();
        }

        if($request->input('olden')) {
          $olden = new Diner_Trans_Hall;
          $olden->dining_id = 7;
          $olden->user_id = $id;
          $olden->preference = $request->input('olden');
          $olden->save();
        }
        $user = User::find($id);
        Auth::login($user);
        return redirect('/user');
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

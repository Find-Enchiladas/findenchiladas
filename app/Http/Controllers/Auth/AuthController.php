<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests;

class AuthController extends Controller
{
    protected $redirectPath = '/user';
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
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

      if($request->input('frank')) {
        $olden = new Diner_Trans_Hall;
        $olden->dining_id = 7;
        $olden->user_id = $id;
        $olden->preference = $request->input('olden');
        $olden->save();
      }
    }
}

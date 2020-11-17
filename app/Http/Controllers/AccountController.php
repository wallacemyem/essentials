<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use DB;

class AccountController extends Controller
{

   public function __construct()
  {
      $this->middleware('auth');
  }
    //
    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
      $request->validate([
          'name' => 'string',
          'email' => 'string',
          'username' => 'string',
          'profile_image' => 'image|nullable'

      ]);

      //random aphanum
          $aphanum = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);

          // = unique_code(8);
      //image cover_image
      if($request->hasFile('profile_image')){
        $file = $request->file('profile_image');
        $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $user = auth()->user()->username;
        $extension = $request->file('profile_image')->getClientOriginalExtension();
        $filenameToStore = $user.'.'.$extension;
        Storage::disk('public')->put($user.'.'.$extension,  File::get($file));
        $path = $request->file('profile_image')->storeAs('profile_image', $filenameToStore);
      }else{
        $filenameToStore = auth()->user()->profile_image;
      }

      //return $filenameWithExt;
      $update = auth()->user();
      //return $update->profile_image;
      $update->name = $request->input('name');
      $update->email = $request->input('email');
      $update->username = $request->input('username');
      $update->profile_image = $filenameToStore;
      $update->save();
      //auth()->user()->update(['name' => $request->get('name')]);
        //return $request->get('email');
        return redirect('account')->with('status', 'Profile Updated');
    }

    public function approveuser($id){

    }

    /**
     *
     *to approve users
     *
     *
     */
    public function password(Request $request)
    {

        auth()->user()->update(['password' => bcrypt($request->conpassword)]);

        return redirect('account')->with('status', 'Password Updated');;
    }

    //admin Login user profile
    public function profile($username){
      // IDEA: just make docs variable
      $user = User::find($username);
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/admin/myprofile', [
            'pageConfigs' => $pageConfigs
        ])->with('username', $username);
    }
}

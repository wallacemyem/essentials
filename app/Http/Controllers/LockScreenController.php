<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LockScreenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function lock()
    {
        Session::put('locked', true);

        return redirect('plock');
    }

    public function viewLockScreen()
    {
        if(Session::has('locked') && Session::get('locked')){
            return view('auth.auth-lock-screen');
        }else{
            return redirect('dashboard');
        }
    }

    public function unlock(Request $request)
    {
        if(Session::has('locked') && !empty(Session::get('locked'))){
          $request->validate([
              'password' => 'required|string'
              ]);

            if(Hash::check($request, Auth::user()->password)){
                Session::forget('locked');
                return redirect('dashboard');
            }else{
                return redirect()->back()->with('error', __('Password Incorrect!'));
            }
        }else{
            return redirect('dashboard');
        }
    }
}

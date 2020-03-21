<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Console\AppNamespaceDetectorTrait;
use DB;

class AuthenticationController extends Controller
{
    // Login
    public function login(){
        //$name = $this->getAppNamespace();
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
            'blankPage' => true
        ];

        return view('/auth/login', [
            'pageConfigs' => $pageConfigs
        ])->with('name', $name);
    }

    // Register
    public function register(){

      $register = DB::table('school')->get();
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('auth.register', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Forgot Password
    public function forgot_password(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/auth/auth-forgot-password', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Reset Password
    public function reset_password(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/auth/auth-reset-password', [
          'pageConfigs' => $pageConfigs
      ]);
    }

    // Lock Screen
    public function lock_screen(){
      $pageConfigs = [
          'bodyClass' => "bg-full-screen-image",
          'blankPage' => true
      ];

      return view('/auth/auth-lock-screen', [
          'pageConfigs' => $pageConfigs
      ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Course;
use App\Docs;
use DB;

class AdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    //admin dashboard
    public function dashboard(){

        $users = User::orderBy('created_at', 'desc')->get();
        $hour = Carbon::now('Africa/Lagos')->isoFormat('h:mm a');
        $la = Carbon::now('Africa/Lagos')->isoFormat('a');
        //$dw = response()->download($pathToFile);
        //$file = DB::table('users')->where('name', 'Aboiyar')->first();
        $file = Docs::orderBy('created_at', 'desc')->first();
        $pageConfigs = [
            'pageHeader' => false
        ];
        //return $file->name;
        return view('/admin/admin-dashboard', [
            'pageConfigs' => $pageConfigs
        ])->with('users', $users)->with('hour', $hour)->with('la', $la)->with('file', $file);
    }

    //admin Account
    public function account(){
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/admin/account-settings', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    //admin Task
    public function task(){

    }

    //admin Task
    public function times(){
      //$users = Docs::find(19)->disk;
      //$user = auth()->user()->profile_image;
      //$time = Carbon::now();
        $pageConfigs = [
            'pageHeader' => false
        ];
      //  $sizeMB = ($users / 1024);
        //return $sizeMB;
        //return Carbon::parse($user->created_at)->subDays()->diffForHumans();
        //return User::find(3)->user_level->name;
        return view('/admin/timetable', [
            'pageConfigs' => $pageConfigs
        ]);
    }

    //admin Task
    public function docs(){
      // IDEA: just make docs variable
      $docs = Docs::orderBy('created_at', 'desc')->get();
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/admin/documents', [
            'pageConfigs' => $pageConfigs
        ])->with('docs', $docs);
    }


    //admin Login user profile
    public function mprofile(){
      // IDEA: just make variable
      $user = auth()->user();
      $date = Carbon::parse($user->created_at)->isoFormat('dddd d MMMM Y');
        $pageConfigs = [
            'pageHeader' => false
        ];

        return view('/admin/myprofile', [
            'pageConfigs' => $pageConfigs
        ])->with('user', $user)->with('date', $date);
    }
}

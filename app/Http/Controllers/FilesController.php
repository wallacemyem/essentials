<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docs;
use App\Carbon;
use App\User;
use DB;

class FilesController extends Controller
{
    //
    public function saveassignment(){

    }

    public function markassignment(){

    }

    public function savedoc(Request $request){

      $request->validate([
          'name' => 'string',
          'category' => 'string',
          'img' => 'file|nullable'

      ]);

      //random aphanum
          $aphanum = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0);

          // = unique_code(8);
      //image cover_image
      if($request->hasFile('img')){
        $filenameWithExt = $request->file('img')->getClientOriginalName();
        $filesize = $request->file('img')->getSize();
        $filenameUq = md5(uniqid(rand(), true));
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileExtension = $request->file('img')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$fileExtension;
        $path = $request->file('img')->storeAs('public/files', $filenameToStore);
      }else{
        $filesize = '0';
        $fileExtension = 'nofile';
        $filenameToStore = 'nofile.png';
      }

      //return $filenameToStore;
      $update = new Docs;
      //return $update->profile_image;
      $update->field = $request->input('name');
      $update->attachment = $request->input('category');
      $update->file_name = $filenameToStore;
      $update->disk = $filesize;
      if($fileExtension == 'jpg'){
        $update->icon = 'image';
          }elseif($fileExtension == 'png'){
            $update->icon = 'image';
          }elseif($fileExtension == 'pdf'){
            $update->icon = 'pdf';
          }elseif($fileExtension == 'docx'){
            $update->icon = 'word';
          }elseif($fileExtension == 'pptx'){
            $update->icon = 'powerpoint';
          }elseif($fileExtension == 'xls'){
            $update->icon = 'excel';
          }elseif($fileExtension == 'zip'){
            $update->icon = 'archive';
          }elseif($fileExtension == 'mp3'){
            $update->icon = 'audio';
          }elseif($fileExtension == 'nofile'){
            $update->icon = 'code';
      }
      $update->attachable_type = $fileExtension;
      $update->attachable_id = auth()->user()->id;
      $update->save();
      //auth()->user()->update(['name' => $request->get('name')]);
        //return $request->get('email');
        return redirect('docs');
    }

    public function files(Request $request){
        $request->validate([
            'img' => 'image|nullable'
        ]);

        if($request->hasFile('img')){
          $filenameWithExt = $request->file('img')->getClientOriginalName();
          $filesize = $request->file('img')->getSize();
          $filename = md5(uniqid(rand(), true));
          $fileExtension = $request->file('img')->getClientOriginalExtension();
          $filenameToStore = $filenameWithExt.'_'.time().'.'.$fileExtension;
          $path = $request->file('img')->storeAs('public/tmp', $filenameToStore);
      }
    }


    public function actiondelete(){

    }
}

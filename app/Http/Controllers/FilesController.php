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
        $update->cover = 'images/file/png.png';
          }elseif($fileExtension == 'png'){
            $update->icon = 'image';
            $update->cover = 'images/file/png.png';
          }elseif($fileExtension == 'pdf'){
            $update->icon = 'pdf';
            $update->cover = 'images/file/pdf.png';
          }elseif($fileExtension == 'docx'){
            $update->icon = 'word';
            $update->cover = 'images/file/docx.png';
          }elseif($fileExtension == 'pptx'){
            $update->icon = 'powerpoint';
            $update->cover = 'images/file/pptx.png';
          }elseif($fileExtension == 'xls'){
            $update->icon = 'excel';
            $update->cover = 'images/file/xls.png';
          }elseif($fileExtension == 'zip'){
            $update->icon = 'archive';
            $update->cover = 'images/file/zip.png';
          }elseif($fileExtension == 'mp3'){
            $update->icon = 'audio';
            $update->cover = 'images/file/audio.png';
          }elseif($fileExtension == 'nofile'){
            $update->icon = 'code';
            $update->cover = 'images/file/nofile.png';
      }
      $update->attachable_type = $fileExtension;
      $update->user_id = auth()->user()->id;
      $update->slug = str_slug($request->name);
      $update->save();
      //auth()->user()->update(['name' => $request->get('name')]);
        //return $request->get('email');
        return redirect('docs')->with('success', __('File Uploaded!'));
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docs extends Model
{
    //
    protected $table = 'trix_attachments';
      //
      public $primaryKey = 'id';

      //protected $dates = ['expired_at'];
      //
      public $timestamp = true;

      public function user(){
        return $this->belongsTo('App\User');
      }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{

  protected $table = 'dept';
    //
    public $primaryKey = 'id';

    //protected $dates = ['expired_at'];
    //
    public $timestamp = true;

    public function school(){
      return $this->belongsTo('App\School');
    }

  public function user(){
   return $this->belongsTo('App\User');
 }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

  protected $table = 'school';
    //
    public $primaryKey = 'id';

    //protected $dates = ['expired_at'];
    //
    public $timestamp = true;

  public function user(){
   return $this->belongsTo('App\User');
 }
}

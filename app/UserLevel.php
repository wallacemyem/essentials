<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
  protected $table = 'user_level';
    //
    public $primaryKey = 'id';

    //protected $dates = ['expired_at'];
    //
    public $timestamp = true;

    public function user(){
     return $this->hasMany('App\User');
   }
}

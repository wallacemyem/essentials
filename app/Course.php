<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

  protected $table = 'course';
    //
    public $primaryKey = 'id';

    //protected $dates = ['expired_at'];
    //
    public $timestamp = true;

  public function user(){
   return $this->belongsTo('App\User');
 }

 public function dept(){
  return $this->belongsTo('App\Dept');
}

}

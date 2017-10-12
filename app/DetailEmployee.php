<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailEmployee extends Model
{
  // Table Name
  protected $table = 'detail_employees';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  public function posts(){
      return $this->hasMany('App\Employees');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
  // Table Name
  protected $table = 'employees';
  // Primary Key
  public $primaryKey = 'id';
  // Timestamps
  public $timestamps = true;

  public function office(){
      return $this->belongsTo('App\Office');
  }

  public function departement(){
      return $this->belongsTo('App\Departement');
  }

  public function detailEmployee(){
      return $this->belongsTo('App\DetailEmployee');
  }

  public function position(){
      return $this->belongsTo('App\Position');
  }
}

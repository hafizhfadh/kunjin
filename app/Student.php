<?php

namespace App;

use App\Departure;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
  use Notifiable;
    protected $table = 'students';
    public $incrementing = false;
    protected $fillable = [
        'id', 'name', 'class', 'email', 'password'
    ];

    public function departure()
    {
      return $this->hasMany(Depature::class);
    }
    public static function insertOrUpdate(array $rows){
        $table = \DB::getTablePrefix().with(new self)->getTable();


        $first = reset($rows);

        $columns = implode( ',',
            array_map( function( $value ) { return "$value"; } , array_keys($first) )
        );

        $values = implode( ',', array_map( function( $row ) {
                return '('.implode( ',',
                    array_map( function( $value ) { return '"'.str_replace('"', '""', $value).'"'; } , $row )
                ).')';
            } , $rows )
        );

        $updates = implode( ',',
            array_map( function( $value ) { return "$value = VALUES($value)"; } , array_keys($first) )
        );

        $sql = "INSERT INTO {$table}({$columns}) VALUES {$values} ON DUPLICATE KEY UPDATE {$updates}";

        return \DB::statement( $sql );
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diversity extends Model
{
    protected $table= 'diversities';
    protected $fillable=[
        'name',
        'enable'
    ];
  public function items()
  {
      return $this->hasMany('App\Item',"diversity","name");
  }
  public function clients()
  {
      return $this->hasMany('App\Client',"diversity","name");
  }
}

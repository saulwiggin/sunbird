<?php

namespace App\Application\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

  public $table = "menu";

  protected $fillable = [
        'name'
  ];

  public function   validation ($id){
    return [

    ];
  }
  public function   updateValidation ($id){
    return [

    ];
  }


  public function item(){
     return $this->hasMany('App\Application\Model\Item');
  }

}

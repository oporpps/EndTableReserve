<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Account;
use App\Models\FoodSet;

class SetFood{

    public static function get(){

        $menu = new FoodSet();
        return $menu -> Select() -> executeWith() -> findAll();
    }

    public static function getbyId($id){

        $menu = new FoodSet();
        return  $menu -> Select() -> where("id=?", [$id]) -> executeWith() -> findOne();
    }
}

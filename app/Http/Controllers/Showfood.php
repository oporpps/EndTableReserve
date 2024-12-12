<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\MenuItem;
use App\Models\MenuChoices;

class Showfood {

    public static function get(){
        $menu = new MenuItem();

        return  $menu -> Select() -> executeWith() -> findAll();
    }

    public static function getbyId($id){

        $menu = new MenuItem();
        return  $menu -> Select() -> where("foodset_id=?", [$id]) -> executeWith() -> findAll();
    }

}
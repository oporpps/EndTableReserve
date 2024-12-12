<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\MenuItem;
use App\Models\MenuChoices;

class ShowChoices {

    public static function get(){
        $menu = new MenuChoices();

        return  $menu -> Select() -> executeWith() -> findAll();
    }

    public static function getbyId($id){

        $menu = new MenuChoices();
        return  $menu -> Select() -> where("menu_item_id=?", [$id]) -> executeWith() -> findAll();
    }


}
<?php

namespace App\Http\Controllers;
use App\Models\Reservations;
use App\Models\FoodSet;
use App\Models\MenuItem;
use App\Models\MenuChoices;
class Delete {

    public static function delete($id){

        $reser = new Reservations();

        return $reser -> Delete() -> where("id = ?", [$id]) -> execute();
    }
    
    public static function foodset($id){
        $foodset = new FoodSet();

        return $foodset -> Delete() -> where("id = ?", [$id]) -> execute();
    }

    public static function menu($id){
        $menu = new MenuItem();

        return $menu -> Delete() -> where("id = ?", [$id]) -> execute();
    }

    public static function choice($id){
        $choice = new MenuChoices();

        return $choice -> Delete() -> where("id = ?", [$id]) -> execute();
    }
}
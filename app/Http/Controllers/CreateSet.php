<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\FoodSet;
use App\Models\MenuItem;
use App\Models\MenuChoices;

class CreateSet {

    public static function foodset(){

        $foodset = new FoodSet();

        if (
            $foodset->Create(

                ["nameset","info","link","price"],
            [   
                Request::$jsonr["nameset"],
                Request::$jsonr["info"],
                Request::$jsonr["link"],
                Request::$jsonr["price"]
            ]

            )->execute()
        ) {
            return jsonify(["message" => "สำเร็จ"]);
        }

    }
    public static function menu(){
        $menu = new MenuItem();

        if (
            $menu->Create(

                ["foodset_id","name"],
            [   
                Request::$jsonr["foodset_id"],
                Request::$jsonr["name"]
            ]

            )->execute()
        ) {
            return jsonify(["message" => "สำเร็จ"]);
        }
    }
    public static function choice(){
        $choice = new MenuChoices();

        if (
            $choice->Create(

                ["menu_item_id","foodset_id","choice"],
            [   
                Request::$jsonr["menu_item_id"],
                Request::$jsonr["foodset_id"],
                Request::$jsonr["choice"]
            ]

            )->execute()
        ) {
            return jsonify(["message" => "สำเร็จ"]);
        }
    }
}
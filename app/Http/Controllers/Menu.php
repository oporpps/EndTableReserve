<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\Account;
use App\Models\Reservations;

class Menu {

    public static function handle(){

        $menu = new Reservations();

        if (
            $menu->Create(

                ["user_id","nickname","address","phone","setfood","eventDate", "startTime", "eventSize", "attendees"],
            [   
                $_SESSION["session_id"],
                Request::$jsonr["nickname"],
                Request::$jsonr["address"],
                Request::$jsonr["phone"],
                Request::$jsonr["setfood"],
                Request::$jsonr["eventDate"],
                Request::$jsonr["startTime"],
                Request::$jsonr["eventSize"],
                Request::$jsonr["attendees"]
            ]

            )->execute()
        ) {
            return jsonify(["message" => "สำเร็จ"]);
        }
        
        
    }
}
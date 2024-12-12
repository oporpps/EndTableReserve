<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Soyer\Http\Request;

class Update{

    public static function success() {

        $update = new Reservations();

        // อัปเดตข้อมูลในฐานข้อมูล
        $update->Update(
            ["user_id","nickname","phone","address", "eventDate","startTime","eventSize","attendees","setfood"],
            [$_SESSION["session_id"],Request::$jsonr["nickname"],Request::$jsonr["phone"],Request::$jsonr["address"],Request::$jsonr["eventDate"],Request::$jsonr["startTime"],Request::$jsonr["eventSize"],Request::$jsonr["attendees"], Request::$jsonr["setfood"]]
        )->execute();
    }
}

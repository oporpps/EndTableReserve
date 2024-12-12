<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Account;
use App\Models\Reservations;

class Admin {

    public static function get(){

        $menu = new Reservations();
        return $menu -> Select() -> executeWith() -> findAll();
    }

    public static function acc(){
        
        $acc = new Account();
        return $acc -> Select() -> executeWith() -> findAll();
    }


}
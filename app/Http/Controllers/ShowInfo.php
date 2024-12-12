<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Account;

class ShowInfo {

    public static function getbyId($id){

        $show = new Account();
        
        return  $show -> Select()  -> where("id=?", [$id]) -> executeWith() -> findOne();
    }


}
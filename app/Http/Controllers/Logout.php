<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserState;

class Logout {

    public static function handle() {

        // Clear user state
        UserState::unsetUserID();
        UserState::unsetUserName();
        UserState::unsetUserRole();

        return jsonify(["message" => "ออกจากระบบสำเร็จ"]);
    }
}

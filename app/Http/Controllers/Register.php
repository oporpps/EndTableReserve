<?php

namespace App\Http\Controllers;
use Soyer\Http\Request;
use App\Models\Account;

class Register {

    public static function handle(){
        // Check if password and confirm_password match
        if(Request::$jsonr["password"] != Request::$jsonr["confirm_password"]){
            return jsonify(["msg"=>"รหัสไม่ตรงกัน", 400]);
        }

        // Create a new Account instance
        $acc = new Account();

        // Check if email already exists
        if ($acc->Select()->where('username = ?', [Request::$jsonr["username"]])->executeWith()->findOne()) {
            return abortWithJson(400, ["status" => "error", "msg" => "มีชื่อผู้ใช้ในระบบแล้ว"]);
        }

        // Create the account if email doesn't exist
        if ($acc->Create(["username", "password", "phone"], [Request::$jsonr["username"], Request::$jsonr["password"], Request::$jsonr["phone"]])->execute()) {
            return jsonify(["msg"=> "สมัครสำเร็จ"]);
        }
    }
}
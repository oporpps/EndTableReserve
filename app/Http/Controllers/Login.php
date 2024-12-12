<?php

    namespace App\Http\Controllers;

    use Soyer\Http\Request;
    use App\Models\Account;
    use App\Http\Controllers\UserState;

    class Login {

        public static function handle() {

            $username = Request::$jsonr["username"];
            $password = Request::$jsonr["password"];

            if (empty($username) || empty($password)) {
                return jsonify(["message" => "username and password are required"], 400);
            }

            $acc = new Account();

            $result = $acc->Select()
                ->where('username = ? AND password = ?', [$username, $password])
                ->executeWith()
                ->findOne();

            if (!$result) {
                return jsonify(["message" => "ไม่พบผู้ใช้นี้"], 404);
            }

            UserState::setUserID($result["id"]);
            UserState::setUserName($result["username"]);
            UserState::setUserRole($result["role"]);

            return jsonify(["message" => "สำเร็จ"]);
        }
    }
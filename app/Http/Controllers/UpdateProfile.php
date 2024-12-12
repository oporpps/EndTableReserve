<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Soyer\Http\Request;

class UpdateProfile {

    public static function success() {

        $update = new Account();

        // อัปเดตข้อมูลในฐานข้อมูล
        $result = $update->Update(
            ["nickname", "address"],
            [Request::$jsonr["nickname"], Request::$jsonr["address"]]
        )->execute();

        // ตรวจสอบว่าอัปเดตสำเร็จหรือไม่
        if ($result) {
            // ส่ง response เป็น JSON ที่แสดงข้อความว่าการแก้ไขสำเร็จ
            echo json_encode([
                "success" => true,
                "message" => "การแก้ไขสำเร็จ"
            ]);
        } else {
            // ส่ง response เป็น JSON กรณีอัปเดตไม่สำเร็จ
            echo json_encode([
                "success" => false,
                "message" => "การแก้ไขล้มเหลว"
            ]);
        }
    }
}

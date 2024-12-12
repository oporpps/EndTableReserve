<?php

namespace App\Http\Controllers;

use Soyer\Http\Request;
use App\Http\Controllers\UserState;
use App\Models\Reservations;
use PDO;

class ShowMenu
{

    public static function ShowMenu($id)
    {
        $menu = new Reservations();

        return  $menu->Select()->where("user_id=?", [$id])->executeWith()->findAll();
    }

    public static function menu($id)
    {
        $menu = new Reservations();
        $query = "
        SELECT 
            mi.id AS menu_item_id,
            mi.name,
            mi.foodset_id,
            mc.choice
        FROM 
            menu_items AS mi
        LEFT JOIN 
            menu_choices AS mc ON mi.id = mc.menu_item_id
        WHERE 
            mi.foodset_id = ?
    ";

        $stmt = $menu-> cursor() ->prepare($query);
        $stmt->execute([$id]);

        $menuItems = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $menuItemId = $row['menu_item_id'];

            // หากยังไม่มีไอเท็มนี้ในเมนู ให้สร้าง array ใหม่สำหรับเมนูไอเท็มนั้น
            if (!isset($menuItems[$menuItemId])) {
                $menuItems[$menuItemId] = [
                    'id' => $menuItemId,
                    'name' => $row['name'],
                    'foodset_id' => $row['foodset_id'],
                    'choices' => []
                ];
            }

            // เพิ่ม choice ลงใน array choices ถ้ามีค่า
            if (!empty($row['choice'])) {
                $menuItems[$menuItemId]['choices'][] = $row['choice'];
            }
        }

        // เปลี่ยนเป็น array ของรายการเมนู
       return $menuItems = array_values($menuItems);
    }
}

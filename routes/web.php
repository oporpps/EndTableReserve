<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\SetFood;
use App\Http\Controllers\ShowChoices;
use App\Http\Controllers\Showfood;
use App\Http\Controllers\ShowInfo;
    use App\Http\Controllers\ShowMenu;
    use App\Http\Middleware\Authentication;
    use Soyer\PMSoyer;

    use App\Http\Middleware\Example as MidExample;
    use App\Http\Middleware\NotAuthentication;
    use App\Http\Controllers\UserState;
use App\Http\Middleware\RoleAdmin;

    PMSoyer::route('/', ["GET", "POST"], function() {
        return render_template('welcome.html', ['title' => 'โต๊ะจีน']);
    });
    
    PMSoyer::route('/food/<id>', ["GET", "POST"], function($id) {
        return render_template('food.html', ['title' => 'รายการ1','test'=>ShowMenu::menu($id),'show' => SetFood::getbyId($id),'choices'=> ShowChoices::getbyId($id),'item'=> Showfood::getbyId($id)]);
    }, [ Authentication::class ]);

    PMSoyer::route('/profile', ["GET", "POST"], function() {
        return render_template('profile.html', ['title' => 'ข้อมูลส่วนตัว','profile' => ShowInfo::getbyId(UserState::getUserID())]);
    }, [ Authentication::class ]);

    PMSoyer::route('/info', ["GET", "POST"], function() {
        return render_template('info.html', ['title' => 'ข้อมูลส่วนตัว']);
    }, [ Authentication::class ]);
    
    PMSoyer::route('/menu', ["GET", "POST"], function() {
        return render_template('menu.html', ['title' => 'เซ็ตเมนูอาหาร','show' => SetFood::get()]);
    }, [ Authentication::class ]);
    
    PMSoyer::route('/admin', ["GET", "POST"], function() {
        return render_template('admin.html', ['title' => 'admin','menu' => Admin::get()]);
    }, [ Authentication::class,RoleAdmin::class]);

    PMSoyer::route('/create', ["GET", "POST"], function() {
        return render_template('create.html', ['title' => 'admin','menu' => Admin::get()]);
    }, [ Authentication::class,RoleAdmin::class]);

    PMSoyer::route('/menu_edit', ["GET", "POST"], function($id) {
        return render_template('menu_edit.html', ['title' => 'admin','test'=>ShowMenu::menu($id),'show' => SetFood::get(),'choices'=> ShowChoices::get(),'item'=> Showfood::get()]);
    }, [ Authentication::class,RoleAdmin::class]);


    PMSoyer::route('/admin/edit/<id>', ["GET", "POST"], function() {
        return render_template('edit.html', ['title' => 'admin','menu' => Admin::get()]);
    }, [ Authentication::class,RoleAdmin::class]);

    PMSoyer::route('/login', ["GET", "POST"], function() {
        return render_template('login.html', ['title' => 'เข้าสู่ระบบ']);
    }, [ NotAuthentication::class ]);

    PMSoyer::route('/register', ["GET", "POST"], function() {
        return render_template('register.html', ['title' => 'สมัครสมาชิก']);
    }, [ NotAuthentication::class ]);

    PMSoyer::route('/check', ["GET", "POST"], function() {
        return render_template('check.html', ['title' => 'ตรวจสอบรายการ','menu' => ShowMenu::ShowMenu(UserState::getUserID())]);
    }, [ Authentication::class ]);


    PMSoyer::route('/confirm', ["GET", "POST"], function() {
        return render_template('confirm.html', ['title' => 'admin']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food2', ["GET", "POST"], function() {
        return render_template('setfood\food2.html', ['title' => 'รายการ2']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food3', ["GET", "POST"], function() {
        return render_template('setfood\food3.html', ['title' => 'รายการ3']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food4', ["GET", "POST"], function() {
        return render_template('setfood\food4.html', ['title' => 'รายการ4']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food5', ["GET", "POST"], function() {
        return render_template('setfood\food5.html', ['title' => 'รายการ5']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food6', ["GET", "POST"], function() {
        return render_template('setfood\food6.html', ['title' => 'รายการ6']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food7', ["GET", "POST"], function() {
        return render_template('setfood\food7.html', ['title' => 'รายการ7']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food8', ["GET", "POST"], function() {
        return render_template('setfood\food8.html', ['title' => 'รายการ8']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food9', ["GET", "POST"], function() {
        return render_template('setfood\food9.html', ['title' => 'รายการ9']);
    }, [ MidExample::class ]);

    PMSoyer::route('/food10', ["GET", "POST"], function() {
        return render_template('setfood\food10.html', ['title' => 'รายการ10']);
    }, [ MidExample::class ]);

    
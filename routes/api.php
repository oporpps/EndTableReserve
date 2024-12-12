<?php

use App\Http\Controllers\CreateSet;
use App\Http\Controllers\Delete;
use Soyer\PMSoyer;

    use App\Http\Middleware\Example as MidExample;
    use App\Http\Controllers\Example as ConExample;
    use App\Http\Controllers\Login;
    use App\Http\Controllers\Logout;
use App\Http\Controllers\Menu;
use App\Http\Controllers\Register;
use App\Http\Controllers\Update;
use App\Http\Controllers\UpdateProfile;
    use App\Http\Middleware\Authentication;
    use App\Http\Middleware\NotAuthentication;
    use Soyer\Http\Request;

    PMSoyer::route("/ping", ["GET", "POST"], function(){
        return ConExample::handle();
    }, [ MidExample::class ]);

    PMSoyer::route("/api/login", ["POST"], function(){
        return Login::handle();
    }, [NotAuthentication::class]);

    PMSoyer::route("/api/register", ["POST"], function(){
        return Register::handle();
    });
    
    PMSoyer::route("/api/logout", ["GET"], function(){
        return Logout::handle();
    }, [Authentication::class]);

    PMSoyer::route("/api/sdfoodset", ["POST"], function(){
        return CreateSet::foodset();
    }, [Authentication::class]);

    PMSoyer::route("/api/sdmenu", ["POST"], function(){
        return CreateSet::menu();
    }, [Authentication::class]);

    PMSoyer::route("/api/sdchoice", ["POST"], function(){
        return CreateSet::choice();
    }, [Authentication::class]);

    PMSoyer::route("/api/menu", ["POST"], function(){
        return Menu::handle();
    }, [Authentication::class]);

    PMSoyer::route("/api/update", ["PUT"], function(){
        return Update::success();
    }, [Authentication::class]);

    PMSoyer::route("/api/updateProfile", ["PUT"], function(){
        return UpdateProfile::success();
    }, [Authentication::class]);

    PMSoyer::route("/api/delete", ["DELETE"], function(){
        return Delete::delete(Request::$jsonr["id"]);
    },[Authentication::class]);

    PMSoyer::route("/api/deleteset", ["DELETE"], function(){
        return Delete::foodset(Request::$jsonr["id"]);
    },[Authentication::class]);

    PMSoyer::route("/api/deletemenu", ["DELETE"], function(){
        return Delete::menu(Request::$jsonr["id"]);
    },[Authentication::class]);

    PMSoyer::route("/api/deletechoice", ["DELETE"], function(){
        return Delete::choice(Request::$jsonr["id"]);
    },[Authentication::class]);
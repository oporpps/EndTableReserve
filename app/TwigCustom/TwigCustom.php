<?php

    namespace App\TwigCustom;

    use App\Http\Controllers\UserState;
    use App\Models\Account;
use Soyer\View\Custom\UserCustomView;

    use App\TwigCustom\Example;

    class TwigCustom {

        public static function init() {

            $test = new Account();

            UserCustomView::defineGlobalVariable("isLoggin", UserState::isUserID());
            UserCustomView::defineGlobalVariable("username", UserState::getUserName());

            UserCustomView::defineGlobalVariable("role", isset($_SESSION['session_role']) ? $_SESSION['session_role'] : "");
            // HTML: {{ you_key }}

            UserCustomView::defineFunction("you_function_name", [Example::class, "plusInt"]);
            // HTML: {{ you_function_name(100) }}
        }

    }
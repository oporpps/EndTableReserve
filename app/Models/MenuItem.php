<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class MenuItem extends BaseModel {

        public $__table__ = "menu_items";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }
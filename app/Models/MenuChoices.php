<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class MenuChoices extends BaseModel {

        public $__table__ = "menu_choices";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }
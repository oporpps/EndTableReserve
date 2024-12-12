<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class FoodSet extends BaseModel {

        public $__table__ = "foodset";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }
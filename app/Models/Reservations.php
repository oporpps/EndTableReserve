<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class Reservations extends BaseModel {

        public $__table__ = "reservations";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }
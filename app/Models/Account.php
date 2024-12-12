<?php

    namespace App\Models;

    use App\Models\BaseModel;

    class Account extends BaseModel {

        public $__table__ = "account";

        function __construct() {
            parent::__construct($this -> __table__);
        }

    }
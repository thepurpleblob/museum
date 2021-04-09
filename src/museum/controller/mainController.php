<?php

namespace Purpleblob\museum\controller;

use Purpleblob\lib\system;

class mainController {

    /**
     * Index page
     */
    public static function index() {
        system::view('index');
    }

}
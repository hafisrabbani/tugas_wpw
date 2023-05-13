<?php

namespace App\Controllers;

class BaseController
{
    protected $blade;
    public function __construct()
    {
        global $blade;
        $this->blade = $blade;
    }
}

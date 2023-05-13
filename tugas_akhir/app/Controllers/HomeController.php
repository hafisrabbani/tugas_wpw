<?php

namespace App\Controllers;

use App\Helpers\Debug;

class HomeController extends BaseController
{
    public function index()
    {

        echo $this->blade->run("index", [
            "name" => "John Doe"
        ]);
    }
}

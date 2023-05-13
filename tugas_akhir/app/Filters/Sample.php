<?php

namespace App\Filters;

use App\Filters\Filter;
use Pecee\Http\Request;
use App\Helpers\Session;

class Sample implements Filter
{
    public function handle(Request $request): void
    {
        require_once __DIR__ . '/../Helpers/Helper.php';
        if (!session()->has('admin')) {
            redirect(BASE_URL . '/');
        }
    }
}

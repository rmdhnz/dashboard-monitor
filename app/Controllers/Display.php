<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Display extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Display Page",
        ];
        return view("display/index", $data);
    }
}

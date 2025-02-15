<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Antrian extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Antrian Server",
        ];
        return view("antrian/index", $data);
    }
    public function teller()
    {
        $data = [
            "title" => "Teller Server",
        ];
        return view("antrian/teller", $data);
    }
    public function cs()
    {
        $data = [
            "title" => "Customer Service Server",
        ];
        return view("antrian/cs", $data);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MyAdmin extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard Admin",
        ];
        return view("my_admin/index", $data);
    }
    public function table_review()
    {
        $data = [
            "title" => "Data Review",
            "headline" => "Rekap Data Nasabah",
        ];
        return view("my_admin/data_review", $data);
    }
}

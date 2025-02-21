<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MyAdmin extends BaseController
{
    private $antrian_model;
    public function  __construct()
    {
        $this->antrian_model = new \App\Models\AntrianModel();
    }
    public function index()
    {
        $data = [
            "title" => "Dashboard Admin",
            "data_antrian" => $this->antrian_model->orWhere(["status" => "dilewati"])->orWhere(["status" => "dilayani"])->findAll(),
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

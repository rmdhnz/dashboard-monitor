<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function coba(?string $nama = null, $age = '')
    {
        if (is_null($nama)) {
            $nama = "Everyone";
        }
        echo "Hello world! : $nama and I am $age years old.";
    }
}

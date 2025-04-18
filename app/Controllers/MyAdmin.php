<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class MyAdmin extends BaseController
{
    private $antrian_model, $cabang_model, $validation, $akun_model;
    public function  __construct()
    {
        $this->antrian_model = new \App\Models\AntrianModel();
        $this->cabang_model = new \App\Models\Cabang();
        $this->validation = \Config\Services::validation();
        $this->akun_model = new \App\Models\AkunModel();
    }
    public function index()
    {
        if (in_groups('teller')) {
            return redirect()->to('teller');
        } elseif (in_groups('customer_service')) {
            return redirect()->to('cs');
        }
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
    public function laporan()
    {
        $data = [
            "title" => "Laporan",
            "data_antrian" => $this->antrian_model->orWhere(["status" => "dilewati"])->orWhere(["status" => "dilayani"])->findAll(),
            "data_cabang" => $this->cabang_model->findAll()
        ];
        return view("my_admin/laporan", $data);
    }
    public function cabang()
    {
        $data = [
            "title" => "Cabang",
            "data_cabangs" => $this->cabang_model->orderBy('nama_cabang')->findAll()
        ];
        return view('my_admin/cabang', $data);
    }
    public function tambah_cabang()
    {
        $data = [
            "title" => "Tambah Cabang",
        ];
        return view("my_admin/tambah_cabang", $data);
    }

    public function save_cabang()
    {
        // dd($this->request->getVar('nama_cabang'));
        $rules = [
            "nama_cabang" => [
                'rules' => 'required|is_unique[cabang.nama_cabang]',
                'errors'  => [
                    "required" => "Mohon isi nama cabang",
                    "is_unique" => "Cabang Sudah terdaftar",
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validation->getErrors());
            return redirect()->back()->withInput();
        }
        $this->cabang_model->save([
            "nama_cabang" => $this->request->getVar('nama_cabang'),
            "created_at" => Time::now(),
            "updated_at" => Time::now(),
        ]);
        session()->setFlashdata('success', 'Berhasil menambahkan cabang baru');
        return redirect()->back();
    }
    public function edit($id)
    {
        $data = [
            'title' => "Edit Cabang",
            'cabang' => $this->cabang_model->where(["cabang_id" => $id])->first(),
        ];
        return view('my_admin/edit_cabang', $data);
    }
    public function update($id)
    {
        $cabang  = $this->cabang_model->where(["cabang_id" => $id])->first();
        if ($this->request->getVar('nama_cabang') == $cabang["nama_cabang"]) {
            $name_rule = "required";
        } else {
            $name_rule = "required|is_unique[cabang.nama_cabang]";
        }
        $rules = [
            "nama_cabang" => [
                'rules' => $name_rule,
                'errors'  => [
                    "required" => "Mohon isi nama cabang",
                    "is_unique" => "Cabang Sudah terdaftar",
                ],
            ],
        ];
        if (!$this->validate($rules)) {
            session()->setFlashdata('error', $this->validation->getErrors());
            return redirect()->back()->withInput();
        }
        $this->cabang_model->save([
            "cabang_id" => $id,
            "nama_cabang" => $this->request->getVar('nama_cabang'),
            "updated_at" => Time::now(),
            "created_at" => $cabang["created_at"],
        ]);
        session()->setFlashdata('success', 'Berhasil mengubah nama cabang');
        return redirect()->to('cabang');
    }

    public function delete($id)
    {
        $this->cabang_model->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data cabang');
        return redirect()->back();
    }
    public function akun()
    {
        $data = [
            "title" => "List Akun",
            "data_akun" => $this->akun_model->getUsersWithRoles()
        ];
        // dd($data["data_akun"]);
        return view('my_admin/akun', $data);
    }
    public function tambah_akun()
    {
        $data = [
            "title" => "Tambah Akun",
            "data_akun" => $this->akun_model->getUsersWithRoles()
        ];
        return view('my_admin/tambah_akun', $data);
    }
}

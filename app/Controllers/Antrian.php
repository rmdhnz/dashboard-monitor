<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Antrian extends BaseController
{
    private $antrian_model, $faker;
    public function  __construct()
    {
        $this->antrian_model = new \App\Models\AntrianModel();
        $this->faker = \Faker\Factory::create('id_ID');
    }
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
    public function antrian_save()
    {
        $tujuan = $this->request->getVar('tujuan');
        $last_antrian = $this->antrian_model->orderBy("antrian_id", 'DESC')->where(["tujuan" => $tujuan]);
        $currentID = $last_antrian ? $last_antrian->countAllResults() + 1 : 1;
        $nomor_antrian = ($tujuan == "teller" ? "T" : "C") . "-" . sprintf("%03d", $currentID);
        $data = [
            'tujuan' => $tujuan,
            "nomor_antrian" => $nomor_antrian,
            'timestamp' => Time::now(),
            'status' => "menunggu",
            'jumlah_antrian' => $this->antrian_model->where(["tujuan" => $tujuan])->where(["status" => "menunggu"])->countAllResults(),
        ];
        $this->antrian_model->save($data);
        session()->setFlashdata('success', 'Terima kasih. Sisa Antrian : ' . $data['jumlah_antrian']);
        return redirect()->back();
    }

    public function cs()
    {
        $data = [
            "title" => "Customer Service Server",
        ];
        return view("antrian/cs", $data);
    }

    public function teller_call()
    {
        $data = [
            "title" => "Teller Server",
            "jumlah_antrian" => $this->antrian_model->where(["tujuan" => "teller"])->where(["status" => "menunggu"])->countAllResults(),
            "dipanggil" => $this->antrian_model->where(["tujuan" => "teller"])->where(["status" => "dipanggil"])->countAllResults(),
        ];
        return view('antrian/teller_call', $data);
    }
    public function antrian_call_update()
    {
        $tujuan_call = $this->request->getVar('tujuan_call');
        $jenis = $this->request->getVar('jenis');
        if ($jenis == "call") {
            $current_antrian = $this->antrian_model->where(["tujuan" => $tujuan_call])->where(["status" => "menunggu"])->first();
            if ($this->antrian_model->where(["tujuan" => $tujuan_call])->where(["status" => "dipanggil"])->countAllResults() > 0) {
                $current_antrian = $this->antrian_model->where(["tujuan" => $tujuan_call])->where(["status" => "dipanggil"])->first();
            }
            $this->antrian_model->save([
                "antrian_id" => $current_antrian["antrian_id"],
                "nomor_antrian" => $current_antrian["nomor_antrian"],
                "tujuan" => $current_antrian["tujuan"],
                "timestamp" => $current_antrian["timestamp"],
                "status" => "dipanggil",
            ]);
            session()->setFlashdata('attention', 'Nomor antrian ' . $current_antrian["nomor_antrian"] .  " dipanggil");
        } else if ($jenis == "dilayani") {
            $current_antrian = $this->antrian_model->where(["tujuan" => $tujuan_call])->where(["status" => "dipanggil"])->first();
            $this->antrian_model->save([
                "antrian_id" => $current_antrian["antrian_id"],
                "nomor_antrian" => $current_antrian["nomor_antrian"],
                "tujuan" => $current_antrian["tujuan"],
                "timestamp" => $current_antrian["timestamp"],
                "status" => "dilayani",
            ]);
            session()->setFlashdata('attention', 'Nomor antrian ' . $current_antrian["nomor_antrian"] .  " dilayani");
        } else {
            $current_antrian = $this->antrian_model->where(["tujuan" => $tujuan_call])->where(["status" => "dipanggil"])->first();
            $this->antrian_model->save([
                "antrian_id" => $current_antrian["antrian_id"],
                "nomor_antrian" => $current_antrian["nomor_antrian"],
                "tujuan" => $current_antrian["tujuan"],
                "timestamp" => $current_antrian["timestamp"],
                "status" => "dilewati",
            ]);
            session()->setFlashdata('attention', 'Nomor antrian ' . $current_antrian["nomor_antrian"] .  " dilewati");
        }
        return $tujuan_call == "teller" ? redirect()->to('/antrian/teller_call') : redirect()->to('/antrian/cs_call');
    }

    public function cs_call()
    {
        $data = [
            "title" => "CS Server",
            "jumlah_antrian" => $this->antrian_model->where(["tujuan" => "CS"])->where(["status" => "menunggu"])->countAllResults(),
            "dipanggil" => $this->antrian_model->where(["tujuan" => "CS"])->where(["status" => "dipanggil"])->countAllResults(),
        ];
        return view('antrian/cs_call', $data);
    }

    public function list_antrian()
    {
        $data = [
            "title" => "List Antrian",
            "dipanggil" => $this->antrian_model->where(["status" => "dipanggil"])->findAll(),
            "random_number" => $this->faker->randomElement([1, 2, 3]),
        ];
        return view('antrian/list_antrian', $data);
    }
}

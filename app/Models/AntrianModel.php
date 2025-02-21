<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model
{
    protected $table            = 'antrian';
    protected $primaryKey       = 'antrian_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nomor_antrian', 'tujuan', 'timestamp', "status"];
    protected $useTimestamps = false;

    public function get_teller()
    {
        return $this->where(["tujuan" => "teller"])->findAll();
    }
    public function get_cs()
    {
        return $this->where(["tujuan" => "CS"])->findAll();
    }
}

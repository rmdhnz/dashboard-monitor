<?php

namespace App\Models;

use CodeIgniter\Model;

class Cabang extends Model
{
    protected $table            = 'cabang';
    protected $primaryKey       = 'cabang_id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_cabang', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}

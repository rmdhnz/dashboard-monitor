<?php

namespace App\Models;

use CodeIgniter\Model;

class DisplayModel extends Model
{
    protected $table            = 'call_display';
    protected $primaryKey       = 'call_display_id';
    protected $allowedFields    = ['antrian_id', 'nomor_antrian'];

    public function getDisplayAntrian($id)
    {
        return $this->join('antrian', '');
    }
}

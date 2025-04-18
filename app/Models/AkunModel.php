<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    // protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;

    public function getUsersWithRoles()
    {
        // return $this->select('users.id, users.username, users.email, auth_groups.name as role')->join('auth_groups_users.user_id = users.id', 'left')->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left')->findAll();
        $db = \Config\Database::connect();
        return $db->table('users')
            ->select('users.id, users.username, users.email, auth_groups.name as role')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left')
            ->get()->getResultArray();
    }
}

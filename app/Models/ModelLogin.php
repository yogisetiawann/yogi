<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    public function getData()
    {
        $query = $this->db->query("SELECT * FROM user");

        return $query->getResult();
    }

    public function dataVerifikasi($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);

        return $builder->countAllResults();
    }

    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    public function cekData($table, $where)
    {
        $builder = $this->db->table($table);
        $builder->where($where);

        return $builder->countAllResults();
    }
}

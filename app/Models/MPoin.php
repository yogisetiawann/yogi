<?php

namespace App\Models;

use CodeIgniter\Model;

class MPoin extends Model
{
    protected $table = 'poin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'poin', 'poin_sementara'];

    public function updatePoin($userId, $poin)
    {
        $existingPoin = $this->getPoinByUserId($userId);

        if ($existingPoin) {
            $newPoin = $existingPoin['poin_sementara'] + $poin;
            $data = [
                'poin_sementara' => $newPoin
            ];
            $this->update($existingPoin['id'], $data);
        } else {
            $data = [
                'user_id' => $userId,
                'poin_sementara' => $poin,
            ];
            $this->insert($data);
        }
    }

    public function updatePoinProduk($userId, $hargaProduk)
    {
        $existingPoin = $this->getPoinByUserId($userId);

        if ($existingPoin) {
            $newPoin = $existingPoin['poin'] - $hargaProduk;
            $data = [
                'poin' => $newPoin
            ];
            $this->update($existingPoin['id'], $data);
        } else {
            $data = [
                'user_id' => $userId,
                'poin' => -$hargaProduk,
            ];
            $this->insert($data);
        }
    }

    public function getPoinByUserId($userId)
    {
        return $this->where('user_id', $userId)->get()->getRowArray();
    }

    public function getdataPoin($userId)
    {
        return $this->db->table('poin')
            ->where('user_id', $userId)
            ->get()->getRowArray();
    }

    public function transferPoin($userId)
    {
        // Cek apakah pengguna memiliki poin sementara
        $existingPoin = $this->getPoinByUserId($userId);

        if ($existingPoin && $existingPoin['poin_sementara'] > 0) {
            // Jika pengguna memiliki poin sementara, pindahkan ke kolom 'poin' dan kurangi poin sementara
            $newPoin = $existingPoin['poin'] + $existingPoin['poin_sementara'];

            $data = [
                'poin' => $newPoin,
                'poin_sementara' => 0,
            ];
            $this->update($existingPoin['id'], $data);
        }
    }

    public function setPoinSementaraToZero($userId)
    {
        $existingPoin = $this->getPoinByUserId($userId);

        if ($existingPoin) {
            $data = [
                'poin_sementara' => 0,
            ];
            $this->update($existingPoin['id'], $data);
        }
    }
}

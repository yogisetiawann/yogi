<?php

namespace App\Models;

use CodeIgniter\Model;

class MDataVoucher extends Model
{
    protected $table = 'data_voucher';
    protected $primaryKey = 'id_voucher';
    protected $allowedFields = ['file_name', 'file_path'];

    public function getDataVoucher()
    {
        return $this->db->table('data_voucher')->get()->getResultArray();
    }

    public function inserWTODataVoucher($data)
    {

        $this->db->table('data_voucher')->insert($data);
    }

    public function getVoucher($id)
    {
        return $this->db->table('data_voucher')
            ->where('id_voucher', $id)
            ->get()->getRowArray();
    }

    public function editDataVoucher($data)
    {
        // Periksa apakah ada file gambar yang diunggah
        // if (!empty($_FILES['file_name']['file_name'])) {
        //     $gambar = $this->request->getFile('file_name');

        //     if ($gambar->isValid() && !$gambar->hasMoved()) {
        //         $newName = $gambar->getRandomName();
        //         $gambar->move(ROOTPATH . 'uploads/', $newName);

        //         // Hapus file gambar lama jika ada
        //         $oldImage = $this->db->table('data_voucher')->select('file_name')->where('id_voucher', $data['id_voucher'])->get()->getRow();
        //         if ($oldImage && file_exists(ROOTPATH . 'uploads/' . $oldImage->file_name)) {
        //             unlink(ROOTPATH . 'uploads/' . $oldImage->file_name);
        //         }

        //         // Update informasi file gambar baru ke database
        //         $data['file_name'] = $newName;
        //         $data['file_path'] = 'uploads/' . $newName;
        //     }
        // }

        $this->db->table('data_voucher')->where('id_voucher', $data['id_voucher'])->update($data);
    }

    public function hapusDataVoucher($data)
    {
        $this->db->table('data_voucher')->where('id_voucher', $data['id_voucher'])->delete($data);
    }
}

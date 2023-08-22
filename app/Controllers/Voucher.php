<?php

namespace App\Controllers;

use App\Models\MDataVoucher;

use App\Controllers\BaseController;

class Voucher extends BaseController
{
    private $MDataVoucher;
    public function __construct()
    {
        helper('form');
        $this->MDataVoucher = new MDataVoucher();
    }
    public function index()
    {
        $data = [
            'title' => 'datavoucher',
            'data' => $this->MDataVoucher->getDataVoucher()
        ];
        echo view('admin_header', $data);
        echo view('v_tabelvoucher', $data);
        echo view('admin_footer', $data);
    }


    public function voucher()
    {
        $data = [
            'title' => 'datavoucher',
            'isi' => $this->MDataVoucher->getDataVoucher()
        ];
    }

    public function inserWTODataVoucher()
    {
        //$request = \Config\Services::request();
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads/', $newName);

            // Simpan informasi file ke database

            $data = [

                'id_voucher' => $this->request->getPost('id_voucher'),
                'nama_voucher' => $this->request->getPost('nama_voucher'),
                'jenis_voucher' => $this->request->getPost('jenis_voucher'),
                'file_name' => $newName,
                'jumlah' => $this->request->getPost('jumlah'),
                'file_path' => 'uploads/' . $newName,
            ];
            $this->MDataVoucher->inserWTODataVoucher($data);

            echo 'File berhasil diunggah dan informasi disimpan ke database.';
        } else {
            echo 'Terjadi kesalahan dalam mengunggah file.';
        }
        session()->setFlashdata('pesan', 'Berhasil Menambahkan Data');
        return redirect()->to(base_url('Voucher'));
    }

    public function edit($id)
    {
        $voucher = $this->MDataVoucher->getVoucher($id);
        $data = [
            'title' => 'edit voucher',
            'data' => $voucher
        ];
        echo view('admin_header', $data);
        echo view('v_editvoucher', $data);
        echo view('admin_footer', $data);
    }

    public function prosesedit()
    {
        $gambar = $this->request->getFile('file_name');
        if ($gambar->getError() == 4) {
            $data = [
                'id_voucher' => $this->request->getPost('id_voucher'),
                'nama_voucher' => $this->request->getPost('nama_voucher'),
                'jenis_voucher' => $this->request->getPost('jenis_voucher'),
                'jumlah' => $this->request->getPost('jumlah'),
            ];
            $this->MDataVoucher->editDataVoucher($data);
            session()->setFlashdata('pesan', 'Berhasil Merubah Data');
            return redirect()->to(base_url('Voucher'));
        } else {
            // get nama foto baru
            $getData = $this->MDataVoucher->getVoucher($this->request->getPost('id_voucher'));
            // hapus foto lama
            unlink('uploads/' . $getData['file_name']);

            // generate nama baru
            $namaBaru = $gambar->getRandomName();

            // pindah lokasi gambar
            $gambar->move('uploads', $namaBaru);

            $data = [
                'id_voucher' => $this->request->getPost('id_voucher'),
                'nama_voucher' => $this->request->getPost('nama_voucher'),
                'jenis_voucher' => $this->request->getPost('jenis_voucher'),
                'file_name' => $namaBaru,
                'file_path' => 'uploads/' . $namaBaru,
                'jumlah' => $this->request->getPost('jumlah'),
            ];
            $this->MDataVoucher->editDataVoucher($data);
            session()->setFlashdata('pesan', 'Berhasil Merubah Data');
            return redirect()->to(base_url('Voucher'));
        }
    }

    public function hapus($id)
    {
        $data = [
            'id_voucher' => $id
        ];
        $this->MDataVoucher->hapusDataVoucher($data);
        session()->setFlashdata('pesan', 'Berhasil Merubah Data');
        return redirect()->to(base_url('Voucher'));
    }
}

<?php

namespace App\Controllers;

use App\Models\MDataSampah;
use App\Models\TransaksiModel;

use App\Controllers\BaseController;

class Sampah extends BaseController
{
    private $MDataSampah;

    public function __construct()
    {
        helper('form');
        $this->MDataSampah = new MDataSampah();
    }

    public function index()
    {
        $transaksiModel = new TransaksiModel();
        $dataTransaksi = $transaksiModel->getDataTransaksi();
        $data = [
            'title' => 'datasampah',
            'data' => $this->MDataSampah->getDataSampah(),
            'dataTransaksi' => $dataTransaksi,
        ];
        echo view('admin_header', $data);
        echo view('v_tabelsampah', $data);
        echo view('admin_footer', $data);
    }

    public function getTotalSampah()
    {
        $jumlah = $this->MDataSampah->getTotalSampah();
        return $jumlah;
    }



    public function sampah()
    {
        $data = [
            'title' => 'datasampah',
            'isi' => $this->MDataSampah->getDataSampah()
        ];
        echo view('admin_header', $data);
        echo view('v_tabelsampah', $data);
        echo view('admin_footer', $data);
    }

    public function inserWTODataSampah()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama_sampah' => $this->request->getPost('nama_sampah'),
            'jenis_sampah' => $this->request->getPost('jenis_sampah'),
            'harga_sampah' => $this->request->getPost('harga_sampah'),
        ];
        $this->MDataSampah->inserWTODataSampah($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Sampah'));
    }

    public function edit($id)
    {
        $sampah = $this->MDataSampah->getSampah($id);
        $data = [
            'title' => 'edit sampah',
            'data' => $sampah
        ];
        echo view('admin_header', $data);
        echo view('v_editsampah', $data);
        echo view('admin_footer', $data);
    }

    public function prosesedit()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nama_sampah' => $this->request->getPost('nama_sampah'),
            'jenis_sampah' => $this->request->getPost('jenis_sampah'),
            'harga_sampah' => $this->request->getPost('harga_sampah'),
        ];
        $this->MDataSampah->editDataSampah($data);
        session()->setFlashdata('success', 'Data berhasil diubah');
        return redirect()->to(base_url('Sampah'));
    }

    public function hapus($id)
    {
        $data = [
            'id' => $id
        ];
        $this->MDataSampah->hapusDataSampah($data);
        session()->setFlashdata('success', 'Berhasil Menghapus Data');
        return redirect()->to(base_url('Sampah'));
    }

    public function search()
    {
        $searchTerm = $this->request->getGet('search');

        $data['data'] = $this->MDataSampah->searchSampah($searchTerm);

        echo view('admin_header', $data);
        echo view('v_tabelsampah', $data);
        echo view('admin_footer', $data);
    }


    public function getNamaSampah($id)
    {
        $sampah = $this->MDataSampah->getDataSampahById($id);
        return $sampah['nama_sampah'];
    }
}

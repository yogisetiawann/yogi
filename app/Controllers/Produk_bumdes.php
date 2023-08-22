<?php

namespace App\Controllers;

use App\Models\MDataProduk;
use App\Controllers\BaseController;
use App\Models\KodeVoucher;
use App\Models\MPoin;

class Produk_bumdes extends BaseController
{
    private $MDataProduk;
    private $MPoin;
    private $kodeVoucher;
    protected $voucherModel;


    public function __construct()
    {
        helper('form');
        $this->MDataProduk = new MDataProduk();
        $this->MPoin = new MPoin();
        $this->kodeVoucher = new KodeVoucher();
        $this->voucherModel = new KodeVoucher();
    }

    public function index()
    {
        $data = [
            'title' => 'datasampah',
            'data' => $this->MDataProduk->getDataProduk()
        ];
        echo view('bumdes/admin_header_bumdes', $data);
        echo view('bumdes/v_tabelproduk_b', $data);
        echo view('bumdes/admin_footer_bumdes', $data);
    }

    public function exchangePoin($productId)
    {
        $userId = session()->get('id'); // Ganti dengan ID pengguna yang sesuai
        $product = $this->MDataProduk->getDataProdukById($productId);
        $userPoin = $this->MPoin->getdataPoin($userId)['poin'];

        if ($product && $userPoin >= $product['harga']) {
            // Pengguna memiliki cukup poin untuk menukar voucher
            $poinSaatIni = $userPoin - $product['harga']; // Mengurangi poin pengguna dengan harga produk

            // Perbarui poin pengguna di tabel poin
            $this->MPoin->updatePoin($userId, $poinSaatIni);

            // Generate kode voucher (contoh: kode voucher sesuai dengan ID produk)
            $kodeVoucher = 'Voucher' . $product['id'];

            // Simpan kode voucher ke database atau lakukan tindakan lain sesuai kebutuhan aplikasi Anda
            // Misalnya:
            $data = [
                'user_id' => $userId,
                'kode_voucher' => $kodeVoucher,
                'produk_id' => $productId
            ];
            $this->MDataProduk->insertKodeVoucher($data);

            session()->setFlashdata('pesan', 'Voucher berhasil ditukarkan!');
        } else {
            session()->setFlashdata('pesan', 'Poin tidak mencukupi untuk menukar voucher ini.');
        }

        return redirect()->to(base_url('Produk_bumdes'));
    }

    public function insertDataProduk()
    {
        $gambar = $this->request->getFile('gambar_produk');

        if ($gambar != null && $gambar->isValid() && !$gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads/', $newName);

            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'gambar_produk' => $newName,
                'path_gambar' => 'uploads/' . $newName,
                'harga' => $this->request->getPost('harga'),
                'stok' => $this->request->getPost('stok'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status_produk' => 'aktif',
            ];

            $this->MDataProduk->insertDataProduk($data);
            session()->setFlashdata('pesan', 'Berhasil Menambahkan Data');
        } else {
            session()->setFlashdata('pesan', 'Terjadi kesalahan dalam mengunggah file.');
        }

        return redirect()->to(base_url('Produk_bumdes'));
    }

    public function edit($id)
    {
        $dataProduk = $this->MDataProduk->getDataProdukById($id);

        if ($dataProduk) {
            $data = [
                'title' => 'Edit Produk',
                'data' => $dataProduk
            ];

            return view('bumdes/admin_header_bumdes', $data) .
                view('bumdes/v_editproduk_b', $data) .
                view('bumdes/admin_footer_bumdes', $data);
        } else {
            // Produk tidak ditemukan, lakukan penanganan error di sini
            // Misalnya:
            session()->setFlashdata('pesan', 'Produk tidak ditemukan');
            return redirect()->to(base_url('Produk_bumdes'));
        }
    }

    public function updateDataProduk()
    {
        $gambar = $this->request->getFile('gambar_produk');
        $id = $this->request->getPost('id');

        $data = [
            'id' => $id,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'keterangan' => $this->request->getPost('keterangan'),
            'stok' => $this->request->getPost('stok'),
        ];

        if ($gambar->getError() == 4) {
            // Jika tidak ada gambar yang diupload
            $this->MDataProduk->editDataProduk($data);
        } else {
            // Jika ada gambar yang diupload
            $getData = $this->MDataProduk->getDataProdukById($id);
            unlink(ROOTPATH . 'public/' . $getData['path_gambar']);

            $newName = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads/', $newName);

            $data['gambar_produk'] = $newName;
            $data['path_gambar'] = 'uploads/' . $newName;

            $this->MDataProduk->editDataProduk($data);
        }

        session()->setFlashdata('pesan', 'Berhasil Mengupdate Data');

        return redirect()->to(base_url('Produk_bumdes'));
    }


    public function delete($id)
    {
        $getData = $this->MDataProduk->getDataProdukById($id);
        unlink(ROOTPATH . 'public/' . $getData['path_gambar']);

        $this->MDataProduk->deleteDataProduk($id);
        session()->setFlashdata('pesan', 'Berhasil Menghapus Data');

        return redirect()->to(base_url('Produk_bumdes'));
    }

    public function cariVoucher()
    {
        $search = $this->request->getVar('search'); // Mendapatkan kata kunci pencarian dari input form

        $data = [
            'title' => 'datasampah',
            'data' => $this->kodeVoucher->searchVoucher($search), // Melakukan pencarian dengan kata kunci
        ];

        echo view('bumdes/admin_header_bumdes', $data);
        echo view('bumdes/v_tabelcarivoucher_b', $data);
        echo view('bumdes/admin_footer_bumdes', $data);
    }

    public function validasiVoucher($voucherId)
    {
        // Lakukan validasi voucher dengan mengubah status menjadi "berhasil divalidasi" di database
        $data = [
            'status_voucher' => 'berhasil digunakan'
        ];
        $this->voucherModel->update($voucherId, $data);


        // Tampilkan pesan berhasil di validasi dan hapus data voucher
        session()->setFlashdata('success', 'Voucher berhasil divalidasi dan dihapus.');

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }

    public function activate($id)
    {
        $status = 'aktif'; // Set status menjadi aktif

        $this->MDataProduk->updateStatusProduk($id, $status);

        session()->setFlashdata('pesan', 'Produk berhasil diaktifkan');

        return redirect()->to(base_url('Produk_bumdes'));
    }

    public function deactivate($id)
    {
        $status = 'tidak aktif'; // Set status menjadi tidak aktif

        $this->MDataProduk->updateStatusProduk($id, $status);

        session()->setFlashdata('pesan', 'Produk berhasil dinonaktifkan');

        return redirect()->to(base_url('Produk_bumdes'));
    }
}

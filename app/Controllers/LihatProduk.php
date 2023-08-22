<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MDataProduk;
use App\Models\MPoin;
use App\Models\KodeVoucher;

class LihatProduk extends BaseController
{
    protected $produkModel;
    protected $voucherModel;

    public function __construct()
    {
        $this->produkModel = new MDataProduk();
        $this->voucherModel = new KodeVoucher();
    }

    public function index()
    {
        $poinModel = new MPoin();

        $userId = session()->get('id'); // Mendapatkan ID pengguna dari session

        // Mengambil data produk berdasarkan status_produk
        $data['data'] = $this->produkModel->getDataProdukByStatus('aktif');
        $data['poin'] = $poinModel->getdataPoin($userId); // Ganti $userId dengan ID pengguna yang sesungguhnya

        $data['kode_voucher'] = $this->produkModel->getRiwayatVoucherByUserId($userId);

        echo view('/user/tampilan_user_header', $data);
        echo view('v_lihatproduk', $data);
        // echo view('/user/tampilan_user_footer', $data);
    }


    public function tukarPoin($productId)
    {
        $poinModel = new MPoin();
        $MDataProduk = new MDataProduk();
        $KodeVoucher = new KodeVoucher();

        $userId = session()->get('id'); // Mendapatkan ID pengguna dari session
        $tanggal = date('Y-m-d'); // Mendapatkan tanggal saat ini
        $voucher = $this->produkModel->find($productId);
        

        // Mendapatkan poin sebelum melakukan tukar poin
        $dataPoin = $poinModel->getdataPoin($userId);
        if ($dataPoin && isset($dataPoin['poin'])) {
            $poinSebelumnya = $dataPoin['poin'];
        } else {
            session()->setFlashdata('pesan', 'Poinmu tidak cukup');
            return redirect()->to(base_url('LihatProduk'));
        }

        $product = $this->produkModel->getDataProdukById($productId);
        if ($product && isset($product['harga']) && isset($product['stok'])) {
            $hargaProduk = $product['harga'];
            $userPoin = $poinSebelumnya;

            if ($userPoin >= $hargaProduk && $product['stok'] > 0) {
                // Pengguna memiliki cukup poin dan stok produk tersedia
                $poinModel->updatePoinProduk($userId, $hargaProduk); // Kurangi poin pengguna
                $this->produkModel->decreaseStok($productId); // Kurangi stok produk

                $updatedProduct = $this->produkModel->getDataProdukById($productId); // Mengambil data produk setelah pengurangan stok

                // Generate kode voucher
                $kodeVoucher = $this->generateRandomVoucherCode(6);
                $voucher = $this->produkModel->find($productId);

                // Simpan kode voucher ke database
                $data = [
                    'user_id' => $userId,
                    'kode_voucher' => $kodeVoucher,
                    'produk_id' => $productId,
                    'status_voucher' => 'belum digunakan',
                    'tanggal' => $tanggal, // Simpan tanggal saat ini
                    'stok_voucher' => $voucher['stok'] // Set stok voucher dengan nilai stok produk setelah pengurangan
                ];

                $KodeVoucher->insert($data); // Menyimpan data voucher ke dalam tabel kode_voucher

                // Mengurangi poin pengguna dengan harga produk
                $userPoin -= $hargaProduk;

                $hasil['pesan'] = 'Voucher berhasil ditukarkan!';
                $hasil['kode_voucher'] = $kodeVoucher;
                $hasil['poinSebelumnya'] = $poinSebelumnya;
                $hasil['hargaProduk'] = $hargaProduk;
                $hasil['userPoin'] = $userPoin;
                $hasil['keterangan'] = $product['keterangan']; // Menambahkan keterangan produk ke dalam hasil

                return view('hasil_transaksi_voucher', $hasil);
            } else {
                session()->setFlashdata('pesan', 'Poin Anda tidak mencukupi');
                return redirect()->to(base_url('LihatProduk'));
            }
        } else {
            session()->setFlashdata('pesan', 'Gagal mendapatkan informasi produk.');
            return redirect()->to(base_url('LihatProduk'));
        }
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

    public function nonaktifkanVoucher($id)
    {
        $voucher = $this->voucherModel->find($id); // Menggunakan metode `find` untuk mencari voucher berdasarkan ID

        if (!$voucher) {
            return redirect()->back()->with('error', 'Voucher tidak ditemukan.');
        }

        $data = [
            'id' => $id,
            'status_voucher' => 'Voucher Tidak Aktif'
        ];

        $this->voucherModel->update($id, $data); // Menggunakan metode `update` untuk mengubah data voucher

        session()->setFlashdata('success_message', 'Voucher berhasil dinonaktifkan.');
        return redirect()->back();
    }


    // Fungsi untuk menghapus voucher oleh admin
    public function hapusVoucher($voucherId)
    {
        // Hapus data voucher dari database
        $this->voucherModel->delete($voucherId);

        // Tampilkan pesan berhasil dihapus
        return redirect()->back()->with('pesan', 'Voucher berhasil dihapus.');
    }

    public function nonaktifkanProduk($produkId)
    {
        // Lakukan perubahan status produk menjadi "nonaktif" di database
        $data = [
            'status_produk' => 'nonaktif'
        ];
        $this->produkModel->update($produkId, $data);

        // Tampilkan pesan berhasil nonaktifkan produk
        session()->setFlashdata('success', 'Produk berhasil dinonaktifkan.');

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }

    public function aktifkanProduk($produkId)
    {
        // Lakukan perubahan status produk menjadi "aktif" di database
        $data = [
            'status_produk' => 'aktif'
        ];
        $this->produkModel->update($produkId, $data);

        // Tampilkan pesan berhasil aktifkan produk
        session()->setFlashdata('success', 'Produk berhasil diaktifkan.');

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }


    public function search()
    {
        $keyword = $this->request->getVar('search');

        $produkModel = new MDataProduk();
        $data['data'] = $produkModel->search($keyword);

        echo view('/user/tampilan_user_header', $data);
        echo view('v_lihatproduk', $data);
    }

    public function filterByPrice()
    {
        $minPrice = $this->request->getVar('min_price');
        $maxPrice = $this->request->getVar('max_price');

        // Lakukan query berdasarkan kriteria filter harga
        $produkModel = new MDataProduk();
        $data['data'] = $produkModel
            ->filterByPrice($minPrice, $maxPrice)
            ->findAll();

        echo view('v_lihatproduk', $data);
        echo view('tampilan_user', $data);
    }

    public function riwayatVoucher($productId)
    {
        $produkModel = new MDataProduk();

        // Mendapatkan data riwayat voucher berdasarkan ID produk
        $data['data'] = $produkModel->getRiwayatVoucherByProductId($productId);

        return view('tampilan_user', $data);
    }

    private function generateRandomVoucherCode($length)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $code .= $characters[$index];
        }

        return $code;
    }
}

<?php

namespace App\Controllers;

use App\Models\MDataProduk;
use App\Controllers\BaseController;
use App\Models\KodeVoucher;
use App\Models\MPoin;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Produk extends BaseController
{
    private $MDataProduk;
    private $MPoin;
    private $kodeVoucher;

    public function __construct()
    {
        helper('form');
        $this->MDataProduk = new MDataProduk();
        $this->MPoin = new MPoin();
        $this->kodeVoucher = new KodeVoucher();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Sampah',
            'data' => $this->MDataProduk->getDataProduk()
        ];
        return view('admin_header', $data)
            . view('v_tabelproduk', $data)
            . view('admin_footer', $data);
    }

    public function laporanVoucher()
    {
        $bulan = $this->request->getPost('bulan');

        $data = [
            'title' => 'Laporan Voucher',
            'bulan' => $bulan,
            'laporan' => $this->MDataProduk->getProdukWithVoucherByBulan($bulan),
        ];

        echo view('admin_header', $data);
        echo view('v_laporan_voucher', $data);
        echo view('admin_footer', $data);
    }

    public function cetakLaporanVoucherPDF()
    {
        $bulan = $this->request->getPost('bulan');
        $laporan = $this->MDataProduk->getProdukWithVoucherByBulan($bulan);

        $data = [
            'bulan' => $bulan,
            'laporan' => $laporan,
        ];

        $html = view('v_laporan_voucher_pdf', $data);

        // Inisialisasi objek Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        // Menentukan direktori penyimpanan sementara untuk Dompdf


        // Mengatur opsi dan konfigurasi Dompdf
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Menghasilkan file PDF dan mengirim ke browser untuk diunduh
        $dompdf->stream("Laporan Voucher Bulan $bulan.pdf", ['Attachment' => 0]);
        
    }

    public function cetakLaporanVoucherExcel()
    {
        $bulan = $this->request->getPost('bulan');
        $laporan = $this->MDataProduk->getProdukWithVoucherByBulan($bulan);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menulis header tabel
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Nama User');
        $sheet->setCellValue('D1', 'Nama Voucher');
        $sheet->setCellValue('E1', 'Harga (poin)');
        $sheet->setCellValue('F1', 'Stok Voucher');
        $sheet->setCellValue('G1', 'Kode Voucher');
        $sheet->setCellValue('H1', 'Status Voucher');

        // Menulis data laporan voucher
        $row = 2;
        $no = 1;
        foreach ($laporan as $item) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $item['tanggal']);
            $sheet->setCellValue('C' . $row, $item['username']);
            $sheet->setCellValue('D' . $row, $item['nama_produk']);
            $sheet->setCellValue('E' . $row, $item['harga']);
            $sheet->setCellValue('F' . $row, $item['stok_voucher']);
            $sheet->setCellValue('G' . $row, $item['kode_voucher']);
            $sheet->setCellValue('H' . $row, $item['status_voucher']);

            $row++;
        }

        // Menyimpan file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = "Laporan Voucher Bulan $bulan.xlsx";
        $writer->save($filename);

        // Mengirim file Excel untuk diunduh
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
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

        return redirect()->to(base_url('Produk'));
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
                'keterangan' => $this->request->getPost('keterangan')
            ];

            $this->MDataProduk->insertDataProduk($data);
            session()->setFlashdata('pesan', 'Berhasil Menambahkan Data');
        } else {
            session()->setFlashdata('pesan', 'Terjadi kesalahan dalam mengunggah file.');
        }

        return redirect()->to(base_url('Produk'));
    }

    public function edit($id)
    {
        $dataProduk = $this->MDataProduk->getDataProdukById($id);

        if ($dataProduk) {
            $data = [
                'title' => 'Edit Produk',
                'data' => $dataProduk
            ];

            return view('admin_header', $data) .
                view('v_editproduk', $data) .
                view('admin_footer', $data);
        } else {
            // Produk tidak ditemukan, lakukan penanganan error di sini
            // Misalnya:
            session()->setFlashdata('pesan', 'Produk tidak ditemukan');
            return redirect()->to(base_url('Produk'));
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

        return redirect()->to(base_url('Produk'));
    }


    public function delete($id)
    {
        $getData = $this->MDataProduk->getDataProdukById($id);
        unlink(ROOTPATH . 'public/' . $getData['path_gambar']);

        $this->MDataProduk->deleteDataProduk($id);
        session()->setFlashdata('pesan', 'Berhasil Menghapus Data');

        return redirect()->to(base_url('Produk'));
    }

    public function cariVoucher()
    {
        $search = $this->request->getVar('search'); // Mendapatkan kata kunci pencarian dari input form

        $data = [
            'title' => 'datasampah',
            'data' => $this->kodeVoucher->searchVoucher($search), // Melakukan pencarian dengan kata kunci
        ];
        session()->setFlashdata('berhasil', 'Berhasil memvalidasi voucher');
        echo view('admin_header', $data);
        echo view('v_tabelcarivoucher', $data);
        echo view('admin_footer', $data);
    }

    // ...

    public function activate($id)
    {
        $status = 'aktif'; // Set status menjadi aktif

        $this->MDataProduk->updateStatusProduk($id, $status);

        session()->setFlashdata('pesan', 'Produk berhasil diaktifkan');

        return redirect()->to(base_url('Produk'));
    }

    public function deactivate($id)
    {
        $status = 'tidak aktif'; // Set status menjadi tidak aktif

        $this->MDataProduk->updateStatusProduk($id, $status);

        session()->setFlashdata('pesan', 'Produk berhasil dinonaktifkan');

        return redirect()->to(base_url('Produk'));
    }
}

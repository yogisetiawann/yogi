<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\MDataSampah;
use App\Models\MPoin;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Dompdf\Dompdf;
use DateTime;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Transaksi extends BaseController
{
    private $TransaksiModel;
    private $PoinModel;

    public function __construct()
    {
        helper('form');
        $this->TransaksiModel = new TransaksiModel();
        $this->PoinModel = new MPoin();
    }

    public function index()
    {
        $data = [
            'title' => 'datasampah',
            'data' => $this->TransaksiModel->getDataTransaksi(),
        ];
        echo view('admin_header', $data);
        echo view('v_tabeltransaksi', $data);
        echo view('admin_footer', $data);
    }

    public function laporan()
    {
        $bulan = $this->request->getPost('bulan'); // Bulan yang diinginkan

        // Mengambil laporan berdasarkan tanggal dan bulan
        $data = [
            'title' => 'Laporan Penjualan',
            'laporan' => $this->TransaksiModel->getDataTransaksiByBulan($bulan),
            'dataSampah' => $this->TransaksiModel->getDataSampah(), // Fetch data sampah here
            'bulan' => $bulan ? $bulan : 0, // Pass the selected month to the view
        ];

        echo view('admin_header', $data);
        echo view('v_laporan', $data);
        echo view('admin_footer', $data);
    }


    public function printExcel($bulan)
    {
        $laporan = $this->TransaksiModel->getDataTransaksiByBulan($bulan);
        $totalBerat = $this->TransaksiModel->getTotalBeratByBulan($bulan);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Tanggal Transaksi');
        $sheet->setCellValue('B1', 'Nama Akun');
        $sheet->setCellValue('C1', 'Jenis Sampah');
        $sheet->setCellValue('D1', 'Total Berat (kg)');

        $row = 2;
        foreach ($laporan as $item) {
            $sheet->setCellValue('A' . $row, $item['tanggal']);
            $sheet->setCellValue('B' . $row, $item['username']);
            $sheet->setCellValue('C' . $row, $item['nama_sampah']);
            $sheet->setCellValue('D' . $row, $item['total_berat']);
            $row++;
        }

        // Set total berat
        $sheet->setCellValue('D' . $row, implode(', ', $totalBerat));

        // Set total keseluruhan
        $totalKeseluruhanRow = $row; // Baris ke-7
        $sheet->mergeCells('A' . $totalKeseluruhanRow . ':C' . $totalKeseluruhanRow);
        $sheet->getStyle('A' . $totalKeseluruhanRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('A' . $totalKeseluruhanRow, 'Total Keseluruhan');
        $sheet->getStyle('D' . $totalKeseluruhanRow)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Set styling for total keseluruhan
        $sheet->getStyle('A' . $totalKeseluruhanRow . ':D' . $totalKeseluruhanRow)->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'FFFF00',
                ],
            ],
        ]);

        $writer = new Xlsx($spreadsheet);
        $filename = 'laporan_' . date('YmdHis') . '.xlsx';
        $writer->save($filename);

        // Force the browser to download the file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        readfile($filename);
        unlink($filename); // Remove the temporary file
    }




    public function printPDF($bulan)
    {
        $laporan = $this->TransaksiModel->getDataTransaksiByBulan($bulan);
        $totalBerat = $this->TransaksiModel->getTotalBeratByBulan($bulan);

        // Mengubah array $totalBerat menjadi string dengan koma sebagai pemisah
        $totalBeratString = implode(', ', $totalBerat);

        $html = view('v_laporan_pdf', ['laporan' => $laporan, 'bulan' => $bulan, 'totalBerat' => $totalBeratString]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('laporan_' . date('YmdHis') . '.pdf', ['Attachment' => false]);
    }



    public function calculate()
    {
        // Menghitung total harga transaksi berdasarkan berat dan jenis sampah
        $weight = $this->request->getPost('weight');
        $jenis_sampah = $this->request->getPost('jenis_sampah');
        $nama_sampah = $this->request->getPost('nama_sampah');

        // Mendapatkan tanggal dan waktu saat ini
        $now = new DateTime();
        $tanggal = $now->format('Y-m-d');

        $jam = $now->format('H');
        $menit = $now->format('i');
        $detik = $now->format('s');

        $sampahModel = new MDataSampah();
        $sampah = $sampahModel->getSampahByJenisNama($jenis_sampah, $nama_sampah);

        if ($sampah) {
            $harga_sampah = $sampah['harga_sampah'];
            $price = $harga_sampah * $weight;

            $userId = session()->get('id');
            $poinData = $this->PoinModel->getDataPoin($userId);
            $poinSementara = $poinData['poin_sementara'] ?? 0;

            if ($poinSementara == 0) {
                // Menyimpan transaksi ke dalam database
                $transaksiData = [
                    'berat' => $weight,
                    'total_harga' => $price,
                    'data_sampah_id' => $sampah['id'],
                    'user_id' => $userId,
                    'status_verifikasi' => 'pending',
                    'tanggal' => $tanggal, // Tambahkan kolom tanggal
                    'jam' => $jam, // Tambahkan kolom jam
                    'menit' => $menit, // Tambahkan kolom menit
                    'detik' => $detik, // Tambahkan kolom detik
                ];

                $this->TransaksiModel->insert($transaksiData);

                // Memperbarui poin pengguna berdasarkan total harga transaksi
                $poin = intval($price / 1000);
                $this->PoinModel->updatePoin($userId, $poin);

                // Menambahkan poin ke tabeltransaksi
                $this->TransaksiModel->updatePoinTransaksi($userId, $poin);
                // Menampilkan hasil transaksi
                $pesan = 'Transaksi Anda akan diverifikasi oleh admin. Harap menunggu konfirmasi.';
                return view('hasil_transaksi', ['poin' => $poin, 'price' => $price, 'pesan' => $pesan]);
            } else {
                $pesan = 'Anda hanya dapat melakukan transaksi sekali! Anda harus menunggu status transaksi sebelumnya diverifikasi atau ditolak!';
                return view('hasil_transaksi', ['pesan' => $pesan]);
            }
        } else {
            session()->setFlashdata('error', 'Cek kembali sampah atau jenis sampah mu di List Sampah yang tersedia!');
            return redirect()->to(base_url('TabelTransaksi'));
        }
    }

    public function terimaTransaksi($id)
    {
        $transaksi = $this->TransaksiModel->find($id);
        if ($transaksi) {
            $userId = $transaksi['user_id'];
            $poinSementara = $transaksi['total_harga'] / 1000;

            // Transfer poin sementara ke kolom poin
            $this->PoinModel->transferPoin($userId);

            $this->TransaksiModel->updateStatusVerifikasi($id, 'terima');

            // Redirect atau tampilkan pesan berhasil
            session()->setFlashdata('success', 'Transaksi berhasil diterima.');
            return redirect()->to(base_url('Transaksi'));
        } else {
            // Penanganan kesalahan jika transaksi tidak ditemukan
        }
    }

    public function tolakTransaksi($id)
    {
        // Dapatkan transaksi berdasarkan ID
        $transaksi = $this->TransaksiModel->find($id);

        if ($transaksi) {
            $this->TransaksiModel->delete($id);

            // Perbarui status verifikasi menjadi 'tolak'
            // $this->TransaksiModel->updateVerifikasiTransaksi($id, 'tolak');

            // Set poin sementara menjadi 0
            $userId = $transaksi['user_id'];
            $this->PoinModel->setPoinSementaraToZero($userId);
        }

        session()->setFlashdata('success', 'Transaksi berhasil ditolak.');
        return redirect()->to(base_url('Transaksi'));
    }

    public function delete($id)
    {
        $transaksi = $this->TransaksiModel->find($id);
        if ($transaksi) {
            $this->TransaksiModel->delete($id);
            session()->setFlashdata('success', 'Transaksi berhasil dihapus.');
        }
        return redirect()->to(base_url('Transaksi'));
    }
}

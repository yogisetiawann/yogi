<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\MDataSampah;

class TabelTransaksi extends BaseController
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
            'options' => $this->getOptions(),
            'namasampah' => $this->filterNamaSampah('Organic'), // Menambahkan opsi ke data yang akan dikirim ke view
        ];

        // Tambahkan kondisi untuk memeriksa apakah jenis dan nama sampah ada dalam database
        $jenisSampah = $this->request->getPost('jenis_sampah');
        $namaSampah = $this->request->getPost('nama_sampah');

        if ($jenisSampah && $namaSampah) {
            $sampah = $this->MDataSampah->getSampahByJenisNama($jenisSampah, $namaSampah);

            if (!$sampah) {
                // Tampilkan SweetAlert jika sampah tidak ditemukan
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Sampah Tidak Ditemukan",
                        text: "Sampahmu tidak ada di list sampah. Silahkan cek kembali!"
                    });
                </script>';
            }
        }

        echo view('user/tampilan_user_header', $data);
        echo view('v_addtransaksi', $data);
    }

    public function getOptions()
    {
        $dataSampah = $this->MDataSampah->getDataSampah();
        $options = '';
        $jenisSampah = [];

        foreach ($dataSampah as $sampah) {
            if (!in_array($sampah['jenis_sampah'], $jenisSampah)) {
                $options .= '<option value="' . $sampah['jenis_sampah'] . '">' . $sampah['jenis_sampah'] . '</option>';
                $jenisSampah[] = $sampah['jenis_sampah'];
            }
        }

        return $options;
    }

    public function filterNamaSampah($jenis)
    {
        // if ($this->request->getPost('jenis_sampah') == '') {
        //     $jenis = 'Organic';
        // } else {
        //     $jenis = $this->request->getPost('jenis_sampah');
        // }
        $dataSampah = $this->MDataSampah->getSampahByJenis($jenis);
        $namasampah = '';

        foreach ($dataSampah as $sampah) {
            $namasampah .= '<option value="' . $sampah['nama_sampah'] . '">' . $sampah['nama_sampah'] . '</option>';
        }

        // dd($namasampah);
        return $namasampah;
    }
}

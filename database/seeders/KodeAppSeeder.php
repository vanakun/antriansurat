<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KodeApp;

class KodeAppSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [1000, 'AKTIVA'],
            [1100, 'Aktiva Lancar'],
            [1110, 'Kas'],
            [1120, 'Bank'],
            [1130, 'Investasi'],
            [1140, 'Piutang Usaha'],
            [1150, 'Piutang Lain-Lain'],
            [1160, 'Perlengkapan Kantor'],
            [1200, 'Uang Muka'],
            [1210, 'Biaya Di Bayar Dimuka'],
            [1220, 'Pajak di Bayar di Muka'],
            [1230, 'PPN Masukan'],
            [1300, 'Aset Tetap'],
            [1310, 'Inventaris'],
            [1350, 'Akumulasi Penyusutan Inventaris'],
            [1410, 'Aset Pajak Tangguhan'],
            [1510, 'Aset Tetap Tak Berwujud'],
            [1550, 'Amortisasi Aset Tetap Tak Berwujud'],
            [2000, 'Liabilitas'],
            [2100, 'Kewajiban Lancar'],
            [2120, 'Hutang Lainnya'],
            [2130, 'Hutang Pajak'],
            [2140, 'PPN Keluaran'],
            [2150, 'Pendapatan di Terima Di Muka'],
            [2200, 'Kewajiban Jangka Panjang '],
            [2210, 'Hutang Bank '],
            [2220, 'Liabilitas Imbalan Kerja '],
            [2230, 'Liabilitas Pajak Tangguhan '],
            [3000, 'EQUITAS '],
            [3100, 'Modal '],
            [3110, 'Modal Awal '],
            [3210, 'Tambahan Modal '],
            [3310, 'Prive dan Deviden '],
            [3410, 'Saldo Laba '],
            [3510, 'Laba Tahun Berjalan '],
            [4000, 'PENDAPATAN '],
            [4110, 'Pendapatan Usaha '],
            [4210, 'Pendapatan Luar Usaha '],
            [6000, 'BEBAN '],
            [6100, 'Beban Administrasi dan Umum '],
            [6110, 'Beban Administrasi '],
            [6120, 'Beban Perlengkapan '],
            [6110, 'Beban iklan dan Promosi '],
            [6200, 'Beban Karyawan '],
            [6210, 'Beban Gaji '],
            [6220, 'Beban Lembur '],
            [6230, 'Beban THR '],
            [6240, 'Beban Bonus '],
            [6250, 'Beban Kesehatan '],
            [6260, 'Beban Pesangon '],
            [6299, 'Total Beban Karyawan '],
            [6310, 'Beban Penyusutan Iventaris '],
            [6320, 'Beban Amortisasai Aset Tetap Tak Berwujud '],
            [6410, 'Beban Asuransi '],
            [6510, 'Beban Air, Listrik dan Telephone '],
            [6610, 'Beban Pajak '],
            [6710, 'Beban Sewa '],
            [6800, 'Beban Transportasi '],
            [6810, 'Bensin '],
            [6820, 'Service Kendaraan '],
            [6830, 'Tol dan Parkir '],
            [6840, 'STNK dan Kir '],
            [6899, 'Total Beban Transportasi '],
            [6910, 'Beban Entertain '],
            [6999, 'Jumlah Beban Usaha '],
            [8110, 'Laba Sebelum Pajak '],
            [2110, 'Hutang Usaha '],
            [8210, 'Pajak Penghasilan'],
            [6950, 'Laba Bersih Setelah Pajak'],
        ];

        foreach ($data as $item) {
            KodeApp::create([
                'kode' => $item[0],
                'nama' => $item[1],
            ]);
        }
    }
}

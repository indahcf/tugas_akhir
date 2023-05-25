<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kelas extends Seeder
{
    public function run()
    {
        // membuat data
        $kelas_data = [
            [
                'id_matkul'         => 1,
                'id_dosen'          => 1,
                'id_prodi'          => 1,
                'kelas'             => 'A',
                'jumlah_mahasiswa'  => 58
            ]
        ];

        foreach ($kelas_data as $data) {
            // insert semua data ke tabel
            $this->db->table('kelas')->insert($data);
        }
    }
}
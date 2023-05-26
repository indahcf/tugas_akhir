<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalUjianModel extends Model
{
    protected $table            = 'jadwal_ujian';
    protected $primaryKey       = 'id_jadwal_ujian';
    protected $allowedFields    = ['id_prodi', 'id_kelas', 'id_dosen', 'id_ruang_ujian', 'id_tahun_akademik', 'jumlah_peserta', 'tanggal', 'jam_mulai', 'jam_selesai', 'total_hadir', 'jumlah_lju'];
    protected $useTimestamps    = true;

    public function getJadwalUjian($id_jadwal_ujian = false)
    {
        if ($id_jadwal_ujian == false) {
            return $this->join('kelas', 'jadwal_ujian.id_kelas=kelas.id_kelas')->join('ruang_ujian', 'jadwal_ujian.id_ruang_ujian=ruang_ujian.id_ruang_ujian')->join('matkul', 'kelas.id_matkul=matkul.id_matkul')->join('dosen', 'kelas.id_dosen=dosen.id_dosen')->join('prodi', 'kelas.id_prodi=prodi.id_prodi')->findAll();
        }

        return $this->where(['jadwal_ujian.id_jadwal_ujian' => $id_jadwal_ujian])->join('prodi', 'jadwal_ujian.id_prodi=prodi.id_prodi')->join('kelas', 'jadwal_ujian.id_kelas=kelas.id_kelas')->join('dosen', 'jadwal_ujian.id_dosen=dosen.id_dosen')->join('ruang_ujian', 'jadwal_ujian.id_ruang_ujian=ruang_ujian.id_ruang_ujian')->join('tahun_akademik', 'jadwal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')->join('matkul', 'jadwal_ujian.id_matkul=matkul.id_matkul')->first();
    }



    public function allDosen($id_kelas)
    {
        return $this->db->table('dosen')->where('id_kelas', $id_kelas)->Get()->getRow();
    }
}

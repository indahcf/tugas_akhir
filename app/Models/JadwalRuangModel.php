<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalRuangModel extends Model
{
    protected $table            = 'jadwal_ruang';
    protected $primaryKey       = 'id_jadwal_ruang';
    protected $allowedFields    = ['id_jadwal_ujian', 'id_ruang_ujian', 'jumlah_peserta', 'status_distribusi'];
    protected $useTimestamps    = true;

    public function filterJadwalRuang($id_tahun_akademik, $periode_ujian)
    {
        // dd($id_tahun_akademik);
        // dd($periode_ujian);
        return $this->db->table('jadwal_ruang')
            ->select('jadwal_ruang.*, jadwal_ujian.*, ruang_ujian.*, kelas.*, matkul.*, dosen.*, prodi.*, tahun_akademik.*')
            ->join('jadwal_ujian', 'jadwal_ujian.id_jadwal_ujian=jadwal_ruang.id_jadwal_ujian', 'right')
            ->join('ruang_ujian', 'jadwal_ruang.id_ruang_ujian=ruang_ujian.id_ruang_ujian', 'left')
            ->join('kelas', 'jadwal_ujian.id_kelas=kelas.id_kelas')
            ->join('matkul', 'kelas.id_matkul=matkul.id_matkul')
            ->join('dosen', 'kelas.id_dosen=dosen.id_dosen')
            ->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
            ->join('tahun_akademik', 'jadwal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')
            ->where('jadwal_ujian.id_tahun_akademik', $id_tahun_akademik)
            ->where('periode_ujian', $periode_ujian)
            ->get()
            ->getResultArray();
    }
}

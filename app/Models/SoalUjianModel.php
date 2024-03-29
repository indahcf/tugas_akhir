<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalUjianModel extends Model
{
    protected $table            = 'soal_ujian';
    protected $primaryKey       = 'id_soal_ujian';
    protected $allowedFields    = ['id_tahun_akademik', 'id_dosen', 'soal_ujian', 'bentuk_soal', 'metode', 'status_soal', 'durasi_pengerjaan', 'sifat_ujian', 'petunjuk', 'sub_cpmk', 'durasi_sks', 'pertanyaan', 'skor', 'gambar', 'catatan', 'saran'];
    protected $useTimestamps    = true;

    public function filterSoalUjian($id_tahun_akademik)
    {
        return $this->join('soal_kelas', 'soal_ujian.id_soal_ujian=soal_kelas.id_soal_ujian')
            ->join('kelas', 'soal_kelas.id_kelas=kelas.id_kelas')
            ->join('matkul', 'kelas.id_matkul=matkul.id_matkul')
            ->join('dosen', 'soal_ujian.id_dosen=dosen.id_dosen')
            ->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
            ->join('tahun_akademik', 'soal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')
            ->where('soal_ujian.id_tahun_akademik', $id_tahun_akademik)
            ->orderBy('soal_ujian.created_at', 'ASC')
            ->findAll();
    }

    public function filterSoalUjianWithStatus($id_tahun_akademik)
    {
        return $this->join('soal_kelas', 'soal_ujian.id_soal_ujian=soal_kelas.id_soal_ujian')
            ->join('kelas', 'soal_kelas.id_kelas=kelas.id_kelas')
            ->join('matkul', 'kelas.id_matkul=matkul.id_matkul')
            ->join('dosen', 'soal_ujian.id_dosen=dosen.id_dosen')
            ->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
            ->join('tahun_akademik', 'soal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')
            ->where('soal_ujian.id_tahun_akademik', $id_tahun_akademik)
            ->whereIn('status_soal', ['Diterima', 'Dicetak']) // Use whereIn for multiple status values
            ->orderBy('soal_ujian.created_at', 'ASC')
            ->findAll();
    }

    public function filterSoalUjianDosen($id_tahun_akademik)
    {
        $id_users = user_id();
        $id_dosen = $this->db->table('dosen')->join('users', 'users.id=dosen.id_user')->where('id', $id_users)->Get()->getRow()->id_dosen;
        return $this->join('soal_kelas', 'soal_ujian.id_soal_ujian=soal_kelas.id_soal_ujian')
            ->join('kelas', 'soal_kelas.id_kelas=kelas.id_kelas')
            ->join('matkul', 'kelas.id_matkul=matkul.id_matkul')
            ->join('dosen', 'soal_ujian.id_dosen=dosen.id_dosen')
            ->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
            ->join('tahun_akademik', 'soal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')
            ->where('soal_ujian.id_tahun_akademik', $id_tahun_akademik)
            ->where('soal_ujian.id_dosen', $id_dosen)
            ->orderBy('soal_ujian.created_at', 'ASC')
            ->findAll();
    }

    public function filterSoalUjianProdiGkm($id_tahun_akademik)
    {
        $id_users = user_id();
        $id_dosen = $this->db->table('dosen')->join('users', 'users.id=dosen.id_user')->where('id', $id_users)->Get()->getRow()->id_dosen;
        $id_prodi = $this->db->table('dosen')->join('prodi', 'prodi.id_prodi=dosen.id_prodi')->where('id_dosen', $id_dosen)->Get()->getRow()->id_prodi;
        return $this->join('soal_kelas', 'soal_ujian.id_soal_ujian=soal_kelas.id_soal_ujian')
            ->join('kelas', 'soal_kelas.id_kelas=kelas.id_kelas')
            ->join('matkul', 'kelas.id_matkul=matkul.id_matkul')
            ->join('dosen', 'soal_ujian.id_dosen=dosen.id_dosen')
            ->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
            ->join('tahun_akademik', 'soal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')
            ->where('soal_ujian.id_tahun_akademik', $id_tahun_akademik)
            ->where('matkul.id_prodi', $id_prodi)
            ->orderBy('soal_ujian.created_at', 'ASC')
            ->findAll();
    }

    public function filterSoalUjianPencetakSoal($id_tahun_akademik)
    {
        $id_users = user_id();

        $prodi = $this->db->table('pencetak_soal')
            ->join('prodi', 'prodi.id_prodi=pencetak_soal.id_prodi')
            ->where('id_user', $id_users)
            ->Get()
            ->getResult();

        $id_prodi = [];

        if ($prodi == NULL) {
            return array();
        } else {
            foreach ($prodi as $p) {
                $id_prodi[] = $p->id_prodi;
            }
        }

        return $this->join('soal_kelas', 'soal_ujian.id_soal_ujian=soal_kelas.id_soal_ujian')
            ->join('kelas', 'soal_kelas.id_kelas=kelas.id_kelas')
            ->join('matkul', 'kelas.id_matkul=matkul.id_matkul')
            ->join('dosen', 'soal_ujian.id_dosen=dosen.id_dosen')
            ->join('prodi', 'matkul.id_prodi=prodi.id_prodi')
            ->join('tahun_akademik', 'soal_ujian.id_tahun_akademik=tahun_akademik.id_tahun_akademik')
            ->where('soal_ujian.id_tahun_akademik', $id_tahun_akademik)
            ->whereIn('status_soal', ['Diterima', 'Dicetak']) // Use whereIn for multiple status values
            ->whereIn('matkul.id_prodi', $id_prodi)
            ->orderBy('soal_ujian.created_at', 'ASC')
            ->findAll();
    }
}

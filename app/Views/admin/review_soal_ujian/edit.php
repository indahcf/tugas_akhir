<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Review Soal Ujian</h4>
                <form action="<?= base_url('/admin/user/update/' . $review_soal_ujian['id_soal_ujian']); ?>" method="post" class="forms-sample" id="form-edit">
                    <?= csrf_field(); ?>
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 300px;">Program Studi</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><?= old('prodi', $prodi_matkul); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Kode dan Mata Kuliah</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><?= old('kode_matkul', $kode_matkul); ?> - <?= old('matkul', $matkul); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Kelas</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><?= old('kelas', $kelas) ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Dosen Pembuat Soal</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><?= old('dosen', $review_soal_ujian['dosen']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Bentuk Soal</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><?= old('bentuk_soal', $review_soal_ujian['bentuk_soal']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Metode</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><?= old('metode', $review_soal_ujian['metode']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Durasi Waktu Pengerjaan Seluruh Butir</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="durasi_pengerjaan" id="durasi_pengerjaan" value="option1">
                                        <label class="mb-0" for="durasi_pengerjaan">Ada</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="durasi_pengerjaan" id="durasi_pengerjaan" value="option2">
                                        <label class="mb-0" for="durasi_pengerjaan">Tidak Ada</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Informasi Sifat Ujian (Terbuka/Tertutup)</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sifat_ujian" id="sifat_ujian" value="option1">
                                        <label class="mb-0" for="sifat_ujian">Ada</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sifat_ujian" id="sifat_ujian" value="option2">
                                        <label class="mb-0" for="sifat_ujian">Tidak Ada</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Petunjuk Cara Pengerjaan Soal</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="petunjuk" id="petunjuk" value="option1">
                                        <label class="mb-0" for="petunjuk">Ada</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="petunjuk" id="petunjuk" value="option2">
                                        <label class="mb-0" for="petunjuk">Tidak Ada</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Mengukur Sub-CPMK di RPS</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sub_cpmk" id="sub_cpmk" value="option1">
                                        <label class="mb-0" for="sub_cpmk">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sub_cpmk" id="sub_cpmk" value="option2">
                                        <label class="mb-0" for="sub_cpmk">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Kesesuaian Durasi Waktu Dengan Bobot SKS</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="durasi_sks" id="durasi_sks" value="option1">
                                        <label class="mb-0" for="durasi_sks">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="durasi_sks" id="durasi_sks" value="option2">
                                        <label class="mb-0" for="durasi_sks">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Kejelasan Pertanyaan (Standar : jelas dan tidak bermakna ganda/ambigu)</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan" id="pertanyaan" value="option1">
                                        <label class="mb-0" for="pertanyaan">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan" id="pertanyaan" value="option2">
                                        <label class="mb-0" for="pertanyaan">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Pembobotan Soal/Skor (Standar : Pembobotan)</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="skor" id="skor" value="option1">
                                        <label class="mb-0" for="skor">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="skor" id="skor" value="option2">
                                        <label class="mb-0" for="skor">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Gambar/Grafik/Tabel/Peta Dalam Soal Jelas (Standar : Jelas)</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gambar" id="gambar" value="option1">
                                        <label class="mb-0" for="gambar">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gambar" id="gambar" value="option2">
                                        <label class="mb-0" for="gambar">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Catatan</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Saran / Rekomendasi</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;"><textarea class="form-control" name="saran" id="saran" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td style="width: 300px;">Status</td>
                                <td style="padding-left: 10px; padding-right:10px">:</td>
                                <td style="width: 600px;">
                                    <select class="form-control <?= (validation_show_error('status_soal')) ? 'is-invalid' : ''; ?>" id="status_soal" name="status_soal">
                                        <option value="">Pilih Status</option>
                                        <option value="Menunggu Direview" <?= (old('status_soal', $review_soal_ujian['status_soal']) == 'Menunggu Direview') ? 'selected' : '';  ?>>Menunggu Direview</option>
                                        <option value="Tolak GKM" <?= (old('status_soal', $review_soal_ujian['status_soal']) == 'Tolak GKM') ? 'selected' : '';  ?>>Tolak GKM</option>
                                        <option value="Diterima" <?= (old('status_soal', $review_soal_ujian['status_soal']) == 'Diterima') ? 'selected' : '';  ?>>Diterima</option>
                                        <option value="Dicetak" <?= (old('status_soal', $review_soal_ujian['status_soal']) == 'Dicetak') ? 'selected' : '';  ?>>Dicetak</option>
                                        <option value="Distribusi Hasil Ujian" <?= (old('status_soal', $review_soal_ujian['status_soal']) == 'Distribusi Hasil Ujian') ? 'selected' : '';  ?>>Distribusi Hasil Ujian</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="submit" class="btn btn-primary mr-2 edit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
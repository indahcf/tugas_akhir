<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<h4 class="card-title">Data Jadwal Ujian</h4>
<div class="template-demo">
    <a href="/admin/jadwal_ujian/create" class="btn btn-primary btn-icon-text">
        <i class="ti-plus btn-icon-prepend"></i>
        Tambah
    </a>
    <button type="button" class="btn btn-success btn-icon-text" data-toggle="modal" data-target="#modalImport">
        <i class="ti-import btn-icon-prepend"></i>
        Import
    </button>
    <!-- <a href="/admin/jadwal_ujian/import" class="btn btn-success btn-icon-text">
        <i class="ti-import btn-icon-prepend"></i>
        Import
    </a> -->
    <a href="/admin/jadwal_ujian/export" class="btn btn-danger btn-icon-text">
        <i class="ti-export btn-icon-prepend"></i>
        Export
    </a>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div>
                    <table id="jadwal_ujian" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Hari</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Program Studi</th>
                                <th>Dosen</th>
                                <th>Kelas</th>
                                <th>Ruang</th>
                                <th>Jumlah Peserta</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            $temp = 0; ?>
                            <?php foreach ($jadwal_ujian as $j) : ?>
                                <tr>
                                    <?php if ($temp != $j['id_jadwal_ujian']) {
                                        $i++;
                                        $temp = $j['id_jadwal_ujian'];
                                    } ?>
                                    <td><?= $i; ?></td>
                                    <td><?= hari($j['tanggal']); ?></td>
                                    <td><?= date('d-m-Y', strtotime($j['tanggal'])); ?></td>
                                    <td><?= date('H.i', strtotime($j['jam_mulai'])); ?> - <?= date('H.i', strtotime($j['jam_selesai'])); ?></td>
                                    <td><?= $j['kode_matkul']; ?></td>
                                    <td><?= $j['matkul']; ?></td>
                                    <td><?= $j['prodi']; ?></td>
                                    <td><?= $j['dosen']; ?></td>
                                    <td><?= $j['kelas']; ?></td>
                                    <td><?= $j['ruang_ujian']; ?></td>
                                    <td><?= $j['jumlah_peserta']; ?></td>
                                    <td>
                                        <a href="/admin/jadwal_ujian/edit/<?= $j['id_jadwal_ujian']; ?>" data-id="<?= $j['id_jadwal_ujian']; ?>" class="btn btn-warning btn-rounded btn-icon">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <button data-id="<?= $j['id_jadwal_ujian']; ?>" data-model="jadwal_ujian" type="submit" class="btn btn-danger btn-rounded btn-icon delete">
                                            <i class="ti-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <script src="/assets/vendors/jquery-3.5.1/jquery-3.5.1.min.js "></script>

                    <script>
                        $(document).ready(function() {
                            $('#jadwal_ujian').DataTable({
                                'scrollX': true,
                                'rowsGroup': [0, 1, 2, 3, 4, 5, 6, 7, 8, 11]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalImport">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Jadwal Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <label for="file_excel">File Excel</label>
                    <input type="file" class="form-control-file" id="file_excel" required accept=".xls, .xlsx">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
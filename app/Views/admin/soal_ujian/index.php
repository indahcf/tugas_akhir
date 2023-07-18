<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<h4 class="card-title">Data Soal Ujian</h4>
<div class="template-demo row mb-3 mt-4">
    <div class="col-md-5 d-flex justify-content-end">
        <a href="/admin/soal_ujian/create" class="btn btn-primary btn-icon-text">
            <i class="ti-plus btn-icon-prepend"></i>
            Tambah
        </a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="soal_ujian" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Mata Kuliah</th>
                                <th>Program Studi</th>
                                <th>Dosen Pembuat Soal</th>
                                <th>Kelas</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            $temp = 0; ?>
                            <?php foreach ($soal_ujian as $s) : ?>
                                <tr>
                                    <?php if ($temp != $s['id_soal_ujian']) {
                                        $i++;
                                        $temp = $s['id_soal_ujian'];
                                    } ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $s['kode_matkul']; ?></td>
                                    <td><?= $s['matkul']; ?></td>
                                    <td><?= $s['prodi']; ?></td>
                                    <td><?= $s['dosen']; ?></td>
                                    <td><?= $s['kelas']; ?></td>
                                    <td><?= $s['status_soal']; ?></td>
                                    <td>
                                        <a href="/admin/soal_ujian/edit/<?= $s['id_soal_ujian']; ?>" data-id="<?= $s['id_soal_ujian']; ?>" class="btn btn-warning btn-rounded btn-icon">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <button data-id="<?= $s['id_soal_ujian']; ?>" data-model="soal_ujian" type="submit" class="btn btn-danger btn-rounded btn-icon delete">
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
                            $('#soal_ujian').DataTable({
                                'scrollX': true,
                                'rowsGroup': [0, 1, 2, 3, 4, 6, 7]
                            });
                        });

                        // $("#filter").change(function() {
                        //     $("#formFilter").submit();
                        // });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Jadwal Ujian</title>

    <link rel="icon" href="<?= base_url() ?>/favicon.ico" type="image/x-icon">

    <style>
        body {
            padding: 25px;
        }

        .table-laporan {
            border-collapse: collapse;
        }

        .table-laporan,
        .table-laporan th,
        .table-laporan td {
            border: 1px solid black;
        }

        .table-laporan th,
        .table-laporan td {
            padding: 5 px;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #fff;
        }

        .surat {
            border-bottom: 2px solid #000;
            padding: 2px;
        }

        .tengah {
            text-align: center;
            line-height: 10px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body id="page-top">
    <div class="rangkasurat">
        <table width="100%" class="surat">
            <tr>
                <td class="tengah">
                    <h3>PT Noto Teknologi Indonesia</h3>
                    <p>Alamat: Jl. Bocoran 62 Karangsalam Kidul RT 03/02 Kedungbanteng, Telp: 081334923095</p>
                    <p><i>Email</i>: halo@ultranesia.com <i>Website</i>: ultranesia.com</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="laporan">
        <h3 style="margin-bottom: 5px;"><u>DATA JADWAL UJIAN</u></h3>
        <table class="table-laporan" width="100%" style="margin-top: 10px;">
            <tr>
                <th>No</th>
                <th>HARI</th>
                <th>TANGGAL</th>
                <th>JAM</th>
                <th>KODE MATA KULIAH</th>
                <th>MATA KULIAH</th>
                <th>PROGRAM STUDI</th>
                <th>DOSEN</th>
                <th>KELAS</th>
                <th>RUANG UJIAN</th>
                <th>JUMLAH PESERTA</th>
            </tr>
            <?php
            if (empty($jadwal_ujian)) {
                echo "<tr><td colspan='11' align='center'>Tidak ada data jadwal ujian</td></tr>";
            } else {
                $i = 1;
                foreach ($jadwal_ujian as $j) {
                    echo "<tr>";
                    echo "<td style='width: 20px; text-align: center;'>" . $i++ . "</td>";
                    echo "<td style='width: 50px; text-align: center;'>" . hari($j['tanggal']) . "</td>";
                    echo "<td style='width: 40px; text-align: center;'>" . date('d-m-Y', strtotime($j['tanggal'])) . "</td>";
                    echo "<td style='width: 80px; text-align: center;'>" . date('H.i', strtotime($j['jam_mulai'])) . " - " . date('H.i', strtotime($j['jam_selesai'])) . "</td>";
                    echo "<td style='width: 70px; text-align: center;'>" . $j['kode_matkul'] . "</td>";
                    echo "<td style='width: 100px; text-align: center;'>" . $j['matkul'] . "</td>";
                    echo "<td style='width: 90px; text-align: center;'>" . $j['prodi'] . "</td>";
                    echo "<td style='width: 100px; text-align: center;'>" . $j['dosen'] . "</td>";
                    echo "<td style='width: 50px; text-align: center;'>" . $j['kelas'] . "</td>";
                    echo "<td style='width: 50px; text-align: center;'>" . $j['ruang_ujian'] . "</td>";
                    echo "<td style='width: 40px; text-align: center;'>" . $j['jumlah_peserta'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
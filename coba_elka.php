<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/8/18
 * Time: 17:58 PM
 */
include "db_connection.php";
?>
    <!doctype html>
    <head>
        <?php include "head_tag.php"?>
    </head>
    <body>
        <?php include "left_panel.php"?>
        <div class="right-panel">
            <?php include "header_tag.php"?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Coba Skripsi Orang</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Elka Ismy Chalbualdy</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <h3>Tabel Registrasi</h3><hr>
                        </div>
                        <div class="col-sm-6 col-lg-12">
<!--                            <table id="bootstrap-data-table" class="table table-striped table-bordered">-->
<!--                                <tr>-->
<!--                                    <th>No.</th>-->
<!--                                    <th>Tanggal Masuk</th>-->
<!--                                    <th>Dokumen Medik</th>-->
<!--                                    <th>Nama</th>-->
<!--                                    <th>Alamat</th>-->
<!--                                    <th>Agama</th>-->
<!--                                    <th>Jenis Kelamin</th>-->
<!--                                    <th>Cara Kunjungan</th>-->
<!--                                </tr>-->
<!--                            </table>-->
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td rowspan="4" class="align-middle"><strong>No.</strong></td>
                                        <td rowspan="4" class="align-middle"><strong>Tanggal Masuk</strong></td>
                                        <td rowspan="4" class="align-middle"><strong>Dokumen Medik</strong></td>
                                        <td rowspan="4" class="align-middle"><strong>Nama</strong></td>
                                        <td rowspan="4" class="align-middle"><strong>Alamat</strong></td>
                                        <td rowspan="4" class="align-middle"><strong>Agama</strong></td>
                                        <td rowspan="4" class="align-middle"><strong>Jenis Kelamin</strong></td>
                                        <td colspan="6">Cara Kunjungan</td>
                                        <td colspan="6">Asal Pasien</td>
                                        <td colspan="9">Keadaan Pasien Setelah di Poliklinik / UGD</td>
                                        <td colspan="2">Jenis Kasus</td>
                                        <td colspan="6">Cara Pembayaran</td>
                                        <td rowspan="4">Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td>Kunjungan Baru</td>
                                        <td colspan="2">Kunjungan Lama</td>
                                        <td rowspan="3">Kunjungan Ulang</td>
                                        <td colspan="2">Kunjungan Konsultasi</td>
                                        <td rowspan="3">Datang Sendiri</td>
                                        <td rowspan="3">Puskesmas</td>
                                        <td rowspan="3">RS. Pemerintah</td>
                                        <td rowspan="3">RS. Swasta</td>
                                        <td rowspan="3">Dokter Praktik</td>
                                        <td rowspan="3">Lain-Lain</td>
                                        <td colspan="6">Dirujuk</td>
                                        <td rowspan="3">Pulang</td>
                                        <td rowspan="3">Mati di Poliklinik / UGD</td>
                                        <td rowspan="3">Datang Sudah Mati</td>
                                        <td rowspan="3">Baru</td>
                                        <td rowspan="3">Lama</td>
                                        <td rowspan="3">Umum</td>
                                        <td rowspan="3">Jamkesmas</td>
                                        <td rowspan="3">Askes</td>
                                        <td rowspan="3">Mandiri / JKN</td>
                                        <td rowspan="3">Jamkesda</td>
                                        <td rowspan="3">SPM</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">Langsung / Tidak Lewat TP2RJ</td>
                                        <td colspan="2">Melalui TP2RJ</td>
                                        <td rowspan="2">Antar Poliklinik</td>
                                        <td rowspan="2">Dari Rawat Inap</td>
                                        <td rowspan="2">Dirawat</td>
                                        <td rowspan="2">Ke RS. Lebih Tinggi</td>
                                        <td rowspan="2">Ke RS. Lebih Rendah</td>
                                        <td rowspan="2">Ke Puskesmas</td>
                                        <td rowspan="2">Ke Dokter Praktek</td>
                                        <td rowspan="2">Lain-Lain</td>
                                    </tr>
                                    <tr>
                                        <td>Pengunjung Baru</td>
                                        <td>Pengunjung Lama</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $nomor = 1;
                                        $sql = $conn->query("SELECT * FROM rekammedis.data_register");
                                        while($row = $sql->fetch_array())
                                        {
                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor++?></td>
                                                    <td><?php echo $row['tanggal_masuk']?></td>
                                                    <td><?php echo $row['nama']?></td>
                                                    <td><?php echo $row['alamat']?></td>
                                                    <td><?php echo $row['agama']?></td>
                                                    <td><?php echo $row['jenis_kelamin']?></td>
                                                    <td><?php echo $row['umur']?></td>
                                                    <td><?php echo $row['tipe_kunjungan']?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php";?>
    </body>
</html>
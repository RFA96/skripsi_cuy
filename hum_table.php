<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/20/18
 * Time: 16:49 PM
 */
    include "db_connection.php";
?>
<!doctype html>
    <head>
        <?php include "head_tag.php"?>
    </head>
    <body>
        <?php include "left_panel.php"?>
        <div id="right-panel" class="right-panel">
            <?php include "header_tag.php"?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Humidity</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="col-sm-6 col-lg-12">
                        <h3>Database Kelembapan Udara</h3><hr>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <h5>Pilih tanggal:</h5>
                        <form method="post" action="">
                            <div class="form-row align-items-center">
                                <div class="col-sm-3 my-1">
                                    <select class="custom-select" name="tanggal">
                                        <option>--- Tanggal ---</option>
                                        <?php
                                        for($i = 1; $i <= 31; $i++)
                                        {
                                            ?>
                                            <option value="<?php echo $i?>"><?php echo $i?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 my-1">
                                    <select class="custom-select" name="bulan">
                                        <option>--- Bulan ---</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 my-1">
                                    <select class="custom-select" name="tahun">
                                        <option>--- Tahun ---</option>
                                        <?php
                                            $q = $conn->query("SELECT DISTINCT substr(tanggal, 1, 4) AS tahun FROM suhu_kelembapan;");
                                            while($baris = $q->fetch_array())
                                            {
                                                ?>
                                                <option value="<?php echo $baris['tahun']?>"><?php echo $baris['tahun']?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 my-1">
                                    <input type="submit" class="btn btn-outline-primary" value="LIHAT">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <hr>
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Kelembapan</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kelembapan</th>
                                            <th>Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
//                                            error_reporting(0);
                                            $nomor = 1;
                                            $tanggal = $_POST['tanggal'];
                                            $bulan = $_POST['bulan'];
                                            $tahun = $_POST['tahun'];
                                            $komplit_tanggal = $tahun.'-'.$bulan.'-'.$tanggal;

                                            $result = $conn->query("SELECT * FROM suhu_kelembapan WHERE tanggal = '$komplit_tanggal'");
                                            while ($row = $result->fetch_array())
                                            {
                                                ?>
                                                <tr>
                                                    <td><?php echo $nomor++?></td>
                                                    <td><?php echo $row['humidity']?></td>
                                                    <td><?php echo $row['waktu']?></td>
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
        </div>
        <?php include "assets_js.php"?>
    </body>
</html>
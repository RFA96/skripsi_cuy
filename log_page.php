<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/30/18
 * Time: 02:13 AM
 */
    include "db_connection.php";
?>
<!doctype html>
    <head>
        <?php include "head_tag.php"?>
    </head>
    <body>
        <?php include "left_panel.php";?>
        <div id="right-panel" class="right-panel">
            <?php include "header_tag.php";?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Documentations</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Log Activities</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <h3>Daftar Aktivitas</h3><hr>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Activity</th>
                                        <th>Date Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $nomor = 1;
                                        $result = $conn->query("SELECT * FROM log_activities");
                                        while($row = $result->fetch_array())
                                        {
                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor++;?></td>
                                                    <td><?php echo $row['activity']?></td>
                                                    <td><?php echo $row['tanggal_waktu']?></td>
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
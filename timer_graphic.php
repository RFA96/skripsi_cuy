<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 8/8/18
 * Time: 08:42 AM
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
            <?php include "header_tag.php";?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Timer</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Graphic</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <canvas id="timer-chart"></canvas>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <?php
//                                $tanggal_sekarang = date("Y-m-d");
//                                $coba = new DateTime($tanggal_sekarang);
//                                $tanggal_sekarang = $coba->format('Y-m-d');
//
//                                $sql = $conn->query("SELECT * FROM skripsi_cuy.log_activities");
//                                while($row = $sql->fetch_array())
//                                {
//                                    $ambil_tanggal = substr($row[2], 0, 10);
//                                    $ambil_jam_aja = substr($row[2], 11, 2);
//
//                                    if($ambil_tanggal == $tanggal_sekarang)
//                                    {
//                                        echo $ok = 1;
//                                    }
//                                }
//                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php"?>
        <script>
            var ctx = document.getElementById("timer-chart");
            ctx.height = 150;
            var myChart = new Chart(ctx, {
               type: 'line',
                data: {
                   labels:[
                       <?php
                           for($i = 1; $i <= 24; $i++)
                           {
                               echo "'$i',";
                           }
                       ?>
                   ],
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [ {
                        label: "Timer",
                        data: [
                            <?php
                                $nol = 0; $satu = 1;
                                $tanggal_sekarang = date("Y-m-d");
                                $coba = new DateTime($tanggal_sekarang);
                                $tanggal_sekarang = $coba->format('Y-m-d');

                                $sql = $conn->query("SELECT * FROM skripsi_cuy.log_activities WHERE tanggal_waktu LIKE '%".$tanggal_sekarang."%'");
                                while($row = $sql->fetch_array())
                                {
                                    $ambil_tanggal = substr($row[2], 0, 10);
                                    $ambil_jam_aja = substr($row[2], 11, 2);
                                    $jamInt = (int) $ambil_jam_aja;

                                    if($ambil_tanggal == $tanggal_sekarang)
                                    {
                                        for($i = 1; $i <= 24; $i++)
                                        {
                                            if($i == $jamInt)
                                            {
                                                echo $satu.", ";
                                            }
                                            else
                                            {
                                                echo $nol.", ";
                                            }
                                        }
                                    }
                                }
                            ?>
                        ],
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(220,53,69,0.75)',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'rgba(220,53,69,0.75)',
                    }]
                }
            });
        </script>
    </body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/30/18
 * Time: 20:38 PM
 */
    error_reporting(0);
    include 'db_connection.php';
    $batas_kecepatan_angin = 5;
    $sekarang = date('Y-m-d');
    $seminggu_sebelumnya = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
?>
<!doctype html>
    <head>
        <?php include 'head_tag.php'?>
    </head>
    <body>
        <?php include "left_panel.php";?>
        <div class="right-panel">
            <?php include "header_tag.php";?>

            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Analisis</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Intensitas Cahaya</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <h3>Analisis</h3><hr>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <canvas id="intensitas_cahaya_chart"></canvas><hr>
                            <h3>Hasil Analisis</h3><br>
                            <?php
                                $result = $conn->query("SELECT wind_speed, waktu FROM wind WHERE wind_speed > $batas_kecepatan_angin AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
                                while($row = $result->fetch_array())
                                {
                                    $waktu = explode(":", $row['waktu']);
                                    $s[$row['wind_speed']][$waktu[0]]+=1;
                                }
                                $max_windspeed = max(array_keys($s));
                                $iterbanyak = max(array_values($s[$max_windspeed]));
                                $jamterbanyak = array_search($iterbanyak, $s[$max_windspeed]);

                                echo "<pre>";
                                print_r($s);
                                echo "</pre>";

                                echo "<hr>";
                                echo "Intensitas cahaya matahari terbesar adalah ".$max_windspeed." lx, pada jam ".$jamterbanyak.":00:00";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php";?>
        <script>
            var ctx = document.getElementById("intensitas_cahaya_chart");
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    // labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016" ],
                    labels : [
                        <?php
                        $result = $conn->query("SELECT * FROM skripsi_realtime.intensitas_cahaya LIMIT 10");
                        while($row = $result->fetch_array())
                        {
                            echo "'2018-07-30', ";
                        }
                        ?>
                    ],
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [ {
                        label: "Wind Speed",
                        // data: [ 0, 30, 10, 120, 50, 63, 10 ],
                        data: [
                            <?php
                            $result = $conn->query("SELECT * FROM skripsi_realtime.intensitas_cahaya LIMIT 10");
                            while($row = $result->fetch_array())
                            {
                                $value = $row[1];
                                echo $value.", ";
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
                    }, {
                        label: "Humidity",
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(40,167,69,0.75)',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'rgba(40,167,69,0.75)',
                    } ]
                },
                options: {
                    responsive: true,

                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        intersect: false,
                    },
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: true,
                            fontFamily: 'Montserrat',
                        },
                    },
                    scales: {
                        xAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: false,
                                labelString: 'Tanggal | Waktu'
                            }
                        } ],
                        yAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Kecepatan Angin'
                            }
                        } ]
                    },
                    title: {
                        display: false,
                        text: 'Graphic'
                    }
                }
            } );
        </script>
    </body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/30/18
 * Time: 13:13 PM
 */
    include "db_connection.php";
    $sekarang = date('Y-m-d');
    $seminggu_sebelumnya = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
?>
<!doctype html>
    <head>
        <?php include "head_tag.php";?>
    </head>
    <body>
        <?php include "left_panel.php"?>
        <div class="right-panel">
            <?php include "header_tag.php"?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Data</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Machine Learning</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-12">
                            <h3>Analisa</h3><hr>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <canvas id="temperature-chart"></canvas><hr>
                            <h3>Suhu terbesar</h3>
                            <?php
                                $suhu_terbesar = 27;
                                $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > 27 AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
                                while($row = $result->fetch_array())
                                {

                                }
                            ?>
                            <hr>
                            <h3>Waktu</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php";?>
        <script>
            var ctx = document.getElementById( "temperature-chart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    // labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016" ],
                    labels : [
                        <?php
                            $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > 27 AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
                            while($row = $result->fetch_array())
                            {
                                $tanggal = $row['tanggal'];
                                $waktu = $row['waktu'];
                                echo "'$tanggal | $waktu', ";
                            }
                        ?>
                    ],
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [ {
                        label: "Temperature",
                        // data: [ 0, 30, 10, 120, 50, 63, 10 ],
                        data: [
                            <?php
                                $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > 27 AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
                                while($row = $result->fetch_array())
                                {
                                    $temperature = $row['temperature'];
                                    echo $temperature.", ";
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
                        // data: [ 0, 50, 40, 80, 40, 79, 120 ],
                        //data: [
                        //    <?php
                        //        $query = mysqli_query($conn, "SELECT humidity FROM suhu_kelembapan WHERE tanggal = '".date('Y-m-d')."'");
                        //        while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                        //        {
                        //            $humidity = $row['humidity'];
                        //            echo $humidity.", ";
                        //        }
                        //    ?>
                        //],
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
                                labelString: 'Suhu Udara'
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
<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 4/29/18
 * Time: 03:02 AM
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
                            <h1>Temperature</h1>
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
                            <h3>Grafik Monitoring Suhu Udara Hari Ini</h3><hr>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data Temperatur</strong>
                                </div>
                                <div class="card-body">
                                    <canvas id="temperature-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <p>Sumber: Nursyamsi, D. 2015. <i>Karakteristik dan Kesesuaian Lahan Tanaman Cabai dan Bawang Merah</i>. Litbang Sumber Daya Lahan Pertanian, Kementerian Pertanian</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php"?>
        <script>
            var ctx = document.getElementById( "temperature-chart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    // labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016" ],
                    labels : [
                        <?php
                            $sql = "SELECT tanggal, waktu FROM suhu_kelembapan WHERE tanggal = '".date('Y-m-d')."'";
                            $result = $conn->query($sql);
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
                        data: [
                            <?php
                                $query = mysqli_query($conn, "SELECT temperature FROM suhu_kelembapan WHERE tanggal = '".date('Y-m-d')."'");
                                while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
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
                                display: true,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Tanggal | Waktu'
                            }
                        } ],
                        yAxes: [ {
                            display: true,
                            gridLines: {
                                display: true,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Suhu Udara'
                            },
                            id: 'y-axis-1',
                            ticks: {
                                beginAtZero: true,
                                max: 50
                            }
                        } ]
                    },
                    title: {
                        display: false,
                        text: 'Temperature Graphic'
                    },
                    annotation: {
                        drawTime: "afterDraw",
                        annotations: [{
                            id: 'box1',
                            type: 'box',
                            yScaleID: 'y-axis-1',
                            yMin: 0,
                            yMax: 18,
                            backgroundColor: 'rgba(200, 100, 200, 0.2)',
                            borderColor: 'rgba(100, 100, 100, 0.2)',
                        },{
                            id: 'box2',
                            type: 'box',
                            yScaleID: 'y-axis-1',
                            yMin: 18,
                            yMax: 30,
                            backgroundColor: 'rgba(148, 255, 162, 0.3)',
                            borderColor: 'rgba(200, 100, 200, 0.2)',
                        },{
                            id: 'box3',
                            type: 'box',
                            yScaleID: 'y-axis-1',
                            yMin: 30,
                            yMax: 50,
                            backgroundColor: 'rgba(200, 100, 200, 0.2)',
                            borderColor: 'rgba(200, 100, 200, 0.2)',
                        }]
                    }
                }
            } );
        </script>
    </body>
</html>
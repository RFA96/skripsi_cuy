<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/30/18
 * Time: 18:27 PM
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
                            <h1>Light Intensity</h1>
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
                            <h3>Grafik Monitoring Intensitas Cahaya Hari Ini</h3><hr>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Data Intensitas Cahaya</strong>
                                </div>
                                <div class="card-body">
                                    <canvas id="lightintensity-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-12">
                            <p>Gardner, et.al. 1992. <i>Fisiologi Tanaman Budidaya Tropik</i>. Yogyakarta: Gadjah Mada University Press</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php";?>
        <script>
            var ctx = document.getElementById("lightintensity-chart");
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    // labels: [ "2010", "2011", "2012", "2013", "2014", "2015", "2016" ],
                    labels : [
                        <?php
                            $sql = "SELECT * FROM skripsi_cuy.light_intensity WHERE tanggal = '".date('Y-m-d')."'";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_array())
                            {
                                $tanggal = $row[2];
                                $waktu = $row[3];
                                echo "'$tanggal | $waktu',";
                            }
                        ?>
                    ],
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [ {
                        label: "Light Intensity",
                        // data: [ 0, 30, 10, 120, 50, 63, 10 ],
                        data: [
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM skripsi_cuy.light_intensity WHERE tanggal = '".date('Y-m-d')."'");
                            while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
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
                    }]
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
                                display: false,
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
                                labelString: "Intensitas Cahaya"
                            },
                            id: 'y-axis-1',
                            ticks: {
                                beginAtZero: true,
                                max: 1000
                            }
                        } ]
                    },
                    title: {
                        display: false,
                        text: 'Light Intensity Graphic'
                    },
                    annotation: {
                        drawTime: "afterDraw",
                        annotations: [{
                            id: 'box1',
                            type: 'box',
                            yScaleID: 'y-axis-1',
                            yMin: 0,
                            yMax: 390,
                            backgroundColor: 'rgba(200, 100, 200, 0.2)',
                            borderColor: 'rgba(100, 100, 100, 0.2)',
                        },{
                            id: 'box2',
                            type: 'box',
                            yScaleID: 'y-axis-1',
                            yMin: 390,
                            yMax: 760,
                            backgroundColor: 'rgba(148, 255, 162, 0.3)',
                            borderColor: 'rgba(200, 100, 200, 0.2)',
                        },{
                            id: 'box3',
                            type: 'box',
                            yScaleID: 'y-axis-1',
                            yMin: 760,
                            yMax: 1000,
                            backgroundColor: 'rgba(200, 100, 200, 0.2)',
                            borderColor: 'rgba(100, 100, 100, 0.2)',
                        }]
                    }
                }
            } );
        </script>
    </body>
</html>
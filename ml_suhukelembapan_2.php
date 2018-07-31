<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/24/18
 * Time: 07:57 AM
 */
    include "db_connection.php";
    $sekarang = date('Y-m-d');
//    $seminggu_sebelumnya = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
    $sehari_sebelumnya = date('Y-m-d', strtotime('-1 days', strtotime(date('Y-m-d'))));
    $batas_suhu = 25;
    $batas_humidity = 50-1;
?>
<!doctype html>
    <head>
        <?php include 'head_tag.php'?>
    </head>
    <body>
        <?php include 'left_panel.php'?>
        <div class="right-panel">
            <?php include 'header_tag.php'?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Machine Learning</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Suhu dan Kelembapan</li>
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
                            <canvas id="temperature_chart" width="800" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'assets_js.php'?>
        <script>
            var ctx = document.getElementById("temperature_chart").getContext('2d');
            Chart.defaults.multicolorLine = Chart.defaults.line;
            Chart.controllers.multicolorLine = Chart.controllers.line.extend({
                draw: function(ease) {
                    var
                        startIndex = 0,
                        meta = this.getMeta(),
                        points = meta.data || [],
                        colors = this.getDataset().colors,
                        area = this.chart.chartArea,
                        originalDatasets = meta.dataset._children
                            .filter(function(data) {
                                return !isNaN(data._view.y);
                            });

                    function _setColor(newColor, meta) {
                        meta.dataset._view.borderColor = newColor;
                    }

                    if (!colors) {
                        Chart.controllers.line.prototype.draw.call(this, ease);
                        return;
                    }

                    for (var i = 2; i <= colors.length; i++) {
                        if (colors[i-1] !== colors[i]) {
                            _setColor(colors[i-1], meta);
                            meta.dataset._children = originalDatasets.slice(startIndex, i);
                            meta.dataset.draw();
                            startIndex = i - 1;
                        }
                    }

                    meta.dataset._children = originalDatasets.slice(startIndex);
                    meta.dataset.draw();
                    meta.dataset._children = originalDatasets;

                    points.forEach(function(point) {
                        point.draw(area);
                    });
                }
            });

            var chart = new Chart(ctx, {
                type: 'multicolorLine',
                data: {
                    labels:[
                        <?php
                            $sql_datetime = $conn->query("SELECT time_date FROM skripsi_realtime.realtime_suhu_kelembapan");
                            while($data_datetime = $sql_datetime->fetch_array())
                            {
                                $datetime = $data_datetime[0];
                                echo "'$datetime', ";
                            }
                        ?>
                    ],
                    datasets: [{
                        label: "Temperature Graphic",
                        // borderColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255,255,255)',
                        data: [
                            <?php
                                $sql_temp = $conn->query("SELECT id, suhu FROM skripsi_realtime.realtime_suhu_kelembapan");
                                while($data_temp = $sql_temp->fetch_array())
                                {
                                    $temp = $data_temp[1];
                                    echo $temp.",";
                                }
                            ?>
                        ],
                        colors:[
                            <?php
                                $sql_status = $conn->query("SELECT status FROM skripsi_realtime.realtime_suhu_kelembapan");
                                while($data_status = $sql_status->fetch_array())
                                {
                                    $status = $data_status[0];
                                    if($status == 'Sensor unplugged or error')
                                    {
                                        echo "'red', ";
                                    }
                                    else
                                    {
                                        echo "'green', ";
                                    }
                                }
                            ?>
                        ]
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            });
        </script>
    </body>
</html>

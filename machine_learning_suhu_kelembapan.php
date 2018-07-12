<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/30/18
 * Time: 13:13 PM
 */
error_reporting(0);
    include "db_connection.php";
//include "db_connection_2.php";
$sekarang = date('Y-m-d');
$seminggu_sebelumnya = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
$batas_suhu = 27;
$batas_humidity = 50-1;
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


                    $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > $batas_suhu AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
                    while($row = $result->fetch_array())
                    {
                        $waktu = explode(":", $row['waktu']);   // AMBIL JAM SAJA

                        $s[$row['temperature']][$waktu[0]]+=1;
                        // s[suhu][waktu].
                        // s[28][10] = 1
                        // s[28][10] = 2
                        // s[28][10] = 3

                        // s[29][10] = 1

                        // s[28][11] = 1
                        // s[28][11] = 2

                    }

//                    echo "<pre>";
//                    print_r($s);
//                    echo "</pre>";
                    $maxsuhu = max(array_keys($s));
                    // dapatkan key(suhu) array tertinggi.

                    $iterbanyak = max(array_values($s[$maxsuhu]));
                    // cari jam terbanyak beerdasarkan value

                    $jamterbanyak = array_search($iterbanyak, $s[$maxsuhu]);

                    echo "<br>=========================================================================================================<br>";
                    echo "<h3>Humidity</h3>";
                    $d_temp = $conn->query("SELECT DISTINCT temperature FROM suhu_kelembapan where temperature > $batas_suhu");
                    $d_humidity = "SELECT DISTINCT  humidity FROM suhu_kelembapan WHERE temperature = ";
                    $d_jumhum = "SELECT COUNT(humidity) as jumlah, humidity, HOUR(waktu) as waktu FROM suhu_kelembapan WHERE temperature = ";
                    $arr = array();
                    $var_se = array();
                    while($row = mysqli_fetch_assoc($d_temp)) {

                        $h_temp = $conn->query($d_jumhum.$row["temperature"]." GROUP BY humidity, HOUR(waktu)");
                        while($hrow = mysqli_fetch_assoc($h_temp)) {
                            $a = $row["temperature"];
                            $b = $hrow['humidity'];
                            $c = $hrow['waktu'];

                            $arr[$a][$b][$c] = $hrow['jumlah'];
                        }

                    }

                    foreach ($arr as $i => $valuos){
                        //echo $i." , ";
                        foreach ($valuos as $a => $b){
                            $keys = (int)$a;
                            if ($keys > ($batas_humidity)){
                                unset($arr[$i][$keys]);
                            }
                        }
                    }

                    echo "<pre>";
                    print_r($arr);
                    echo "</pre>";


                    $minimum_humidity = 1000;
                    foreach ($arr[$maxsuhu] as $key => $value){
                        if($key < $minimum_humidity){
                            $minimum_humidity = $key;
                        }
                    }
                    echo "<strong><b>Suhu</b> terbesar adalah ".$maxsuhu." dengan <b>Humidity</b> minimum ".$minimum_humidity." pada jam ".$jamterbanyak."</strong>";
                    ?>
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
                $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > $batas_suhu AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
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
                    $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > $batas_suhu   AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
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
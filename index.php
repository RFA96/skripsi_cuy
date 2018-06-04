<?php include "db_connection.php"; include "decode_xml_current_weather.php"?>
<!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
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
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content mt-3">
<!--                <div class="col-sm-12">-->
<!--                    <div class="alert  alert-success alert-dismissible fade show" role="alert">-->
<!--                        <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.-->
<!--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--                            <span aria-hidden="true">&times;</span>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->


                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-1">
                        <div class="card-body pb-0">
                            <div class="dropdown float-right">
                                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-thermometer"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-menu-content">
                                        <a class="dropdown-item" href="index.html#">See graphics...</a>
                                        <a class="dropdown-item" href="index.html#">See data...</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-0">
<!--                                <span class="count">28</span> &#8451;-->
                                <span id="ajax_suhu"></span> &#8451;
                            </h4>
                            <p class="text-light">Suhu</p>

                            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-snowflake-o"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="index.html#">See graphics...</a>
                                    <a class="dropdown-item" href="index.html#">See data...</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
<!--                            <span class="count"></span> %-->
                            <span id="ajax_kelembapan"></span> %
                        </h4>
                        <p class="text-light">Kelembapan</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-sun-o"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="index.html#">See graphics...</a>
                                    <a class="dropdown-item" href="index.html#">See data...</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
<!--                            <span class="count">10468</span> lx-->
                            <span id="ajax_intesitascahaya" class="count"></span> lx
                        </h4>
                        <p class="text-light">Light Intensity</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-fighter-jet"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="index.html#">See graphics...</a>
                                    <a class="dropdown-item" href="index.html#">See data...</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
<!--                            <span class="count">10468</span> Km/h-->
                            <span id="ajax_kecepatanangin" class="count"></span> Km/h
                        </h4>
                        <p class="text-light">Wind Speed</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <!--/.col-->

            <div class="col-sm-6 col-lg-4">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                <i class="fa fa-arrows-alt"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="index.html#">See graphics...</a>
                                    <a class="dropdown-item" href="index.html#">See data...</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
<!--                            <span class="count">10468</span>-->
                            <span id="ajax_arahangin" class="count"></span>
                        </h4>
                        <p class="text-light">Wind Direction</p>
                    </div>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70">

                    </div>
                </div>
            </div>
        <!--/.col-->
                <div class="col-sm-6 col-lg-4">
                    <div class="card text-white bg-flat-color-1">
                        <div class="card-body pb-0">
                            <div class="dropdown float-right">
                                <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-shower"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <div class="dropdown-menu-content">
                                        <a class="dropdown-item" href="index.html#">See graphics...</a>
                                        <a class="dropdown-item" href="index.html#">See data...</a>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-0">
                                <span class="count">10468</span> mm
                            </h4>
                            <p class="text-light">Rain Gauge</p>

                        </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart5"></canvas>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="ui-cards.html#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="http://www.clker.com/cliparts/a/9/f/c/12284285012032586819sivvus_weather_symbols_2.svg.hi.png">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6">T: <?php echo (int) $getTemperature;?> &#8451; | H: <?php echo $getHumidity."%";?></h2>
                                        <p>Lowokwaru, ID</p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="ui-cards.html#"> <i class="fa fa-cloud"></i> Cloud <span class="badge badge-success pull-right"><?php echo ucwords($getCloud);?></span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="ui-cards.html#"> <i class="fa fa-snowflake-o"></i> Precipitation <span class="badge badge-warning pull-right r-activity"><?php echo $getPrecipitation;?></span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="ui-cards.html#"> <i class="fa fa-fighter-jet"></i> Wind Speed <span class="badge badge-primary pull-right"><?php $windSpeedFinal = floatval($getWindSpeed) * 3.6; echo number_format($windSpeedFinal, 2);?> Km/h</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="ui-cards.html#"> <i class="fa fa-arrows-alt"></i> Wind Direction <span class="badge badge-danger pull-right"><?php echo $getWindDirection;?></span></a>
                                </li>

                            </ul>

                        </section>
                    </aside>
                </div>
            </div>
        </div>

        <?php include "assets_js.php"?>

        <!-- Script sensor -->
        <script>
            //WidgetChart 1
            var ctx = document.getElementById( "widgetChart1" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    labels: [
                        <?php
                            $query = mysqli_query($conn, "SELECT tanggal, waktu FROM (SELECT * FROM suhu_kelembapan ORDER BY record_id DESC LIMIT 7) sub ORDER BY record_id ASC;");
                            while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                            {
                                $tanggal = $row['tanggal'];
                                $waktu = $row['waktu'];
                                echo "'$tanggal | $waktu',";
                            }
                        ?>
                    ],
                    type: 'line',
                    datasets: [ {
                        // data: [65, 59, 84, 84, 51, 55, 40],
                        data: [<?php
                                    $query = mysqli_query($conn, "SELECT * FROM (SELECT * FROM suhu_kelembapan ORDER BY record_id DESC LIMIT 7) sub ORDER BY record_id ASC;");
                                    while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                                    {
                                        $temperature = $row['temperature'];
                                        echo "'$temperature',";
//                                        echo $temperature.',';
                                    }
                                ?>],
                        label: 'Temperature',
                        // backgroundColor: '#63c2de',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,.55)',
                    }, ]
                },
                options: {

                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
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
                    scales: {
                        xAxes: [ {
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        } ],
                        yAxes: [ {
                            display:false,
                            ticks: {
                                display: false,
                            }
                        } ]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            tension: 0.00001,
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            } );


            //WidgetChart 2
            var ctx = document.getElementById( "widgetChart2" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    labels: [
                        <?php
                        $query = mysqli_query($conn, "SELECT tanggal, waktu FROM (SELECT * FROM suhu_kelembapan ORDER BY record_id DESC LIMIT 7) sub ORDER BY record_id ASC;");
                        while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                        {
                            $tanggal = $row['tanggal'];
                            $waktu = $row['waktu'];
                            echo "'$tanggal | $waktu',";
                        }
                        ?>
                    ],
                    type: 'line',
                    datasets: [ {
                        // data: [1, 18, 9, 17, 34, 22, 11],
                        data: [
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM (SELECT * FROM suhu_kelembapan ORDER BY record_id DESC LIMIT 7) sub ORDER BY record_id ASC;");
                            while($row = mysqli_fetch_array($query, MYSQLI_BOTH))
                            {
                                $humidity = $row['humidity'];
                                echo "'$humidity',";
                            }
                            ?>
                        ],
                        label: 'Humidity',
                        backgroundColor: '#63c2de',
                        borderColor: 'rgba(255,255,255,.55)',
                    }, ]
                },
                options: {

                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
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
                    scales: {
                        xAxes: [ {
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        } ],
                        yAxes: [ {
                            display:false,
                            ticks: {
                                display: false,
                            }
                        } ]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            tension: 0.00001,
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            } );
        </script>
        <script>
            $(document).ready(function () {
                $.ajaxSetup({cache: false});
                setInterval(function () {
                    //Dari sensor
                    // $('#ajax_suhu').load('api/nilai_suhu.php');
                    // $('#ajax_kelembapan').load('api/nilai_kelembapan.php');
                    $('#ajax_intesitascahaya').load('api/nilai_intensitas_cahaya.php');
                    $('#ajax_arahangin').load('api/nilai_arah_angin.php');
                    $('#ajax_kecepatanangin').load('api/nilai_kecepatan_angin.php');

                    //Dari open weather
                    $('#ajax_suhu').load('api/nilai_suhu_openweather.php');
                    $('#ajax_kelembapan').load('api/nilai_kelembapan_openweather.php');
                }, 5000);
            });
        </script>
    </body>
</html>
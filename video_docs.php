<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 8/6/18
 * Time: 19:47 PM
 */
    include "db_connection.php";
?>
<!doctype html>
    <head>
        <?php include "head_tag.php";?>
    </head>
    <body>
        <?php include "left_panel.php"?>
        <div class="right-panel" id="right-panel">
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
                                <li class="active">Videos</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="col-sm-6 col-lg-12">
                        <h3>Video Penempatan Sensor</h3><hr>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ymn3v-a26g8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div><hr>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <h3>Video Penyiraman Reguler</h3><hr>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XXC2PgAK4bI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "assets_js.php";?>
    </body>
</html>
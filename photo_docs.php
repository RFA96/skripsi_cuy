<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/8/18
 * Time: 00:50 AM
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
            <?php include "header_tag.php"?>
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
                                <li class="active">Photos</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="col-sm-12">
                        <h3>Database Foto Perkembangan Tanaman</h3><hr>
                    </div>
                    <div class="col-lg-12">
                        <form method="post" enctype="multipart/form-data" action="upload_pict.php">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Photo</label>
                                    <input type="file" class="form-control-file" name="foto"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description"/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>&nbsp;</label><br>
                                    <input type="submit" value="UPLOAD" class="btn btn-outline-success"/>
                                </div>
                            </div>
                        </form><hr>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <div class="card-deck">
                            <div class="card">
                                <img class="card-img-top" src="images/docs/photos/IMG_8667.JPG" alt="Card image cap" width="1280" height="720">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php"?>
    </body>
</html>
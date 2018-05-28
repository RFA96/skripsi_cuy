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
                                    <input type="text" class="form-control" name="title" required/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" required/>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>&nbsp;</label><br>
                                    <input type="submit" value="UPLOAD" class="btn btn-outline-success"/>
                                </div>
                            </div>
                        </form><hr>
                    </div>

                    <!-- Foto di sini -->
                    <?php
                        $photo_result = $conn->query("SELECT * FROM documentation ORDER BY documentation.date DESC;");
                        while($row_photo = $photo_result->fetch_array())
                        {
                            ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img class="card-img-top" src="images/docs/photos/<?php echo $row_photo['file_name']?>" width="260" height="180">
                                        <div class="card-header bg-transparent"><h5 class="card-title"><?php echo $row_photo['name'];?></h5></div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <?php
                                                    echo "<font color='black'>".$row_photo['description']."</font>";
                                                ?>
                                            </p>
                                        </div>
                                        <div class="card-footer bg-transparent"><?php echo "<font color='red'>Updated on ".$row_photo['date']." at ".$row_photo['time']."</font>"?></div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                    <!-- End of foto -->

                </div>
            </div>
        </div>
        <?php include "assets_js.php"?>
    </body>
</html>
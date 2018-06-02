<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/29/18
 * Time: 23:35 PM
 */
    include "db_connection.php";
    $id = $_GET['id'];
    $edit_photo = $conn->query("SELECT * FROM documentation WHERE record_id = $id");
    $data = $edit_photo->fetch_array();
?>
<!doctype html>
    <head>
        <?php include "head_tag.php";?>
    </head>
    <body>
        <?php include "left_panel.php";?>
        <div class="right-panel" id="right-panel">
            <?php include "header_tag.php";?>
            <div class="breadcrumbs">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Documentation</h1>
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
                        <h3>Edit Foto dan Data Dokumentasi</h3><hr>
                    </div>
                    <div class="col-sm-12">
                        <form method="post" enctype="multipart/form-data" action="photo_form_action.php?id=<?php echo $data['record_id']?>">
                            <table class="table table-bordered">
                                <tr>
                                    <td rowspan="2">
                                        <img src="images/docs/photos/<?php echo $data['file_name']?>" width="400" height="400">
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $data['name']?>" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"><?php echo $data['description']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo File (No need to be filled if you don't want to be replaced)</label>
                                            <input type="file" class="form-control-file" name="foto"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-outline-primary" value="EDIT"/>
                                            <a href="photo_docs.php" class="btn btn-outline-danger">CANCEL</a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include "assets_js.php"?>
    </body>
</html>
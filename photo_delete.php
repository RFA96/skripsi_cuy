<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/2/18
 * Time: 22:16 PM
 */
    include "db_connection.php";

    $id = $_GET['id'];
    $get_img = $conn->query("SELECT * FROM documentation WHERE record_id = $id");
    $data_img = $get_img->fetch_array();
    $gambar = "images/docs/photos/".$data_img['file_name'];
    $sql = $conn->query("DELETE FROM documentation WHERE record_id = $id");
    if($sql)
    {
        if(file_exists($gambar))
        {
            unlink($gambar);
        }
        header("Location: photo_docs.php?sukses=3");
        $conn->close();
    }
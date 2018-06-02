<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/2/18
 * Time: 21:16 PM
 */
    include "db_connection.php";

    //Form
    $id = $_GET['id'];
    $tanggal = date("Y-m-d");
    $jam = date("H:m:s");
    $title = $_POST['title'];
    $description = $_POST['description'];

    if(empty($_FILES['foto']['name']))
    {
        $sql = "UPDATE documentation SET name = '$title', description = '$description', date = '$tanggal', time = '$jam' WHERE record_id = $id";
        if($conn->query($sql))
        {
            header("Location: photo_docs.php?sukses=1");
            $conn->close();
        }
    }
    else
    {
        $file_info = PATHINFO($_FILES['foto']['name']);
        $new_fileName = $file_info['filename']."_".time().".".$file_info['extension'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "images/docs/photos/".$new_fileName);
        $location = "images/docs/photos/".$new_fileName;
        chmod($location, 0777);

        $sql = "UPDATE documentation SET name = '$title', file_name = '$new_fileName', description = '$description', date = '$tanggal', time = '$jam' WHERE record_id = $id";
        if($conn->query($sql))
        {
            header("Location: photo_docs.php?sukses=1");
            $conn->close();
        }
    }
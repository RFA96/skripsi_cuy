<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/10/18
 * Time: 00:44 AM
 */
    include "db_connection.php";
    $file_info = PATHINFO($_FILES['foto']['name']);
    $new_fileName = $file_info['filename']."_".time().".".$file_info['extension'];
    move_uploaded_file($_FILES['foto']['tmp_name'], "images/docs/photos/".$new_fileName);
    $location = "images/docs/photos/".$new_fileName;

    $tanggal = date("Y-m-d");
    $jam = date("H:m:s");
    $title = $_POST['title'];
    $description = $_POST['description'];

    //SQL
    $sql = "INSERT INTO documentation(name, file_name,description, date, time) VALUES('$title', '$new_fileName','$description','$tanggal','$jam')";
    if($conn->query($sql))
    {
        header("photo_docs.php");
        $conn->close();
    }
    else
    {
        echo "<script type='text/javascript'>alert('Error: ".$sql."<br>".$conn->error."');</script>";
    }
//    mysqli_query($conn,"INSERT INTO documentation(name, description, date, time) VALUES('$new_fileName','','$tanggal','$jam')");
?>
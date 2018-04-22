<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 4/20/18
 * Time: 09:45 AM
 */
    $servername = "192.168.88.16";
    $username = "rakaflyhigh";
    $password = "password";
    $dbname = "skripsi_cuy";

//    $servername = "localhost";
//    $username = "root";
//    $password = "";
//    $dbname = "skripsi_cuy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    }
?>
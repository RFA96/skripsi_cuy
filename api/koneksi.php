<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/2/18
 * Time: 22:55 PM
 */
    $servername = "192.168.100.5";
    $username = "rakaflyhigh";
    $password = "password";
    $dbname = "skripsi_realtime";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    }
?>
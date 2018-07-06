<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 4/20/18
 * Time: 09:45 AM
 */
    date_default_timezone_set("Asia/Jakarta");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skripsi_cuy";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error)
    {
        die("Connection failed: ".$conn->connect_error);
    }
?>
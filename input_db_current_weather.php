<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/3/18
 * Time: 23:50 PM
 */
    include "db_connection.php"; include "coba_decode_xml_current.php";

    echo "Temperature: ".$getTemperature."<br>";
    echo "Humidity: ".$getHumidity."<br>";

    mysqli_query($conn, "INSERT INTO suhu_kelembapan(temperature, humidity, tanggal, waktu) VALUES ('".(int) $getTemperature."', '$getHumidity', '".date("Y-m-d")."', '".date("H:i:s")."')");
?>
<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/4/18
 * Time: 07:20 AM
 */
//    include "../db_connection.php";
//    $sql = $conn->query("SELECT wind_speed FROM wind ORDER BY record_id DESC LIMIT 1");
//    $data = $sql->fetch_array();
//    $kecepatan_angin = $data['wind_speed'];
//    echo $kecepatan_angin;
    include "../decode_xml_current_weather.php";
    echo number_format(floatval($getWindSpeed) * 3.6, 2);
?>
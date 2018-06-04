<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/4/18
 * Time: 07:25 AM
 */
//    include "../db_connection.php";
//    $sql = $conn->query("SELECT wind_direction FROM wind ORDER BY record_id DESC LIMIT 1");
//    $data = $sql->fetch_array();
//    $arah_angin =


    include "../decode_xml_current_weather.php";
    echo $getWindDirection;
?>
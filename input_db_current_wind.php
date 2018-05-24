<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/22/18
 * Time: 07:50 AM
 */
    include "db_connection.php"; include "decode_xml_current_weather.php";

    date_default_timezone_set("Asia/Jakarta");
    $windSpeedFinal = floatval($getWindSpeed) * 3.6;
    $windSpeedFinal_2 = number_format($windSpeedFinal, 2);

    mysqli_query($conn,"INSERT INTO wind(wind_speed, wind_direction) VALUES ('$windSpeedFinal_2', '$getWindDirection')");
?>
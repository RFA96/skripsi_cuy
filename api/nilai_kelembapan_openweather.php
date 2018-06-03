<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/2/18
 * Time: 23:15 PM
 */
    include "koneksi.php";
    $url = "http://api.openweathermap.org/data/2.5/weather?id=1636722&APPID=a58d462b62efd9a6d2376ddd797c91e1&mode=xml&type=accurate&units=metric";
    $getWeather = simplexml_load_file($url);
    $getTemperature = $getWeather->temperature['value'];
    $getHumidity = $getWeather->humidity['value'];
    echo (int) $getHumidity;
<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 5/2/18
 * Time: 16:23 PM
 */
    $url = "http://api.openweathermap.org/data/2.5/weather?id=1636722&APPID=a58d462b62efd9a6d2376ddd797c91e1&mode=xml&type=accurate&units=metric";
    $getWeather = simplexml_load_file($url);
    $getTemperature = $getWeather->temperature['value'];
    $getHumidity = $getWeather->humidity['value'];
    $getCloud = $getWeather->clouds['name'];
    $getPrecipitation = $getWeather->precipitation['mode'];
    $getWindSpeed = $getWeather->wind->speed['value'];
    $getWindDirection = $getWeather->wind->direction['name'];
?>
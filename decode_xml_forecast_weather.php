<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/13/18
 * Time: 23:04 PM
 */
    $url = "http://localhost/skripsi_cuy/forecast_weather.xml";
    $getForecast = simplexml_load_file($url);
//    $getSymbolNumber = $getForecast->{'forecast'}->{'time'}->symbol['number'];
    $getSymbolNumber = $getForecast->{'forecast'}->time['from'];
    $getSymbolNumber2 = $getForecast->{'forecast'}->time['from'];
    echo $getSymbolNumber."<br>".$getSymbolNumber2;
?>
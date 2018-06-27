<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/27/18
 * Time: 16:50 PM
 */
    $result = exec("python /home/pi/Documents/skripsi_cuy_python/print_hello_world.py");
    $result_array = json_decode($result);

    foreach ($result_array as $row)
    {
        echo $row;
    }
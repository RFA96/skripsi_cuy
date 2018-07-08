<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/6/18
 * Time: 14:01 PM
 */
    error_reporting(0);
    include "../db_connection.php";

    $sekarang = date('Y-m-d');
    $seminggu_sebelumnya = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

    $result = $conn->query("SELECT temperature, humidity, tanggal, waktu FROM suhu_kelembapan WHERE temperature > 27 AND tanggal BETWEEN '$seminggu_sebelumnya' AND '$sekarang'");
    while($row = $result->fetch_array())
    {
        $waktu = explode(":", $row['waktu']);   // AMBIL JAM SAJA

        $s[$row['temperature']][$waktu[0]]+=1;
        // s[suhu][waktu].
        // s[28][10] = 1
        // s[28][10] = 2
        // s[28][10] = 3

        // s[29][10] = 1

        // s[28][11] = 1
        // s[28][11] = 2

    }

    echo "<pre>";
    print_r($s);
    echo "</pre>";

    $maxsuhu = max(array_keys($s));
    // dapatkan key(suhu) array tertinggi.

    $iterbanyak = max(array_values($s[$maxsuhu]));
    // cari jam terbanyak beerdasarkan value

    $jamterbanyak = array_search($iterbanyak, $s[$maxsuhu]);
    // ambil key(jam) berdasarkan value tertinggi

    $jamterbanyak = $jamterbanyak.":00:00";
    echo "<strong>Suhu terbesar adalah ".$maxsuhu." pada jam ".$jamterbanyak."</strong>";
//    $conn->query("INSERT INTO suhu_tertinggi(suhu, waktu) VALUES ($maxsuhu, '$jamterbanyak') ");
?>
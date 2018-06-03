<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/2/18
 * Time: 23:03 PM
 */
    include "koneksi.php";
    $sql = $conn->query("SELECT suhu, kelembapan FROM realtime_suhu_kelembapan ORDER BY id DESC LIMIT 1");
    $data = $sql->fetch_array();
    $kelembapan = $data['kelembapan'];
    echo $kelembapan;
?>
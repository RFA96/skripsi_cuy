<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/2/18
 * Time: 22:52 PM
 */
    include "koneksi.php";
    $sql = $conn->query("SELECT suhu, kelembapan FROM realtime_suhu_kelembapan ORDER BY id DESC LIMIT 1");
//    $sql = $conn->query("SELECT suhu, kelembapan FROM skripsi_realtime.coba_koneksi_arduino ORDER BY record_id DESC LIMIT 1");
    $data = $sql->fetch_array();
    $suhu = $data['suhu'];
    echo $suhu;
?>
<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/14/18
 * Time: 18:40 PM
 */
    include '../db_connection.php';
    $sql = $conn->query("SELECT * FROM skripsi_cuy.coba_koneksi_arduino ORDER BY record_id DESC LIMIT 1");
    $data = $sql->fetch_array();
    if($data['suhu'] > 30)
    {
        $suhu_akhir = $data['suhu'].'<br>Lakukan pendinginan!<br>';
    }
    else
    {
        $suhu_akhir = $data['suhu'].'<br>Suhu normal!<br>';
    }
    echo $suhu_akhir;
<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/4/18
 * Time: 06:56 AM
 */
    include "koneksi.php";

    $sql = $conn->query("SELECT intensitas_cahaya FROM skripsi_realtime.coba_koneksi_arduino ORDER BY record_id DESC LIMIT 1");
    $data = $sql->fetch_array();
    $intensitas_cahaya = $data['intensitas_cahaya'];
    echo $intensitas_cahaya;
?>
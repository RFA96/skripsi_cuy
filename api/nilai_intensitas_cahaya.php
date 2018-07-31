<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 6/4/18
 * Time: 06:56 AM
 */
    include "koneksi.php";

    $sql = $conn->query("SELECT luminance FROM skripsi_cuy.light_intensity ORDER BY record_id DESC LIMIT 1");
    $data = $sql->fetch_array();
    $intensitas_cahaya = $data['luminance'];
    echo $intensitas_cahaya;
?>
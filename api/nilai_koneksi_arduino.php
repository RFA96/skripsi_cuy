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
        $cmd = escapeshellcmd('/Users/raka_matsukaze/Documents/python_docs/suhu_kelembapan/jam_11.py');
        shell_exec($cmd);
//        shell_exec('/Users/raka_matsukaze/Documents/python_docs/suhu_kelembapan/jam_11.py');
    }
    else
    {
        $suhu_akhir = $data['suhu'].'<br>Suhu normal!<br>';
        $cmd = escapeshellcmd('/Users/raka_matsukaze/Documents/python_docs/suhu_kelembapan/jam_12.py');
        shell_exec($cmd);
//        shell_exec('/Users/raka_matsukaze/Documents/python_docs/suhu_kelembapan/jam_12.py');
    }
    echo $suhu_akhir;
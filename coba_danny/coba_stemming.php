<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/2/18
 * Time: 20:59 PM
 */
    require_once __DIR__ . '/vendor/autoload.php';
    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
    $stemmer = $stemmerFactory->createStemmer();

    $kalimat = 'Saya galau ditinggal pacar karena saya melihat dia bersama orang lain';
    $output = $stemmer->stem($kalimat);

    echo 'Variabel biasa<br>';
    echo '---------------------------------------------------------<br>';
    echo 'Kalimat asli: '.$kalimat.'<br>';
    echo 'Kalimat <i>stemming</i>: '.$output.'<br>';
?>
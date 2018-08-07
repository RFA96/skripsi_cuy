<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 8/7/18
 * Time: 00:53 AM
 */
    include "Ssh2_crontab_manager.php";
    $crontab = new Ssh2_crontab_manager('192.168.1.24', '21', 'pi', 'raspberry');
    $crontab->append_cronjob('* * * * * python hello_world.py');
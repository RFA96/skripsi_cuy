<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 7/31/18
 * Time: 09:44 AM
 */
    include "../db_connection.php";
    require_once(__DIR__ . '/vendor/autoload.php');

    $job1 = new \Cron\Job\ShellJob();
    $job1->setCommand('python /Users/raka_matsukaze/Documents/python_docs/hello_world.py');
    $job1->setSchedule(new Cron\Schedule\CrontabSchedule('* * * * *'));

    //Tambahkan cron
    $resolver = new \Cron\Resolver\ArrayResolver();
    $resolver->addJob($job1);

    $cron = new \Cron\Cron();
    $cron->setExecutor(new \Cron\Executor\Executor());
    $cron->setResolver($resolver);

    $cron->run();
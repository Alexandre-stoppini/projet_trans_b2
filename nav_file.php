<?php
include_once('includes/front/header.php');
include 'ChromePhp.php';
session_start();
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=index.php">
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    <?php
} else {
    $test = shell_exec('ls /var/www/html');
    ChromePhp::log($test);
    ChromePhp::log(gettype($test));
    echo $test;
    ?>


    <a href="/home/devatom/sauvegarde/rempart/test.txt" id="dl_serv">Test de dl</a>
    <a href="/bdd/acces_bdd.txt" id="dl_serv" download>Test de dl</a>


    <?php
//    $result = shell_exec('whoami');
//    $result = shell_exec('cat /home/rempart/test.txt');
//    ChromePhp::log($result);
//    echo $result;
}

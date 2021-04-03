<?php
include_once('includes/front/header.php');
include 'ChromePhp.php';
include 'recursiv.php';
session_start();
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=index.php">
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    <?php
} else {
//    $test = shell_exec('ls /');
//
//    echo $test;
//
//    $test_array = preg_split("/[\s,]+/", $test);
//
//    for ($i = 0; $i < count($test_array); $i++) {
//
//        echo "<p>" . $test_array[$i] ."</p>";
//  }
    $chemin = shell_exec("tree -J /opt/scripts");
    $chemin_array = preg_split("/[{]+/", $chemin);
    for ($i = 1; $i < count($chemin_array); $i++) {
        echo $chemin_array[$i];
    }
//    explore("/");
    ?>


    <!--    <a href="/opt/scripts/newuser.sh" id="dl_serv" download>Test de dl</a>-->
    <!--    <a href="/bdd/acces_bdd.txt" id="dl_serv" download>Test de dl</a>-->


    <?php
//    $result = shell_exec('whoami');
//    $result = shell_exec('cat /home/rempart/test.txt');
//    ChromePhp::log($result);
//    echo $result;
}

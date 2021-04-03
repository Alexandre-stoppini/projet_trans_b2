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

 echo explore("/var/www/html/projet_trans_b2");

//    $chemin = (shell_exec("tree -J /opt/scripts"));
//
//    var_dump(json_encode($chemin)[0]);
    ?>


    <!--    <a href="/opt/scripts/newuser.sh" id="dl_serv" download>Test de dl</a>-->
    <!--    <a href="/bdd/acces_bdd.txt" id="dl_serv" download>Test de dl</a>-->


    <?php
//    $result = shell_exec('whoami');
//    $result = shell_exec('cat /home/rempart/test.txt');
//    ChromePhp::log($result);
//    echo $result;
}

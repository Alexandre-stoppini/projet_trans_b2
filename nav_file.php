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
    ?>


   <a href="download.php?path=86.213.73.59/projet_trans_b2/sauvegarde/devatom/rempart/test.txt" id="dl_serv">Test de dl</a>
    <p>test</p>


    <?php
//    $result = shell_exec('whoami');
//    $result = shell_exec('cat /home/rempart/test.txt');
//    ChromePhp::log($result);
//    echo $result;
}
include_once('includes/front/footer.php');
?>
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

    ?>
    <div class="container-scan">
        <?php
        explore("/sauvegarde/" . $_SESSION['username']);
        ?>
    </div>
    <?php
} ?>

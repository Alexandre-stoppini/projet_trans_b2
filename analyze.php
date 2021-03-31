<?php
include_once("includes/front/header.php");
include 'ChromePhp.php';
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=index.php">
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    <?php
} else {
    //du -h | grep .$_SESSION["username"]. | tail -1 | cut -d "." -f1
    $size_file = shell_exec('du -h | grep \''.$_SESSION["username"].'\' | tail -1 | cut -d "." -f1');
    ChromePhp::log('Essaie du script du -h | grep \'' .$_SESSION["username"].'\' | tail -1 | cut -d "." -f1');
    ChromePhp::log($size_file);
    ?>

    <p>Analyse des données serveurs :</p>
    <ul>
        <li>A faire : espace disque occupée par les sauvegardes</li>
        <li>A faire : date de la dernière sauvegarde</li>
    </ul><?php


}
include_once("includes/front/footer.php");
?>

</body>
</html>

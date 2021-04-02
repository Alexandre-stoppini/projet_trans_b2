<?php
include_once("includes/front/header.php");
include 'ChromePhp.php';
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=index.php">
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    <?php
} else {
    echo 'Bienvenue ' .$_SESSION["username"];
    //
    //'du -h | grep \''.$_SESSION["username"].'\' | tail -1 | cut -d "." -f1'
    // fonctionne : ls /var/sauvegarde/devatom
    // pour les tests : 'ls /var/test/devatom'
//    $commande_last_modif = "stat -c %y /var/sauvegarde/devatom | cut -d '.' -f1";
//    $commande_size = 'du -sh "/var/sauvegarde/devatom" | tail -1 | cut -d "/" -f1';
//    $size_file = shell_exec("$commande_size");
//
//    ChromePhp::log('Essaie du script du -h | grep \'' .$_SESSION["username"].'\' | tail -1 | cut -d "." -f1');
//
//
//    ChromePhp::log("Taille du fichier : " . $size_file);
//    ChromePhp::log("Qui suis-je ?" . shell_exec("whoami"));
//    ChromePhp::log("Date de dernière modification : " . $commande_last_modif);
    ?>

    <p>Analyse des données serveurs :</p>
    <ul>
        <li>A faire : espace disque occupée par les sauvegardes</li>
        <li>A faire : date de la dernière sauvegarde</li>
    </ul><?php


}
?>

</body>
</html>

<?php
include_once("includes/front/header.php");
include 'ChromePhp.php';
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=index.php">
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    <?php
} else {
    echo 'Bienvenue ' . $_SESSION["username"];

//    $commande_size = 'du -sh "/sauvegarde/devatom" | tail -1 | cut -d "/" -f1';
//    $commande_last_modif = "stat -c %y /sauvegarde/devatom | cut -d '.' -f1";


    $commande_size = 'du -sh "/sauvegarde/' . $_SESSION["username"] . '" | tail -1 | cut -d "/" -f1';
    $size_file = shell_exec("$commande_size");

    $commande_last_modif = "stat -c %y /sauvegarde/" . $_SESSION["username"] . " | cut -d '.' -f1";
    $last_modif = shell_exec("$commande_last_modif");


    ChromePhp::log('Essaie du script : '. $commande_size);
    ChromePhp::log('Test pour comparaison : du -sh "/sauvegarde/devatom" | tail -1 | cut -d "/" -f1 ');
    ChromePhp::log("Taille du fichier : " . $size_file);

    ChromePhp::log("Essaie du script : " . $commande_last_modif);
    ChromePhp::log("Test pour comparaison : stat -c %y /sauvegarde/devatom | cut -d '.' -f1 ");
    ChromePhp::log("Date de dernière modification : " . $last_modif);
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

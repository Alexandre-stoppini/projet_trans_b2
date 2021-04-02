<?php
include_once("includes/front/header.php");
include 'ChromePhp.php';
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="3 URL=index.php">
    <p>Vous n'êtes pas autorisé à accéder à cette page.</p>
    <?php
} else {
    echo 'Bienvenue ' . $_SESSION["username"];

    $commande_size = 'du -sh "/sauvegarde/' . $_SESSION["username"] . '/passphrase.txt" '/*| tail -1 | cut -d "/" -f1'*/;
    $size_file = shell_exec("$commande_size");

    $commande_last_modif = "stat -c %y /sauvegarde/" . $_SESSION["username"] . " | cut -d '.' -f1";
    $last_modif = shell_exec("$commande_last_modif");

    ChromePhp::log("Taille du fichier : " . $size_file);
    ChromePhp::log("Date de dernière modification : " . $last_modif);


    ?>

    <p>Analyse des données serveurs :</p>
    <ul>
        <li>Espace occupé par vos fichiers : </li> <?php echo $size_file;?>
        <li>Date de la dernière sauvegarde : </li> <?php echo $last_modif;?>
    </ul><?php


}
?>

</body>
</html>

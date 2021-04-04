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
//    $commande_size = 'du -sh "/sauvegarde/' . $_SESSION["username"] . '/rempart" '/*| tail -1 | cut -d "/" -f1'*/;
    $commande_size = 'du -sh /sauvegarde/test '/*| tail -1 | cut -d "/" -f1'*/;
    $size_file = shell_exec("$commande_size");
    $commande_last_modif = "stat -c %y /sauvegarde/" . $_SESSION["username"] . " | cut -d '.' -f1";
    $last_modif = exec("$commande_last_modif");
    ChromePhp::log("Commande executée : " . $commande_size);
    ChromePhp::log("Taille du fichier : " . $size_file);
    ChromePhp::log("Commande executée : " . $commande_last_modif);
    ChromePhp::log("Date de dernière modification : " . $last_modif);
    ChromePhp::log(exec("whoami"));
    ?>
    <div class="container">
        <div class="xLarge-12 large-12 medium-12 small-12 xsmall-12">
            <p>Analyse des données serveurs :</p>
        </div>
        <div class="xLarge-12 large-12 medium-12 small-12 xsmall-12 container-infos">
            <div class="xLarge-5 large-5 medium-5 small-5 xsmall-5 infos">
                <h1>Espace occupé par vos fichiers :</h1>
                <p><?php echo $size_file; ?></p>
            </div>
            <div class="xLarge-5 large-5 medium-5 small-5 xsmall-5 infos">
                <h1>Date de la dernière sauvegarde :</h1>
                <p><?php echo $last_modif; ?></p>
            </div>
        </div>
    </div>

<?php
}
?>

</body>
</html>

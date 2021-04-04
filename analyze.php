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

    $infos = preg_split("(\s)", $size_file);
    
    if (preg_match(".*K.*", $infos[0])){
        ChromePhp::log("salut");
        $size = (float)preg_replace("K", "", $infos[1]) / 1000;
    }
    elseif (preg_match(".*M.*", $infos[0])){
        ChromePhp::log("M");
        $size = (float)preg_replace("M", "", $infos[1]);
    }
    else{
        ChromePhp::log("salam");
        ChromePhp::log($infos[0]);
        $size = (float)preg_replace("G", "", $infos[1]) * 1000;
    }

    ?>
    <div class="container">
        <div class="xLarge-11 large-11 medium-11 small-11 xsmall-11 title">
            <p>Analyse des données serveurs :</p>
        </div>
        <div class="xLarge-12 large-12 medium-12 small-12 xsmall-12 container-infos">
            <div class="xLarge-7 large-7 medium-7 small-7 xsmall-7 infos">
                <h1>Espace occupé par vos fichiers :</h1>
                <div class="progress-bar">
                    <div class="bar" style="width: <?php echo 100*$size ?> "></div>
                </div>
                <div>
                    <h3>Volume :</h3>
                    <p><?php echo $size; ?> Mo</p>
                </div>
                <div>
                    <h3>Path :</h3>
                    <p><?php echo $infos[1]; ?></p>
                </div>
            </div>
            <div class="xLarge-4 large-4 medium-4 small-4 xsmall-4 infos">
                <h1>Date de la dernière sauvegarde :</h1>
                <div class="date">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                            width="36.447px" height="36.447px" viewBox="0 0 36.447 36.447" style="enable-background:new 0 0 36.447 36.447;"
                            xml:space="preserve">
                        <g>
                            <g>
                                <path d="M30.224,3.948h-1.098V2.75c0-1.517-1.197-2.75-2.67-2.75c-1.474,0-2.67,1.233-2.67,2.75v1.197h-2.74V2.75
                                    c0-1.517-1.197-2.75-2.67-2.75c-1.473,0-2.67,1.233-2.67,2.75v1.197h-2.74V2.75c0-1.517-1.197-2.75-2.67-2.75
                                    c-1.473,0-2.67,1.233-2.67,2.75v1.197H6.224c-2.343,0-4.25,1.907-4.25,4.25v24c0,2.343,1.907,4.25,4.25,4.25h24
                                    c2.344,0,4.25-1.907,4.25-4.25v-24C34.474,5.855,32.567,3.948,30.224,3.948z M25.286,2.75c0-0.689,0.525-1.25,1.17-1.25
                                    c0.646,0,1.17,0.561,1.17,1.25v4.896c0,0.689-0.524,1.25-1.17,1.25c-0.645,0-1.17-0.561-1.17-1.25V2.75z M17.206,2.75
                                    c0-0.689,0.525-1.25,1.17-1.25s1.17,0.561,1.17,1.25v4.896c0,0.689-0.525,1.25-1.17,1.25s-1.17-0.561-1.17-1.25V2.75z M9.125,2.75
                                    c0-0.689,0.525-1.25,1.17-1.25s1.17,0.561,1.17,1.25v4.896c0,0.689-0.525,1.25-1.17,1.25s-1.17-0.561-1.17-1.25V2.75z
                                    M31.974,32.198c0,0.965-0.785,1.75-1.75,1.75h-24c-0.965,0-1.75-0.785-1.75-1.75v-22h27.5V32.198z"/>
                                <rect x="6.724" y="14.626" width="4.595" height="4.089"/>
                                <rect x="12.857" y="14.626" width="4.596" height="4.089"/>
                                <rect x="18.995" y="14.626" width="4.595" height="4.089"/>
                                <rect x="25.128" y="14.626" width="4.596" height="4.089"/>
                                <rect x="6.724" y="20.084" width="4.595" height="4.086"/>
                                <rect x="12.857" y="20.084" width="4.596" height="4.086"/>
                                <rect x="18.995" y="20.084" width="4.595" height="4.086"/>
                                <rect x="25.128" y="20.084" width="4.596" height="4.086"/>
                                <rect x="6.724" y="25.54" width="4.595" height="4.086"/>
                                <rect x="12.857" y="25.54" width="4.596" height="4.086"/>
                                <rect x="18.995" y="25.54" width="4.595" height="4.086"/>
                                <rect x="25.128" y="25.54" width="4.596" height="4.086"/>
                            </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                    </svg>
                    <p><?php echo $last_modif; ?></p>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>

</body>
</html>

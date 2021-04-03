<?php
include 'ChromePhp.php';
function explore($path)
    /* TODO : faire de $path une variable global et penser et à la supprimer dans logout*/
{
    $chemin = shell_exec("ls " . $path);
    $chemin_array = preg_split("/[\s]+/", $chemin);
    for ($i = 0; $i < count($chemin_array); $i++) {

        echo "<p>" . $chemin_array[$i] . "</p>";
        if (shell_exec("-d " . $chemin_array[$i])) {
            echo "directory";
        } else {
            ChromePhp::log(shell_exec("-d " . $chemin_array[$i]));
            echo "file";
        }
    }
//    while (true) {
//        for($i =0; $i<count($chemin_array); $i++){
//            echo $chemin_array[$i];
//        }
//    }
}
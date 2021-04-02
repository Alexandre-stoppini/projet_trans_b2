<?php
function explore($path)
    /* TODO : faire de $path une variable global et penser et à la supprimer dans logout*/
{
    $chemin = shell_exec("ls ". $path);
    $chemin_array = preg_split("/[\s]+/", $chemin);
    while (true) {
        for($i =0; $i<count($chemin_array); $i++){
            echo $chemin_array[$i];
        }

    }

}
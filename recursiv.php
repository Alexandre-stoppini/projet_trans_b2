<?php
function explore($path)
    /* TODO : faire de $path une variable global et penser et à la supprimer dans logout*/
{

    $chemin = shell_exec("tree -J $path");
    $chemin_array_file = preg_split('/({"type":")|(","name":")|("})|(,)|(","contents":\[)|(\[)|(]})|(report","directories":\d*,"files":\d*)/', $chemin);
    //var_dump($chemin_array_file);
    for ($i = 0; $i < count($chemin_array_file); $i++) {
        if ($chemin_array_file[$i] == "directory") {
            echo "<p>Dossier : </p>";
        } elseif ($chemin_array_file[$i] == "file") {
            echo "<p>Fichier : </p>";
        } else {
            echo $chemin_array_file[$i];
        }
            //     if ($i % 2 == 0) {
//            if ($chemin_array_file[$i] == "directory") {
//                echo "<span><br>Dossier : </span>"/* . $chemin_array_file[$i]*/;
//            } elseif ($chemin_array_file[$i] == "file") {
//                echo "<span><br>Fichier : </span> " /*. $chemin_array_file[$i]*/;
//            }
//        } elseif ($i % 2 == 1){
//            echo  $chemin_array_file[$i];
//        }
    }
}

<?php
function explore($path)
    /* TODO : faire de $path une variable global et penser et à la supprimer dans logout*/
{

    $chemin = shell_exec("tree -J $path");
//    $chemin_array_file = preg_split('/({"type":")|(","name":")|("})|(,)|(","contents":\[)|(\[)|(]})|(report","directories":\d*,"files":\d*(})|(]))/', $chemin);
//    for ($i = 0; $i < count($chemin_array_file); $i++) {
//        if ($chemin_array_file[$i] == "directory") {
//            echo "<span><br>Dossier : </span>";
//        } elseif ($chemin_array_file[$i] == "file") {
//            echo "<span><br>Fichier : </span>";
//        } else {
//            echo $chemin_array_file[$i];
//        }
//      }
    $chemin_array = preg_split('/(\/sauvegarde\/)|(\s->\s)/', $chemin);
    for ($i = 0; $i < count($chemin_array); $i++) {
        if (preg_match('/(\.)/', $chemin_array[$i])) {
            $foo = preg_split('/(\/)/',$chemin_array[$i]);
            echo $foo[count($foo)-1];
        }
    }
}

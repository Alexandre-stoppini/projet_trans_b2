<?php
function explore($path)
{

    $chemin = shell_exec("tree -fi $path");
    //tree -J
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
    $chemin_array = preg_split('/(^\/sauvegarde\/)|(\d*\sdirectories,\s\d*\sfiles)/', $chemin);
    for ($i = 0; $i < count($chemin_array); $i++) {

        // print tous les fichiers
        if (preg_match('/(\.)/', $chemin_array[$i])) {
            $foo = preg_split('/(\/)/',$chemin_array[$i]);
            echo "<span><br>Votre fichier à télécharger : </span>" . $foo[count($foo)-1];
        } else {
            echo "<span><br>" . $chemin_array[$i]."</span>";
        }
    }
}

<?php
function explore($path)
{

    $chemin = shell_exec("tree -fi $path");

    $chemin_array = preg_split('/(\/sauvegarde\/)|(\d*\sdirectories,\s\d*\sfiles)/', $chemin);
    for ($i = 0; $i < count($chemin_array); $i++) {

        // print tous les fichiers
        if (preg_match('/(\.)/', $chemin_array[$i])) {
            $foo = preg_split('/(\/)/',$chemin_array[$i]);
            echo "<span><br>Votre fichier à télécharger : </span>" . $foo[count($foo)-1] . "<a href='/sauvegarde/". $chemin_array[$i] ." download'>Télécharger</a>";
        } else {
            echo "<span><br>" . $chemin_array[$i]."</span>";
        }
    }
}

<?php
function explore($path)
{

    $chemin = shell_exec("tree -fi $path");

    $chemin_array = preg_split('/(\/sauvegarde\/)|(\d*\sdirectories,\s\d*\sfiles)/', $chemin);
    for ($i = 0; $i < count($chemin_array); $i++) {

        // print tous les fichiers
        if (preg_match('/(\.)/', $chemin_array[$i])) {
            $foo = preg_split('/(\/)/',$chemin_array[$i]);
            echo "<div class='file'>
                <span>Votre fichier à télécharger : " . $foo[count($foo)-1] . "</span>
                <a href='/sauvegarde/". $chemin_array[$i] ."' download>
                    <svg>
                    <path d='M17 12v5H3v-5H1v5a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-5z'/>
                    <path d='M10 15l5-6h-4V1H9v8H5l5 6z'/>
                    </svg>
                </a>
                </div>";
        } else {
            echo "<div class='dir' ><span>" . $chemin_array[$i]."</span></div>";
        }
    }
}

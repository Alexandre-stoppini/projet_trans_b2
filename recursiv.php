<?php
function explore($path)
    /* TODO : faire de $path une variable global et penser et à la supprimer dans logout*/
{
//    $chemin = shell_exec("ls " . $path);
//    $chemin_array = preg_split("/[\s]+/", $chemin);
//    for ($i = 0; $i < count($chemin_array); $i++) {
//
//        echo "<p>" . $chemin_array[$i] . "</p>";
//        if (shell_exec("-d " . $chemin_array[$i])) {
//            echo "directory";
//        } else {
//            $test = shell_exec("-d " . $chemin_array[$i]);
//            echo "test : " . $test;
//            echo "file";
//        }
//    }
//    while (true) {
//        for($i =0; $i<count($chemin_array); $i++){
//            echo $chemin_array[$i];
//        }
//    }

    $chemin = shell_exec("tree -J $path");
    echo $chemin;
    $chemin_array = preg_split("/[{]+/", $chemin);
    for ($i = 1; $i < count($chemin_array); $i++) {
        echo $chemin_array[$i];
    }
//        $result = array();
//        $cdir = scandir($path);
//        foreach ($cdir as $key => $value) {
//            if (!in_array($value, array(".", ".."))) {
//                if (is_dir($path . DIRECTORY_SEPARATOR . $value)) {
//                    $result[$value] = explore($path . DIRECTORY_SEPARATOR . $value);
//                } else {
//                    $result[] = $value;
//                }
//            }
//        }
//        return $result;
}

function scanDirectories($rootDir, $allData = array())
{
    // set filenames invisible if you want
    $invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd");
    // run through content of root directory
    $dirContent = scandir($rootDir);
    foreach ($dirContent as $key => $content) {
        // filter all files not accessible
        $path = $rootDir . '/' . $content;
        if (!in_array($content, $invisibleFileNames)) {
            // if content is file & readable, add to array
            if (is_file($path) && is_readable($path)) {
                // save file name with path
                $allData[] = $path;
                // if content is a directory and readable, add path and name
            } elseif (is_dir($path) && is_readable($path)) {
                // recursive callback to open new directory
                $allData = scanDirectories($path, $allData);
            }
        }
    }
    return $allData;
}

print_r(scanDirectories("."));
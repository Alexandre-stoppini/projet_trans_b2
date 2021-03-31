<?php
define('USER', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');
define('DATABASE', 'test');
try {
    $connection = new PDO("mysql:host=localhost;dbname=projet_trans_reseau_b2", 'root', 'rempart');
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
//test
?>
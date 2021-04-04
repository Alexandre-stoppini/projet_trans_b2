<?php
session_start();
?>
<!DOCTYPE html>
<html lang="FR-fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>PROJET TRANS</title>
</head>
<body>
<header>
    <div id="header">
        <?php
        if (empty($_SESSION['username'])) {
            ?>
            <a href="login.php">Login</a>
            <a href="registration.php">Registration</a>
            ?>
            <?php
        } else {
            ?>
            
            
            <a href="analyze.php">Analyse de l'espace serveur</a>
            <a href="nav_file.php">Explorateur de fichiers</a>
            <a href="logout.php">Logout</a>
            <?php
        }
        ?>
    </div>
</header>

<div id="page-container">

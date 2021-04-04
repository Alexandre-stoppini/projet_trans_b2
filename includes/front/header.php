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
            <div class="nav">
                <a href="analyze.php">Analyse de l'espace serveur</a>
                <a href="nav_file.php">Explorateur de fichiers</a>
                <a href="logout.php">Logout</a>
            </div>
            <div class="account">
                <div>
                    <svg  
                        width="30" 
                        height="30"
                        stroke="black"
                        stroke-width="30"
                        fill="none">

                    <circle cx="300" cy="300" r="265" />
                    <circle cx="300" cy="230" r="115" />	
                    <path d="M106.81863443903,481.4 a205,205 1 0,1 386.36273112194,0" stroke-linecap="butt" />
                    </svg>
                </div>
                <p>
            <?php
                echo 'Bienvenue ' . $_SESSION["username"];
            ?>
                </p>
            </div>
            <?php
        }
        ?>
    </div>
</header>

<div id="page-container">

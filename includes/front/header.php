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
                    <svg height="50pt" viewBox="0 0 50 50" width="50pt"><path color="#FFF" d="m512 256c0-141.488281-114.496094-256-256-256-141.488281 0-256 114.496094-256 256 0 140.234375 113.539062 256 256 256 141.875 0 256-115.121094 256-256zm-256-226c124.617188 0 226 101.382812 226 226 0 45.585938-13.558594 89.402344-38.703125 126.515625-100.96875-108.609375-273.441406-108.804687-374.59375 0-25.144531-37.113281-38.703125-80.929687-38.703125-126.515625 0-124.617188 101.382812-226 226-226zm-168.585938 376.5c89.773438-100.695312 247.421876-100.671875 337.167969 0-90.074219 100.773438-247.054687 100.804688-337.167969 0zm0 0"/><path d="m256 271c49.625 0 90-40.375 90-90v-30c0-49.625-40.375-90-90-90s-90 40.375-90 90v30c0 49.625 40.375 90 90 90zm-60-120c0-33.085938 26.914062-60 60-60s60 26.914062 60 60v30c0 33.085938-26.914062 60-60 60s-60-26.914062-60-60zm0 0"/></svg>
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

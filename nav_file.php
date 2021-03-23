<link rel="stylesheet" href="assets/css/style.css">
<?php
include_once('includes/front/header.php');
?>
<div class="vide">

    <?php
    $result = shell_exec("ls /home/rempart/");
    echo $result;
    ?>


</div>
<?php
include_once('includes/front/footer.php');
?>
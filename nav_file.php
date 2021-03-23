<link rel="stylesheet" href="assets/css/style.css">
<?php
include_once('includes/front/header.php');
include 'ChromePhp.php';
?>
<div class="vide">

    <?php
    //$result = shell_exec('whoami');
    $result = shell_exec("cat /home/rempart/test.txt");
    ChromePhp::log($result);
    echo $result;
    ?>


</div>
<?php
include_once('includes/front/footer.php');
?>
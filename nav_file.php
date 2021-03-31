<?php
include_once('includes/front/header.php');
include 'ChromePhp.php';
session_start();
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=">
    <?php
} else {
?>
<div class="vide">

    <?php
    //$result = shell_exec('whoami');
    $result = shell_exec('cat /home/rempart/test.txt');
    ChromePhp::log($result);
    echo $result;
    ?>


</div>
<?php
}
include_once('includes/front/footer.php');
?>
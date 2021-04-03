<?php
include_once("includes/front/header.php");
include 'ChromePhp.php';
ChromePhp::log(shell_exec("/opt/scripts/newuser.sh ant ant 192.168.10.2 /home"));
ChromePhp::log("TEST");

?>

    <p>poueteuh le retour</p>
    <p>troisieme test</p>



</body>
</html>

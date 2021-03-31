<?php
include_once("includes/front/header.php");
if (empty($_SESSION['username'])) {
    ?>
    <meta http-equiv="refresh" content="1; URL=86.123.73.59">
    <?php
} else {

    ?>

    <main>
        <p>poueteuh le retour</p>
        <p>troisieme test</p>
    </main>

    <?php
}
include_once("includes/front/footer.php");
?>

</body>
</html>

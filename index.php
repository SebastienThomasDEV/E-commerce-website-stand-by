<?php
session_start();
require("connexionBd.php");
/*
print_r($_GET);
print_r($_POST);
print_r($_SESSION);
*/



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <title>Document</title>
</head>

<body>
    <?php require("header.php"); ?>
    <div class="section">
        <div class="content_top">
            <span>Presentation</span>
            <p id="text1">
                Sed vitae felis imperdiet lorem convallis sollicitudin.<br>
                Nulla porttitor justo justo, rutrum suscipit urna facilisis ac<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
            </p>
        </div>
        <div class="content_middle">
            <span>Tentez sa chance</span>
            <p id="text2">
                Sed vitae felis imperdiet lorem convallis sollicitudin.<br>
                Nulla porttitor justo justo, rutrum suscipit urna facilisis ac<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
            </p>
        </div>
        <div class="content_bottom">
            <span>Rejoignez nous</span>
            <p id="text3">
                Sed vitae felis imperdiet lorem convallis sollicitudin.<br>
                Nulla porttitor justo justo, rutrum suscipit urna facilisis ac<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
                Phasellus mollis sed nisi ac eleifend. Sed cursus erat tempor diam luctus, et maximus ante tempus.<br>
            </p>
        </div>
    </div>
    <script src='js/anim.js?version=<?= time() ?>'></script>
</body>

</html>
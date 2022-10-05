<?php
session_start();
require("connexionBd.php");

#print_r($_GET);
#print_r("Genre :".$_POST['gender']);
print_r($_POST);

$sql = "INSERT INTO `myguests` (`id`, `firstname`) VALUES (NULL, :firstname)";
$req_prep_insert = $connexion->prepare($sql);

if(!empty($_POST))
{
    $req_prep_insert->bindParam(':firstname', $_POST['nom']);
    $req_prep_insert->execute();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <!--
    <link rel="stylesheet" href="css/fontawesome-free-6.0.0-web/css/all.min.css">
    -->

    <title>Document</title>
</head>

<body>
    <?php require("header.php"); ?>

    <form action="test.php" method="post">
    <p>Votre nom : <input type="text" name="nom" /></p>
    <p><input type="submit" value="OK"></p>
</form>


</html>
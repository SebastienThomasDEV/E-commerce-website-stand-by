<?php
session_start();
require("connexionBd.php");




#selectionner tous les lots non complété
$sql = "SELECT * FROM `lot` WHERE completion_lot < 100"; #Je pense que la requête n'est pas bonne et qu'elle s'arrête à la première ligne trouvé
$result = $connexion->query($sql);

$arraylot = $result->fetchAll(PDO::FETCH_ASSOC);
print_r($arraylot);
#$arraylot=$result->fetchAll(PDO::FETCH_OBJ);

#var_dump($result2);


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

    <p id="p_lotterie">C'est la page lotterie</p>
    <a href="index.php">Comment jouer?</a>
    <div class="content">bonjour</div>

    <?php
    foreach ($arraylot as $attributlot) {
        var_dump($attributlot);
    }

    ?>
</body>

</html>
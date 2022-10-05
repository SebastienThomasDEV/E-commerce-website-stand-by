<?php
session_start();
require("connexionBd.php");
require("maildansbd.php");

    foreach($_POST as $x => $y)
    {
        printf("\r\n" . $x ."=>".$y. "\r\n");
    } 


$nomlot=NULL;
$descrlot=NULL;
$datedebut=NULL;
$datefin=NULL;
$valeurlot=NULL;
$argentenjeu=null;
$image=NULL;
$completion=NULL;


$req_prep_insert=$connexion->prepare("INSERT INTO `lot` (
                            `id_lot`, 
                            `nom_lot`, 
                            `description_lot`, 
                            `datedébut_lot`, 
                            `datefin_lot`, 
                            `valeur_lot`, 
                            `argentenjeu_lot`, 
                            `ticketenjeu_lot`, 
                            `image_lot`, 
                            `completion_lot`) 
                    VALUES ('', :nom, :descr, :datedebut,
                         :datefin, :valeurlot, '', '', :image, '')");



/*upload du fichier*/
#lien du tuto: https://code.tutsplus.com/tutorials/how-to-upload-a-file-in-php-with-example--cms-31763

if (!empty($_FILES))
{   
    //Obtenir les détails du fichier uploadé
    $fileTmpPath = $_FILES['fileToUpload']['tmp_name'];
    $fileName = $_FILES['fileToUpload']['name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileType = $_FILES['fileToUpload']['type'];
    $uploadFileDir = './imagelot/';
    $dest_path = $uploadFileDir . $fileName;
    move_uploaded_file($fileTmpPath, $dest_path); #deplacement du ficher fichier temp fichier destination


    $nomlot=$_POST['nomlot'];
    $descrlot=$_POST['descrlot'];
    $datedebut=$_POST['datedebut'];
    $datefin=$_POST['datefin'];
    $valeurlot=$_POST['valeurlot'];
    $argentenjeu=null;
    $completion=NULL;

    #Requête préparé du lot
    $req_prep_insert->bindParam(':nom', $nomlot);
    $req_prep_insert->bindParam(':descr', $descrlot);
    $req_prep_insert->bindParam(':datedebut', $datedebut);
    $req_prep_insert->bindParam(':datefin', $datefin);
    $req_prep_insert->bindParam(':valeurlot', $valeurlot);
    $req_prep_insert->bindParam(':image', $dest_path);
    if($req_prep_insert->execute())
    {
        echo "Le lot a correctement été crée dans la base";
    }
    else{
        echo "Erreur lors de la création du lot";
    }
    
}


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

    <!-- file upload button -->
    <form action="febam.php" method="post" enctype="multipart/form-data">

        <div>
            <label for="nomlot"><b>Nom du Lot</b></label>
            <input type="text" placeholder="Nom du lot" name="nomlot" id="nomlot" required>
        
        </div>
        <div>
            <label for="descrlot"><b>Description du Lot</b></label>
            <input type="text" placeholder="Description du lot" name="descrlot" id="descrlot" required>
        </div>

        <div>
            <label for="valeurlot"><b>Valeur du Lot</b></label>
            <input type="float" name="valeurlot" id="valeurlot" placeholder="Valeur €" required>
        </div>
        <div>
           <label for="datedebut"><b>Date de début du Lot</b></label>
           <input type="date" name="datedebut" id="datedebut" required>
        </div>
        <div>
            <label for="datefin"><b>Date de fin du Lot</b></label>
            <input type="date" name="datefin" id="datefin" required>
        </div>

        <div>
            <label for="fileToUpload"><b>Image</b></label>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
        </div>
        
        <div class="button">
            <input type="submit" name="submit" value="Enregistrer le lot">
        </div>
    </form>


</body>

</html>
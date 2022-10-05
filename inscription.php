<?php

use function PHPSTORM_META\type;

session_start();
require("connexionBd.php");
require("maildansbd.php");
#var_dump($_POST);

$mailbase = NULL;
$email = NULL;
$motPasse = NULL;
$nom = NULL;
$prenom = NULL;
$telephone = Null;
$msg = NULL;
$condutil = NULL;
$offrepub = '0';
$ticket = 0;
$argent = 0;
$gender = NULL;

$messagerror="";

#https://www.youtube.com/watch?v=4kQqC3M3QXs requête préparé

$req_prep_insert = $connexion->prepare("INSERT INTO `user` (id_user, mdp_user, tel_user, nom_user, prenom_user, mail_user, offrepub_user, condutil_user, argent_user, nbticket_user, sexe_user) VALUES ('', :mdp, :tel, :nom, :prenom, :mail, :offrepub, :condutil, :argent, :ticket,  :gender)");

if (
    !empty($_POST['email'])
    && !empty($_POST['mdp'])
    && !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['tel'])
    && (MaildansBase($_POST['email']) == false)
) {

    /*
    $email=htmlspecialchars(addslashes($_POST['email']));
    $motPasse=htmlspecialchars(addslashes(hash('sha256',$_POST['mdp'])));
    $nom=htmlspecialchars(addslashes($_POST['nom']));
    $prenom=htmlspecialchars(addslashes($_POST['prenom']));
    $telephone=htmlspecialchars(addslashes($_POST['tel']));
    */
    
    if (empty($_POST['offrepub']))
    {
        $_POST['offrepub']='0';
    }
    
    $motPasse=$_POST['mdp'];
    $telephone=$_POST['tel'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $offrepub=$_POST['offrepub'];
    $condutil=$_POST['condutil'];
    $argent=intval($argent);
    $ticket=floatval($ticket);
    $gender=$_POST['gender'];


    var_dump("Motdepasse: ".$motPasse.gettype($motPasse)."-Telephone: ".$telephone.gettype($telephone)."-Nom: ".$nom.gettype($nom)."-Prenom: ".$prenom.gettype($prenom)."-Mail: ".$email.gettype($email)."-Offrepub: ".$offrepub.gettype($offrepub)."-Conditionutilisa: ".$condutil.gettype($condutil)."-Argent: ".$argent.gettype($argent)."-Ticket: ".$ticket.gettype($ticket)."-Gender: ".$gender.gettype($gender));


    #Sauvegarde requete preparé
    $req_prep_insert->bindParam(':mdp', $motPasse); #varchar
    $req_prep_insert->bindParam(':tel', $telephone); #varchar
    $req_prep_insert->bindParam(':nom', $nom); #varchar
    $req_prep_insert->bindParam(':prenom', $prenom); #varchar
    $req_prep_insert->bindParam(':mail', $email); #varchar
    $req_prep_insert->bindParam(':offrepub', $offrepub); #varchar
    $req_prep_insert->bindParam(':condutil', $condutil); #varchar
    $req_prep_insert->bindParam(':argent', $argent); #float
    $req_prep_insert->bindParam(':ticket', $ticket); #int
    $req_prep_insert->bindParam(':gender', $gender); #varchar
    if($req_prep_insert->execute())
    {
        echo "Le'utilisateur a correctement été crée dans la base";
    }
    else{
        echo "Erreur lors de la création du lot";
    }
    
    header("Location:connexion.php"); /*redirection vers connexion.php*/
} else
{
    if (!empty($_POST))
    {
        $messagerror = "Veuillez remplir tout les champs ou changer d'adresse mail";
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


    <div class="container">
        <div class="title">Inscription</div>
        <p><?=$messagerror?></p>

        <form action="inscription.php" method="post">
            <div class="user">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input type="text" placeholder="Votre nom..." name="nom" required>
                </div>

                <div class="input-box">
                    <span class="details">Prénom</span>
                    <input type="text" placeholder="Votre pseudo..." name="prenom" required>
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Votre mail..." name="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Numéro de téléphone</span>
                    <input type="text" placeholder="Votre numéro..." name="tel" required>
                </div>
                <div class="input-box">
                    <span class="details">Mot de passe</span>
                    <input type="password" placeholder="Votre mot de passe..." name="mdp" required>
                </div>
                <div class="input-box">
                    <span class="details">Comfirmation</span>
                    <input type="text" placeholder="Confirmer la saisie..." required>
                </div>
            </div>
            <div class="gender">
                <input type="radio" name="gender" value="1" id="choix-1">
                <input type="radio" name="gender" value="2" id="choix-2">
                <input type="radio" name="gender" value="3" id="choix-3">
                <span class="type">Sexe</span>
                <div class="category">
                    <label for="choix-1">
                        <span class="choix un"></span>
                        <span class="gender">Homme</span>
                    </label>
                    <label for="choix-2">
                        <span class="choix deux"></span>
                        <span class="gender">Femme</span>
                    </label>
                    <label for="choix-3">
                        <span class="choix trois"></span>
                        <span class="gender">Autres</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="label">
                    <input type="checkbox" name="condutil" value="1" id="condutil" required> J'accepte les conditions d'utilisation
                </label>
            </div>
            <div>
                <label class="label">
                    <input type="checkbox" name="offrepub" value="1" id="ouipub"> Je souhaite recevoir des offres promotionelles et des bonus offerts
                </label>
            </div>

            <div class="button">
                <input type="submit">
            </div>
        </form>
    </div>
    

    <!-- Fin formulaire -->

</body>

</html>
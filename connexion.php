
<?php 
session_start();


require ("connexionBd.php");
require("maildansbd.php");
/*print_r($_POST); */
$msg=null;

if ((!empty($_POST['email']) 
    && (!empty($_POST['mdp']) 
    && (MaildansBase($_POST['email'])==true))))
    {
        
        $sqlreqid=$connexion->prepare('SELECT mdp_user FROM user WHERE mail_user LIKE :mail');
        $sqlreqid->bindParam(':mail', $_POST['email']);
        $sqlreqid->execute();
        $res=$sqlreqid->fetchAll(PDO::FETCH_ASSOC);
        $mdp=null;
        
        /* $res[0]['mdp_user']);   mdp de l'email */
        if ($_POST['mdp']==($res[0]['mdp_user']) )
        {
            $_SESSION['connecte']="Vous êtes connecté";
            header("Location:index.php");
        }
    }
else
    {
        $msg= "Veuillez réessayer avec de nouveaux identifiants";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <title>Document</title>
</head>
<body>
<?php require("header.php"); ?>
<?php echo $msg; ?>
<!-- Formulaire de connexion 
<form action="connexion.php" method="post">
<p>
    <label>email :</label>
    <input type="text" name="email" />
</p>
<p>
    <label>password :</label>
    <input type="password" name="mdp"/>
</p>
<p><input type="submit" name="send" value="envoyer"></p>

-->
<!-- Fin de formulaire de connexion 
<p>Inscrit toi <a  href="inscription.php">ici</a></p>  

Connexion avec  identifiants -------------------------------------- -->


<div class="box">
    <div class="title">Connexion</div>
    <form action="connexion.php" method="post">
        <div class="userid">
            <input type="text" placeholder="Votre Email..." name="email" required>
        </div>
        <div class="mdp">
            <input type="password" placeholder="Votre mot de passe..." name="mdp" required>
        </div>
        <div class="buttonid">
            <input type="submit" value="Je me connecte" name="send">
        </div>
        <a  href="inscription.php">Inscription</a>
        <a href="forgotmdp.html">Mot de passe oublié?</a>
    </form>
</div>



</body>
</html>
<?php 


$sqlreqmail=NULL;
$res=NULL;


function MaildansBase($mail){

    global $connexion;
    $sqlreqmail=$connexion->prepare('SELECT id_user FROM user WHERE mail_user LIKE :mail');
    $sqlreqmail->bindParam(':mail', $mail);
    $sqlreqmail->execute();
    $res=$sqlreqmail->fetchAll(PDO::FETCH_ASSOC);
    

    if (!empty($res))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}


?>
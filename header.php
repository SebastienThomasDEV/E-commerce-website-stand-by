<?php
$connexionstatus="Connexion";
$page_connexion="connexion.php";

if (!empty($_SESSION['connecte']))
{
    printf($_SESSION['connecte']);
    $connexionstatus="Deconnexion";
    $page_connexion="deconnexion.php";
    
}

?>

<div class="header">
    <nav>
        <!-- <img src="image/menu.png" class="menu" > -->
        <a href="index.php"><img src="image/nanotechnology.png" class="logo"></a>
        <span><a href="index.php">Techlottery</a></span>


        <ul>
            <!-- <li><img src="image/menu.png" class="menu" ></li>-->
            <li><a href="loterie.php">Gagner des cadeaux</a></li>
            <li><a href="ticket.php">Gagner des tickets</a></li>
            <li><a href="<?=$page_connexion?>"><?=$connexionstatus?></a></li>
        </ul>
    </nav>
</div>
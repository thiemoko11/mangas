<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imag" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="images/naruto.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title><?=$titre?></title>
</head>

<body>
          
 
    <nav class="navbar">
        <div class="navbar-toggle" id="js-navbar-toggle">
            
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
             
        </div>
        <ul id="js-menu" class="menu">
            <li><a href="index.php"><i class="fa-solid fa-house"></i>Accueil</a></li>
            <li><a href="liste-anime.php"><i class="fa-regular fa-circle-down"></i>Animee</a></li>
            <li><a href="membre.php"><i class="fa-solid fa-person-circle-question"></i>Membre</a></li>
            <li><a href="recherche-avancee.php"><i class="fa-solid fa-user"></i>recherche</a></li>
            <li><a href="Contact.php"><i class="fa-solid fa-address-book"></i>Contact</a></li>
            <div id="recherche-rapide">
            <form action="traitement-recherche-rapide.php" method="get">
            <input type="text" name="mot" id="recherche" placeholder="recherche">
            <input type="submit" value="OK">
            </form>
        </div>
         </ul>
        
    </nav>
    
</body>
</html>



<?php
include 'accesseurs/BaseDeDonnees.php';
$basededonnees = BaseDeDonnees::getConnexion();
#include "BaseDeDonnees.php";
$MESSAGE_SQL_LISTE_anime = "SELECT id, titre, resume, episode,realisateur, illustration from anime";

$requeteListeAnime = $basededonnees->prepare($MESSAGE_SQL_LISTE_anime);
$requeteListeAnime->execute();
$listeAnime = $requeteListeAnime->fetchAll();

        foreach($listeAnime as $anime) {
            ?>
            <div class="anime" style="width: 50rem;">
            
                <div class= "images"> <img src="images/<?=$anime['illustration']?>" alt="illustration"></div>
                
                <h3 class="titre"><?=$anime['titre']?></h3>
                
                <h6 class="episode">EPISODE : <?=$anime['episode']?></h6>
                
            <span class="realisateur">REALISATEUR : <?=$anime['realisateur']?></span>
            
        </div>
        <?php
        }
    ?>

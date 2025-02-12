<?php

require "configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";
#require_once __DIR__ . "/accesseurs/clicDAO.php";
require CHEMIN_ACCESSEUR . "clicDAO.php";
$listeAnime = AnimeDao::listerAnimes();

clicDAO::enregisterVisite($_SERVER);




$titre = "Liste des animés";

require "header.php";
?>

<div class="hauteur ">
    <h1 class="text-center">ANIMÉ</h1>
    <br>
    <h2 class="text-center">LISTE DES ANIMÉS</h2>

    <div id="liste-animés">
        <?php
        foreach($listeAnime as $anime) {
            ?>
            <div class="anime" >

                <div class= "images"> <img src="images/<?=$anime['illustration']?>" alt="illustration"></div>

                <h3 class="titre"><?=$anime['titre']?></h3>
                <p class="resume"><?=$anime['resume']?></p>
                <h6 class="episode">EPISODE : <?=$anime['episode']?></h6>
            <span class="realisateur">REALISATEUR : <?=$anime['realisateur']?></span>
            <a href="anime.php?tiktok=<?=$anime['id']?>" class="boutn">En savoir plus </a>
        </div>
        <?php
        }
    ?>
    </div>
    </div>
    <?php
    include "footer.php"
    ?>

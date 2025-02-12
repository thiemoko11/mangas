<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";
require CHEMIN_ACCESSEUR . "clicDAO.php";


clicDAO::enregisterVisite($_SERVER);

$idAnime = filter_var($_GET['tiktok'], FILTER_SANITIZE_NUMBER_INT);

$anime = AnimeDao::lireAnime($idAnime);



$titre = $anime['titre'];
require "header.php";
?>

<h1 class="text-center">ANIMÉE <?=$anime['titre']?></h1>

<section id="contenu">
    <div class="anime">
        <div class="images"><img src="images/<?=$anime['illustration']?>" alt="illustration"></div>
        <h3 class="titre">Titre : <a href="liste-anime.php?TIK-TOK=<?=$anime['id']?> "><?=$anime['titre']?> </a></h3>
        <span class="realisateur">Réalisateur : <?=$anime['realisateur']?></span>
        <h5 class="episode">Épisode : <?=$anime['episode']?> </h5>
        <p class="resume">Resumé : <?=$anime['resume']?></p>
        <p class="description">Description : <?=$anime['description']?></p>  

        </div>
</section>

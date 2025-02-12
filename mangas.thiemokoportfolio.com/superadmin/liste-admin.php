<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR ."AnimeDao.php";
$listeAnime = AnimeDao::listerAnimes();


$titre = "Liste des animés";

require "header.php";
?>

<div class="hauteur text-center">
    <h1 >ANIMÉ</h1>
    <br>
    <h2>LISTE DES ANIMÉS</h2>
    <div id="liste-animés">
    <a href="ajouter-anime.php"  class="btn btn-success" class="bouton">AJOUTER</a>
    <br>
        <?php
        foreach($listeAnime as $anime) {
            ?>
            <div class="anime" style="width: 50rem;">
            
                <div class= "images"> <img src="../images/<?=$anime['illustration']?>" alt="illustration"></div>
                
                <h3 class="titre"><?=$anime['titre']?></h3>
                
                <h6 class="episode">EPISODE : <?=$anime['episode']?></h6>
                
            <span class="realisateur">REALISATEUR : <?=$anime['realisateur']?></span>
            <br>
            
            <br>
            <a href="modifier-anime.php?tiktok=<?=$anime['id']?>"  class="btn btn-danger btn-sm" class="boutn">modifier </a>
            <br>
            <form action="traitement-supprimer-anime.php" method="post">
                <input type="hidden" name="tiktok" value="<?=$anime['id']?>">
                <input type="submit" value="supprimer" class="btn btn-primary" onclick="return confirm('vous êtes sur de supprimer ? ')">
          
            </form>

        </div>
        <?php
        }
    ?>
    </div>
    </div>
    <?php
    include "../footer.php"
    ?>

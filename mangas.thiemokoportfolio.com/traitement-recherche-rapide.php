<?php
$resultats = [];
if (!empty($_GET['mot'])){
    $mot =filter_var($_GET['mot'], FILTER_SANITIZE_SPECIAL_CHARS);
    include "configuration.php";

    $resultats = AnimeDao::rechercheRapide($mot);
}


$titre = "Résultat de recherche";

require "header.php";
?>

<div class="hauteur">
    <h1>Animé</h1>
    <h2>Résultat de recherche</h2>
    <div id="Résultats-recherche">
        <?php
        foreach($resultats as $resultat) {
            ?>
            <div class="anime">
                <div class= "images"> <img src="images/<?=$resultat['illustration']?>">
            </div>

            <h3 class="titre"><?=$resultat['titre']?></h3>
            <p class="resume"><?=$resultat['resume']?></p>
            <span class="realisateur"><?=$resultat['realisateur']?></span>
            <a href="anime.php?tiktok=<?=$resultat['id']?>" class="boutn">En savoir plus </a>

            </div>
            <?php
        }
    ?>
    </div>
    </div>
    <?php
    include "footer.php"
    ?>

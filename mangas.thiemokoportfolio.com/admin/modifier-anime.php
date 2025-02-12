<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";

$noAnime = filter_var($_GET['tiktok'], FILTER_SANITIZE_SPECIAL_CHARS);

$anime = AnimeDao::lireAnime($noAnime);



$titre = "panneau d'administration";
require "header.php";
?>
<div class="hauteurs">
    <h1 class="text-center">ANIME</h1>
    <h2 class="text-center">Modifier</h2>

    <div id="liste-anime "></div>
<form action="traitement-modifier-anime.php" method="post" enctype="multipart/form-data">

    <div class="champs">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="<?=$anime['titre']?>">
    </div>

    <div class="champs">
        <label for="resume">Resumé</label>
        <textarea name="resume" id="resume" cols="30" rows="10"><?=$anime['resume']?></textarea>
        
    </div>

    <div class="champs">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"><?=$anime['description']?></textarea>

        
    </div>

    <div class="champs">
        <label for="realisateur">Realisateur</label>
        <input type="text" name="realisateur" id="realisateur" value="<?=$anime['realisateur']?>">
    </div>

    <div class="champs">
    <label for="illustration">Illustration</label>
    <?php if (!empty($anime['illustration'])): ?>
        <div>
            <img src="<?= htmlspecialchars($anime['illustration']); ?>" alt="Illustration actuelle" style="max-width: 100px; max-height: 100px;">
        </div>
    <?php endif; ?>
    <input type="file" name="illustration" id="illustration">
</div>

    <input type="submit" value="Modifier">
    <input type="hidden" name="id" value="<?=$anime['id']?>">
</form>


</div>
<?php
require "../footer.php";

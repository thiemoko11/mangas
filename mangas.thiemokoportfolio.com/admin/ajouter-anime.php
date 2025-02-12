<?php

$titre = "panneau d'administration";
require "header.php";

?>

<div class="hauteurs">
    <h1 class="text-center">ANIME</h1>
    <h2 class="text-center">AJOUTER UN ANIME</h2>

    <div id="liste-anime "></div>
<form action="traitement-ajouter-anime.php" method="post" enctype="multipart/form-data">
    <div class="champs">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre">
    </div>

    <div class="champs">
        <label for="resume">Resumé</label>
        <input type="text" name="resume" id="resume">
    </div>

    <div class="champs">
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
    </div>

    <div class="champs">
        <label for="realisateur">Realisateur</label>
        <input type="text" name="realisateur" id="realisateur">
    </div>

    <div class="champs">
        <label for="episode">Épisde</label>
        <input type="text" name="episode" id="episode">
    </div>

    <div class="champs">
        <label for="image">Image : </label>
        <input type="file" name="illustration" id="illustration">
    </div>
    <input type="submit" value="enregistrer">
</form>


</div>
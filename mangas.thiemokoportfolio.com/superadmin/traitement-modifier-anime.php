<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDAO.php";


$titre = "traitement modifier";

require "header.php";

$anime = $_FILES['illustration']['name'];
$FILTRE_ANIME = array(
    'id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'titre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'resume' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'realisateur' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'illustration' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
);

$anime = filter_input_array(INPUT_POST, $FILTRE_ANIME);

$id = filter_var($_POST['id']); 
$titre = addslashes($_POST['titre']);
$resume = addslashes($_POST['resume']);
$description = addslashes($_POST['description']);
$realisateur = addslashes($_POST['realisateur']);
$illustration ['illustration'] = $anime;



$requeteModification = AnimeDao::modifierAnimes($anime);


if($requeteModification){
    ?>
    <p>votre anime a été Modifier</p>
    <?php
}else {
    echo "votre modification à échoué";
}
require "../footer.php";
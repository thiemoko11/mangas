<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";

$titre = "traitement ajouter";

require "header.php";

$illustration = $_FILES['illustration']['name'];


$FILTRE_ANIME = array(
    'id' => FILTER_SANITIZE_NUMBER_INT ,
    'titre' => FILTER_SANITIZE_SPECIAL_CHARS ,
    'resume' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    'realisateur' => FILTER_SANITIZE_SPECIAL_CHARS,
   
);

$anime = filter_input_array(INPUT_POST, $FILTRE_ANIME);


$titre = $_POST['titre'];
$resume = $_POST['resume'];
$description = $_POST['description'];
$realisateur = $_POST['realisateur'];
$anime['illustration'] = $illustration;


$repertoireIllustration = "../images/";

$fichierDestination = $repertoireIllustration . basename($_FILES['illustration']['name']);
$fichierSource = $_FILES['illustration']['tmp_name'];
$extensionFichier = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

if ($_FILES['illustration']['size'] > 5000000) {
    echo ("l'image est trop vollumineuse");

}else if ($extensionFichier != "jpg"  && $extensionFichier != "png" && $extensionFichier != "svg"){
    echo ("vieullez ajouter un format d'image valide.");

}else{

if (move_uploaded_file($fichierSource, $fichierDestination)) {
$requeteAjout = AnimeDao::ajouterAnime($anime);


if($requeteAjout) {
    ?>
    <p>votre anime a ete ajouter</p>
    <?php

}
}
else {
    echo "votre envoi a échoué";
}
}
require "../footer.php";
?>
<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";

$titre = "traitement modifier";
require "header.php";

// Vérifier si un fichier illustration a été envoyé
if (isset($_FILES['illustration']) && $_FILES['illustration']['error'] == 0) {
    // Sanitize le nom du fichier pour éviter les attaques de type directory traversal
    $nomIllustration = basename($_FILES['illustration']['name']);
    $cheminIllustration = "/var/www/mangas.thiemokoportfolio.com/images/" . $nomIllustration;

    // Déplacer l'illustration dans le dossier approprié
    if (move_uploaded_file($_FILES['illustration']['tmp_name'], $cheminIllustration)) {
        echo "<p>L'illustration a été téléchargée avec succès.</p>";
    } else {
        echo "<p>Erreur lors du téléchargement de l'illustration.</p>";
        $nomIllustration = null;
    }
} else {
    $nomIllustration = null; // Si aucun fichier n'a été envoyé, on laisse null
}

// Filtrage des données POST
$FILTRE_ANIME = array(
    'id' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'titre' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'resume' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'realisateur' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
);

$anime = filter_input_array(INPUT_POST, $FILTRE_ANIME);

// Vérification que toutes les valeurs nécessaires existent
if (!$anime || empty($anime['id']) || empty($anime['titre'])) {
    echo "Erreur : Informations incomplètes pour la modification.";
    exit;
}

// Ajout de l'illustration si elle existe
if ($nomIllustration) {
    $anime['illustration'] = $nomIllustration;
} else {
    // Si l'illustration n'est pas modifiée, on garde celle existante dans la base de données
    // Tu peux récupérer l'illustration existante en fonction de l'id de l'anime
    // Exemple : $anime['illustration'] = $ancienneIllustration;
}

// Exécution de la requête de modification
$requeteModification = AnimeDao::modifierAnimes($anime);

if ($requeteModification) {
    echo "<p>Votre anime a été modifié</p>";
    // Rediriger vers une autre page après la modification pour éviter une nouvelle soumission du formulaire
    //header("Location: modifier-anime.php?tiktok=" . $anime['id']);
    exit();
} else {
    echo "<p>Votre modification a échoué</p>";
}

require "../footer.php";

?>

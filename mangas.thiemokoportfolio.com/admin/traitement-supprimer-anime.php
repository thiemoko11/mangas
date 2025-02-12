<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";


$titre = "traitement supprimer";





$id = filter_var($_POST['tiktok'], FILTER_SANITIZE_SPECIAL_CHARS);

$reussiteSuppression = AnimeDao::supprimerAnime($id);

if($reussiteSuppression){
    ?>
    <p>votre anime a été supprimer</p>
    <?php
}else {
    echo "votre suppression à échoué";
}
require "../footer.php";




























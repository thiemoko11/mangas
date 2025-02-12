<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";


$titre = "Membre";
require "header.php";
?>

<div class="autre">
<?php
if (empty($_SESSION['membre']['pseudonyme'])){
include_once "membre/formulaire-membre.php";
echo '<div><a href="membre/inscription-identification.php" class="bouton"> creer un compte</a>
</div>';

}else {
$membre = MembreDAO::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);
include_once "membre/vue-membre-detail.php";
echo '<div><a href="membre/deconnexion.php" class="bouton"> se deconnecter</a>
</div>';
echo '<div><a href="membre/modifier-compte.php" class="bouton"> modifier le compte</a>
</div>';
}
?>
</div>
<?php
require "footer.php";

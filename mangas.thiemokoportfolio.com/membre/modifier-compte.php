<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";



$titre = "Modification compte";
require "header.php";
$membre = MembreDAO::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);

?>

<div class="hauteur">
    <h2> Mon compte </h2>
    <?php if (!empty($_SESSION['erreur'])){
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        }
?>

<form action="traitement-modifier-compte.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Securité</legend>

    <div><label for="ancienMdp"> mot de passe actuel :</label>
    <input type="password" name="ancienMdp" id="ancienMdp">
    <span class="erreur">
    <?php if (!empty($_SESSION['erreur'])){
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        }
        ?>
    </span>
</div>

<div>
    <label for="motdepasse">le Nouveau mot de passe:</label>
    <input type="password" name="motdepasse" id="motdepasse">
</div>

<div>
    <label for="motdepasse2">confirmer le Nouveau mot de passe:</label>
    <input type="password" name="motdepasse2" id="motdepasse2">
    <span id="erreur">
    <?php if (!empty($_SESSION['erreur2'])){
            echo $_SESSION['erreur2'];
            unset($_SESSION['erreur2']);
        }
        ?>
    </span>
</div>

<input type="submit" name="modification-securite" value="sauvegarde les changements">

</fieldset>


</form>

</div>
<div class="hauteur1">
<form action="traitement-modifier-compte.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Securité courriel</legend>

<div>
    <label for="courriel">le Nouveau courriel:</label>
    <input type="email" name="courriel" id="courriel">
</div>

<div>
    <label for="courriel2">confirmer le Nouveau courriel:</label>
    <input type="email" name="courriel2" id="courriel2">
    <span id="erreur">
    <?php if (!empty($_SESSION['erreur4'])){
            echo $_SESSION['erreur4'];
            unset($_SESSION['erreur4']);
        }
        ?>
    </span>
</div>

<input type="submit" name="modification-courriel" value="sauvegarde les changements">
<input type="hidden" name="pseudonyme" value="<?=$membre['pseudonyme']?>">

</fieldset>


</form>

</div>

<div class="hauteur2">
<form action="traitement-modifier-compte.php" method="post" enctype="multipart/form-data">
<fieldset>
    <legend>Securité avatar</legend>

<div><label for="avatar"> avatar :</label>
    <input type="file" name="avatar" id="avatar">
    <span class="erreur">
    <?php if (!empty($_SESSION['erreur5'])){
            echo $_SESSION['erreur5'];
            unset($_SESSION['erreur5']);
        }
        ?>
    </span>
    </div>


<input type="submit" name="modification-avatar" value="sauvegarde les changements">
<input type="hidden" name="pseudonyme" value="<?=$membre['pseudonyme']?>">

</fieldset>


</form>

</div>
<?php


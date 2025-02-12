<?php

require "../configuration.php";
$titre = "information";
require "header.php";

if (isset($_POST['inscription-identification']) && !empty($_POST['inscription-identification'])){
    $filtreMembre = array(
        'prenom'=> FILTER_SANITIZE_SPECIAL_CHARS,
        'nom'=> FILTER_SANITIZE_SPECIAL_CHARS,
        'courriel'=> FILTER_SANITIZE_EMAIL,
    );
    $_SESSION['membre'] = filter_var_array($_POST, $filtreMembre);

    if (empty($_POST['prenom'])|| empty($_POST['nom'])){
        $_SESSION['erreur3'] = "veuillez renseigner tous les champs";
        header('location: inscription-identification.php');
    
    }else if  (empty($_POST['courriel'])|| !filter_var($_POST['courriel'],FILTER_VALIDATE_EMAIL)){
        $_SESSION['erreur3'] = "courriel invalide";
        header('location: inscription-identification.php');
    }

    else{
        require CHEMIN_ACCESSEUR . "MembreDAO.php";
        $membre = MembreDAO::touverCourriel($_POST['courriel']);

    if ($membre){
        $_SESSION['erreur3'] = "ce courriel est deja utilisé";
        header('location: inscription-identification.php');
    }

}
}

?>
<h2>inscription d'un membre - information(2/2)</h2>
<span id= "erreur">
<?php if (!empty($_SESSION['erreur2'])){
echo $_SESSION['erreur2'];
unset($_SESSION['erreur2']);
}

?>
</span>

<form action="traitement-inscription.php" method="post" enctype="multipart/form-data">
<div class="membre-form">

    <div>
        <label for="pseudonyme">pseudonyme:</label>
        <input type="text" name="pseudonyme" id="pseudonyme">
    </div>

    <div>
        <label for="motdepasse">  mot de passe:</label>
        <input type="password" name="motdepasse" id="motdepasse">
    </div>

    <div>
        <label for="motdepasse2">  confirmez votre mot de passe:</label>
        <input type="password" name="motdepasse2" id="motdepasse2">
    </div>
    <div>
        <label for="avatar">avatar : </label>
        <input type="file" name="avatar" id="avatar">
    </div>
    <span id= "erreur">
<?php if (!empty($_SESSION['erreur4'])){
echo $_SESSION['erreur4'];
unset($_SESSION['erreur4']);
}

?>
</span>

    <input type="submit" name="inscription-information" value="suivant">

</div>

</form>
<?php

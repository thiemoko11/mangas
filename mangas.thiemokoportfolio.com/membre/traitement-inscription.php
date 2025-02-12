<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

if (isset($_POST['inscription-information']) && !empty($_POST['inscription-information'])){
        $filtreMembre = array (

            'pseudonyme'=> FILTER_SANITIZE_SPECIAL_CHARS,
            'motdepasse'=> FILTER_SANITIZE_ENCODED,
            'motdepasse2'=> FILTER_SANITIZE_ENCODED,
            
            
        );

        $nouveauMembre = filter_input_array(INPUT_POST, $filtreMembre);

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']){
        $_SESSION['erreur4'] = "vos mot de passe doivent être identiques ";
        header('location: inscription-information.php');
    }

    if (empty($_POST['pseudonyme'])|| !preg_match('/^[A-Za-z0-9]+([A-Za-z0-9]*|[._-]?[A-Za-z0-9]+)*$/', $_POST['pseudonyme'])){
        $_SESSION['erreur2'] = "votre pseudo n'est pas valide ";
        header('location: inscription-information.php');

    } else{
        $membre = MembreDAO::lireMembreParPseudonyme($_POST['pseudonyme']);
    }
    if ($membre){
        $_SESSION['erreur4'] = "votre pseudo est deja utilisé ";
        header('location: inscription-information.php');
    }
}
if (empty($_SESSION['erreur4'])){
    $_SESSION['membre']['pseudonyme'] = $nouveauMembre['pseudonyme'];

    $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);


    $_SESSION['membre']['avatar'] = basename($_FILES['avatar']['name']);

    

   

    $reussiteInscription = MembreDAO::enregistrerMembre($_SESSION['membre']);

    if ($reussiteInscription){
        header('location: ../membre.php');
    }
}
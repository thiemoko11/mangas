<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";


if (isset($_POST['modification-securite'])&& !empty($_POST['modification-securite'])){
        $filtreMembre = array (

            'ancienMdp'=> FILTER_SANITIZE_ENCODED,
            'motdepasse'=> FILTER_SANITIZE_ENCODED, 
            'motdepasse2'=> FILTER_SANITIZE_ENCODED,     
        );

        $securite = filter_input_array(INPUT_POST, $filtreMembre);


    
    $membreTrouve = MembreDAO::trouverMembre($_SESSION['membre']);

    if (!password_verify($securite['ancienMdp'], $membreTrouve['motdepasse']))
    {
        $_SESSION['erreur'] = "mot de passe actuel invalide";
        header('location: modifier-compte.php');
    }

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']){
        $_SESSION['erreur2'] = "vos mot de passe doivent etre identiques ";
        header('location: modifier-compte.php');
        
    }

    if (empty($_SESSION['erreur2'])){


        $securite['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

        $requeteModifierMembre = MembreDAO::modifierSecurite($securite['motdepasse'],$_SESSION['membre']['pseudonyme']);
        header('location: ../membre.php');
    }

   
    
    
}

if (isset($_POST['modification-courriel'])&& !empty($_POST['modification-courriel'])){
    $filtreMembre = array (

        'courriel'=> FILTER_VALIDATE_EMAIL,
        'courriel2'=> FILTER_VALIDATE_EMAIL,
            
    );

    $securite = filter_input_array(INPUT_POST, $filtreMembre);

    if (empty($_POST['courriel']) || $_POST['courriel'] != $_POST['courriel2']){
        $_SESSION['erreur4'] = "vos courriel doivent etre identiques ";
        header('location: modifier-compte.php');
        
    }
    if (empty($_SESSION['erreur2'])){


        $requeteModifierMembre = MembreDAO::modifierCourriel($securite['courriel'],$_SESSION['membre']['pseudonyme']);
        header('location: ../membre.php');
    }
    
}




if (isset($_POST['modification-avatar'])&& !empty($_POST['modification-avatar'])){
   
$pseudo = filter_var($_POST['pseudonyme'],FILTER_SANITIZE_SPECIAL_CHARS );
$avatar = $_FILES['avatar']['name'];
$repertoireAvatar = "../images/";

$fichierDestination = $repertoireAvatar . basename($_FILES['avatar']['name']);
$fichierSource = $_FILES['avatar']['tmp_name'];
$extensionFichier = strtolower(pathinfo($fichierDestination, PATHINFO_EXTENSION));

if ($_FILES['avatar']['size'] > 5000000) {
    echo ("l'image est trop vollumineuse");

}else if ($extensionFichier != "jpg"  && $extensionFichier != "png" && $extensionFichier != "svg"){
    echo ("vieullez ajouter un format d'image valide.");
    

}else{

if (move_uploaded_file($fichierSource, $fichierDestination)) {
    
$requeteAjout = MembreDAO::modifierAvatar($avatar,$pseudo);



if($requeteAjout) {
     $_SESSION['membre']['avatar'] = $avatar;
    header('location: ../membre.php');
}
}
else {
    echo "votre envoi a échoué";
   
}
}
}


<?php
require "../configuration.php";

if (isset($_SESSION['membre']['pseudonyme'])){
    // on detruit les variables de la session
    session_unset();
    // on detruit la session 
    session_destroy();

    header('location: ../membre.php');
    exit();
}else{
    echo "vous netes pas connecté !";
}
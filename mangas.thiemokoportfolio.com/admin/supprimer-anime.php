<?php

$noAnime = $_GET['tiktok'];

$SOL_Anime = "SELECT * FROM `anime` WHERE id = " . $noAnime;

include "../basededonnees.php";


$SQL_SUPPRIMER_REQUEST = "Delete FROM anime WHERE id = . $noAnime ";
$requeteAnime = $basededonnees->prepare($SOL_Anime);
$anime = $requeteAnime->execute();



$titre = " configuration";
require "header.php";
?>

<?php
require"../footer.php";

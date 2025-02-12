<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

$titre = "Modification compte";
require "header.php";
?>

<h2>inscription d'un membre - identification(1/2)</h2>
<span class= "erreur">
<?php if (!empty($_SESSION['erreur3'])){
echo $_SESSION['erreur3'];
unset($_SESSION['erreur3']);
};
?>
</span>

<form action="inscription-information.php" method="post">
<div class= "membre-form">
    <div>
        <label for="prenom">prenom:</label>
        <input type="text" name="prenom" id="prenom">
</div>

<div>
    <label for="nom">nom:</label>
    <input type="text" name="nom" id="nom">
</div>
<div>
    <label for="courriel">courriel:</label>
    <input type="email" name="courriel" id="courriel">
</div>

<input type="submit" name="inscription-identification" value="suivant">


</div>


</form>

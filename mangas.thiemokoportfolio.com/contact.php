<?php

$titre = "Nous contacter";
require"header.php";
?>

<div id = "contact">
    <h1 class="text-center">Nous contacter</h1>
    <?php
    include"traitement-contact.php"
    ?>
    <fieldset class="fieldset" style="width: 50rem;" >
    <form  method="post">
        <input type="text" name="nom" class="champ" placeholder="votre nom">
        <input type="email" name="email" class="champ" placeholder="votre email">
        <textarea name="message" cols="30" rows="10" class="champ" placeholder="votre message"></textarea>
        <input type="submit"  name="valider"  value="envoyer votre message" class="bouton3">
</form>
</fieldset>
</div>
<?php

if (isset($_POST['valider'])){
    if ((empty($_POST['nom'])) || (empty($_POST['email'])) || (empty($_POST['message'])) ){
        echo "veuillez renseigner tous les champs";
    } else {
        $nom = $_POST['nom'];
        $email= $_POST['email'];
        $message= $_POST['message'];

        $entete = 'MIME-Version: 1.0' . "\r\n";
        $entete .= 'content-type: text/html; charset=utf-8'. "\r\n";
        $entete .= 'From: tiweb@cpanel.cgmatane.qc.ca' . "\r\n";
        $entete .= 'Reply-to: ' .$email;

        $message = '<h1>Message envoyé depuis la page contact </h1>
        <p><strong>Nom: </strong>' . $nom . '<br />
        <strong>Email: </strong>' . $email . '<br />
        <strong>Message: </strong>' . htmlspecialchars($message) . '</pr>';
        $retour = mail('thiemokokone2@yahoo.fr' , 'envoi depuis la page contact', $message, $entete);

        if ($retour){
            echo "<p>votre votre message a bien ete envoyé</p> ";
        
        }
    }

}
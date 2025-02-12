<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class MembreDAO
{
    public static function trouverMembre($membre) {
        $SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteMembre = BaseDeDonnees::getConnexion()->prepare($SQL_LIRE_MEMBRE);
        $requeteMembre->bindParam(':pseudonyme', $membre['pseudonyme'], PDO::PARAM_STR);
        $requeteMembre->execute();
        $membreTrouver = $requeteMembre->fetch();

        return $membreTrouver;

    }
    public static function lireMembreParPseudonyme($pseudonyme) {
        $SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteMembre = BaseDeDonnees::getConnexion()->prepare($SQL_LIRE_MEMBRE);
        $requeteMembre->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteMembre->execute();
        $membre = $requeteMembre->fetch();

        return $membre;

    }
    public static function modifierSecurite($nouveauMdp, $pseudo){
        $SQL_MODIFIER_MEMBRE = "UPDATE membre SET motdepasse = :motdepasse WHERE pseudonyme = :pseudonyme";
        $requeteModifierMembre = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':motdepasse', $nouveauMdp,PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':pseudonyme', $pseudo,PDO::PARAM_STR);
        $requeteModifierMembre->execute();
        return $requeteModifierMembre;
    }
    public static function modifierCourriel($courriel, $pseudo){
        $SQL_MODIFIER_MEMBRE = "UPDATE membre SET courriel = :courriel WHERE pseudonyme = :pseudonyme";
        $requeteModifierMembre = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_MEMBRE);
        $requeteModifierMembre->bindParam(':courriel', $courriel,PDO::PARAM_STR);
        $requeteModifierMembre->bindParam(':pseudonyme', $pseudo,PDO::PARAM_STR);
        $requeteModifierMembre->execute();
        return $requeteModifierMembre;
    }
    public static function touverCourriel($courriel){
         $TROUVER_COURRIEL = "SELECT *  FROM membre WHERE courriel = :courriel";
        $requete = BaseDeDonnees::getConnexion()->prepare($TROUVER_COURRIEL);
        $requete->bindParam(':courriel', $courriel,PDO::PARAM_STR);
        $requete->execute();
        $membre= $requete->fetch();

        return $membre;
    }
    public static function enregistrerMembre($nouveauMembre){
        $SQL_AJOUTER_MEMBRE = "INSERT INTO membre( prenom, nom, pseudonyme, motdepasse, courriel, avatar) VALUES (:prenom , :nom ,:pseudonyme ,:motdepasse,:courriel, :avatar)";
        $requeteAjouterMembre = BaseDeDonnees::getConnexion()->prepare($SQL_AJOUTER_MEMBRE);
        $requeteAjouterMembre->bindParam(':prenom', $nouveauMembre['prenom'],PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':nom', $nouveauMembre['nom'],PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':motdepasse', $nouveauMembre['motdepasse'],PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':pseudonyme', $nouveauMembre['pseudonyme'],PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':courriel', $nouveauMembre['courriel'] ,PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':avatar', $nouveauMembre['avatar'] ,PDO::PARAM_STR);
        $reussiteAjoutMembre       = $requeteAjouterMembre->execute();

        return $reussiteAjoutMembre;
    }
    public static function modifierAvatar($avatar, $pseudo)
    {
        $SQL_MODIFIER_MEMBRE = "UPDATE `membre` SET `avatar`= :avatar WHERE `pseudonyme` = :pseudo";

        $requeteModifierAnime = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_MEMBRE);
        
        $requeteModifierAnime->bindParam(':avatar', $avatar ,PDO::PARAM_STR);
        $requeteModifierAnime->bindParam(':pseudo', $pseudo ,PDO::PARAM_STR);

        $requeteModification = $requeteModifierAnime->execute();

        return  $requeteModification;
    }
}
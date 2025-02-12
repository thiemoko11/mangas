<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class ClicDAO {
    public static function enregisterVisite($donnees){
        $MESSAGE_ENREGISTRER_VISITE = "INSERT INTO clic(ip, page, parametres, langue, moment, reference) values (:ip, :page, :parametres, :langue, NOW(), :reference)";
        $_requeteVisite = BaseDeDonnees::getConnexion()->prepare($MESSAGE_ENREGISTRER_VISITE);
        $_requeteVisite->bindParam(':ip', $donnees["REMOTE_ADDR"], PDO::PARAM_STR);
        $_requeteVisite->bindParam(':page', $donnees["PHP_SELF"], PDO::PARAM_STR);
        $_requeteVisite->bindParam(':parametres', $donnees["QUERY_STRING"], PDO::PARAM_STR);
        $_requeteVisite->bindParam(':langue', $donnees["HTTP_ACCEPT_LANGUAGE"], PDO::PARAM_STR);
        $_requeteVisite->bindParam(':reference', $donnees["HTTP_REFERER"], PDO::PARAM_STR);
        $_requeteVisite->execute();
    }
    public static function listerStatsParJour()
    {
        $MESSAGE_STATS_PAR_JOUR = "SELECT DAYOFWEEK(moment) as jour, COUNT(id_clic) as clics, COUNT(DISTINCT ip) as visites FROM clic GROUP BY jour";
        $requeteStats = BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_PAR_JOUR);
        $requeteStats->execute();
        $statsParJour = $requeteStats->fetchAll();

        return $statsParJour;
    }
    public static function listerStatsParLangue()
    {
        $MESSAGE_STATS_PAR_LANGUE = "SELECT langue, COUNT(id_clic) as clics, COUNT(DISTINCT ip) as visites FROM clic GROUP BY langue ";
        $requeteStats = BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_PAR_LANGUE);
        $requeteStats->execute();
        $statsParLangue = $requeteStats->fetchAll();
        return $statsParLangue;



    }
}

<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class AnimeDao{
    public static function listerAnimes()
    {
        $MESSAGE_SQL_LISTE_anime = "SELECT id, titre, resume, episode,realisateur, illustration from anime";

        $requeteListeAnime = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_anime);
        $requeteListeAnime->execute();
        $listeAnime = $requeteListeAnime->fetchAll();
        return $listeAnime;
    }
   public static function modifierAnimes($anime)
{
    // Enlever les guillemets autour des paramètres
    $SQL_MODIFIER_ANIME = "UPDATE `anime` SET `titre` = :titre, `description` = :description, `realisateur` = :realisateur, `resume` = :resume, `illustration` = :illustration WHERE id = :id";

    // Préparer la requête
    $requeteModifierAnime = BaseDeDonnees::getConnexion()->prepare($SQL_MODIFIER_ANIME);

    // Lier les paramètres à la requête préparée
    $requeteModifierAnime->bindParam(':titre', $anime['titre'], PDO::PARAM_STR);
    $requeteModifierAnime->bindParam(':resume', $anime['resume'], PDO::PARAM_STR);
    $requeteModifierAnime->bindParam(':description', $anime['description'], PDO::PARAM_STR);
    $requeteModifierAnime->bindParam(':realisateur', $anime['realisateur'], PDO::PARAM_STR);
    $requeteModifierAnime->bindParam(':illustration', $anime['illustration'], PDO::PARAM_STR);
    $requeteModifierAnime->bindParam(':id', $anime['id'], PDO::PARAM_INT);  // Assurer que l'ID est un entier

    // Exécuter la requête
    $requeteModification = $requeteModifierAnime->execute();

    // Retourner si la modification a réussi
    return $requeteModification;
}

    public static function lireAnime($idAnime)
    {
        $MESSAGE_SOL_Anime = "SELECT * FROM `anime` WHERE id =  :idAnime";
        $requeteAnime = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SOL_Anime);
        $requeteAnime->bindParam(':idAnime', $idAnime, PDO::PARAM_INT);
        $requeteAnime->execute();
        $anime = $requeteAnime->fetch();
        return $anime;
    }
    public static function ajouterAnime($anime){
        $SQL_AJOUTER_ANIME = "INSERT INTO `anime`( `titre`, `resume`, `description`, `realisateur`,`illustration`) VALUES (:titre , :resume ,:description ,:realisateur,:illustration)";
        $requeteAjouterAnime = BaseDeDonnees::getConnexion()->prepare($SQL_AJOUTER_ANIME);
        $requeteAjouterAnime->bindParam(':titre', $anime['titre'],PDO::PARAM_STR);
        $requeteAjouterAnime->bindParam(':resume', $anime['resume'],PDO::PARAM_STR);
        $requeteAjouterAnime->bindParam(':description', $anime['description'],PDO::PARAM_STR);
        $requeteAjouterAnime->bindParam(':realisateur', $anime['realisateur'],PDO::PARAM_STR);
        $requeteAjouterAnime->bindParam(':illustration', $anime['illustration'] ,PDO::PARAM_STR);
        $requeteAjout       = $requeteAjouterAnime->execute();
        return $requeteAjout;
    }
    public static function supprimerAnime($id){
    $SQL_SUPPRIMER_ANIME = "DELETE FROM `anime` WHERE id= :id";
    $requeteSupprimerAnime = BaseDeDonnees::getConnexion()->prepare($SQL_SUPPRIMER_ANIME);
    $requeteSupprimerAnime->bindParam(':id', $id, PDO::PARAM_INT);
    $reussiteSuppression = $requeteSupprimerAnime->execute();
    return $reussiteSuppression;
    }
    public static function rechercheRapide($mot){
        $SQL_RECHERCHE_RAPIDE = "SELECT * FROM `anime` WHERE `titre` LIKE '%:mot%' OR resume LIKE '%:mot%'";
    
        $requetRechercheRapide = BaseDeDonnees::getConnexion()->prepare($SQL_RECHERCHE_RAPIDE);
        $requetRechercheRapide->bindParam(':mot', $mot, PDO::PARAM_STR);
        $requetRechercheRapide->execute();
        $resultats = $requetRechercheRapide->fetchAll();
        return $resultats;
        }
        public static function rechercheAvance($recherche){
            
        $SQL_RECHERCHE_AVANCEE ="SELECT * FROM anime WHERE 1 = 1";

        if(!empty($recherche)){
            $SQL_RECHERCHE_AVANCEE .= " AND titre LIKE '%:titreRecherche%'";
        }
        if(!empty($recherche)){
            $SQL_RECHERCHE_AVANCEE .= " AND resume LIKE '%:contenuRecherche%'";
        }
        if(!empty($recherche)){
            $SQL_RECHERCHE_AVANCEE .= " AND realisateur LIKE '%:realisateurRecherche%'";
        }
        if(!empty($recherche)){
            $SQL_RECHERCHE_AVANCEE .= " AND description LIKE '%:descriptionRecherche%'";
        }

        $realisateurRecherche = BaseDeDonnees::getConnexion()->prepare($SQL_RECHERCHE_AVANCEE);
        if(!empty($recherche)){
            $realisateurRecherche->bindParam(':titreRecherche', $titreRecherche, PDO::PARAM_STR);
        }
        if(!empty($recherche)){
            $realisateurRecherche->bindParam(':contenuRecherche', $contenuRecherche, PDO::PARAM_STR);
        }
        if(!empty($recherche)){            
            $realisateurRecherche->bindParam(':realisateurRecherche', $realisateurRecherche, PDO::PARAM_STR);
        }
        if(!empty($recherche)){
            $realisateurRecherche->bindParam(':descriptionRecherche', $descriptionRecherche, PDO::PARAM_STR);
        }
        $realisateurRecherche->execute();
        $resultats = $realisateurRecherche->fetchAll();
        return $resultats;
        }
    public static function listerCategories()
    {
        $MESSAGE_LISTER_CATEGORIES = "SELECT categorie, COUNT(*) as nombre, AVG(duree) as duree_moyenne, SUM(duree) as minutes_totales, Max(duree) as duree_maximum, MIN(duree) as duree_minimale FROM anime GROUP BY categorie";
        $requeteCategories = BaseDeDonnees::getConnexion()->prepare($MESSAGE_LISTER_CATEGORIES);
        $requeteCategories->execute();
        $catgories = $requeteCategories->fetchAll();
        return $catgories;
    }
    public static function calculerContenu(){

    
        $MESSAGE_CALCULER_CONTENU = "SELECT AVG(duree) as moyenne, STDDEV(duree) as ecart_type from anime";
        $requetePageContenu = BaseDeDonnees::getConnexion()->prepare($MESSAGE_CALCULER_CONTENU);
        $requetePageContenu->execute();
        $contenus = $requetePageContenu->fetchAll();
        return $contenus;
    }

}

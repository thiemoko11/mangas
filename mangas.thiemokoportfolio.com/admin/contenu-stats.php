<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "AnimeDao.php";
#require_once __DIR__ . '/../accesseurs/AnimeDao.php';
$listeCategories = AnimeDAo::listerCategories();
$calculContenu = AnimeDao::calculerContenu();

$titre = "Panneau d'administration";
require "header.php";
?>

<div class="liste-items">
<!-- <caption>Tableau statistiques des employés</caption> -->
    <table>
        <caption>Tableau statistiques des animés</caption>
        <tr>
            <th>Genre</th>
            <th>Nombre</th>
            <th>Minutes totales</th>
            <th>Duree maximun</th>
            <th>Duree minimal</th>
            <th>Duree moyennes</th>

        </tr>
        <?php
foreach ($listeCategories as $categorie) {
    ?>
            <tr>
                <td><?=$categorie['categorie']?></td>
                <td><?=$categorie['nombre']?></td>
                <td><?=$categorie['minutes_totales']?></td>
                <td><?=$categorie['duree_maximum']?></td>
                <td><?=$categorie['duree_minimale']?></td>
                <td><?=floor($categorie['duree_moyenne'])?></td>

            </tr>
            <?php
}
?>
    </table>
    <div class="chart-container "style="width: 30rem;">
        <canvas id="pieChart style="></canvas>
    </div>
    
</div>
<!-- tableau ecart type -->
<div class="liste">
<table>
        <caption>Tableau statistiques ecart-type</caption>
        <tr>
            <th>duree moyenne des animés</th>
            <th>écart type</th>
            
        </tr>
        <?php
foreach ($calculContenu as $contenu) {
    ?>
            <tr>
                <td><?=floor($contenu['moyenne']) . "minutes"?></td>
                <td><?=round($contenu['ecart_type'], 2)?></td>

            </tr>
            <?php
}
?>
    </table>
    <div class="chart-container "style="width: 30rem;">
        <canvas id="pieChart"></canvas>
    </div>
    
</div>
<script>
        <?php
$listeDeCategorie = [];
foreach ($listeCategories as $categorie) {
    $listeDeCategorie[] = $categorie['categorie'];
    $categorieParNombre[] = $categorie['nombre'];
    
}
?>
let labelLine = <?=json_encode($listeDeCategorie)?>;
let dataLine = <?=json_encode($categorieParNombre)?>;

</script>

<script src="js/script-stats.js"></script>
<?php
require "../footer.php";

<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "clicDAO.php";

$listeParJour = clicDAO::listerStatsParJour();
$joursDeLaSemaine = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");

?>

<div class="chart-container">
<canvas id="lineChart"></canvas>
</div>
<script>
        <?php
$listeDeJour = [];
$nombreDeJour = [];
foreach ($listeParJour as $jour) {
    $listeDeJour[] = $joursDeLaSemaine[$jour['jour'] - 1];
    $nombreParJour[] = $jour['visites'];
}
?>
let labelLine = <?=json_encode($listeDeJour)?>;
let dataLine = <?=json_encode($nombreParJour)?>;

    </script>

<script src="js/script-visites.js"></script>

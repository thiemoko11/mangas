<?php

?>

    <div class="chart-container">
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

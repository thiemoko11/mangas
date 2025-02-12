<?php
$titre = "recherche-avancée";
require "header.php";


?>


<div class="hauteur">
    
    <h1 class="text-center">ANIMÉS </h1>
    <fieldset class="fieldset" style="width: 50rem;" >
        <section id="contenu">
            <h2 class="text-center">RECHERCHE AVANCÉE</h2>
            <div id="recherche-avancee" >
                <form action="traitement-recherche-avancee.php" methode="get">

                    <div>
                        <label for="recherche-titre">titre</label>
                        <input type="text" name="recherche-titre" id="recherche-titre">
                    </div>

                    <div>
                        <label for="recherche-contenu">contenu</label>
                        <input type="text" name="recherche-contenu" id="recherche-contenu">
                    </div>

                    <div>
                        <label for="recherche-realisateur">realisateur</label>
                        <input type="text" name="recherche-realisateur" id="recherche-realisateur">
                    </div>

                    <div>
                        <label for="recherche-episode">episode</label>
                        <input type="text" name="recherche-episode" id="recherche-episode">
                    </div>

                    <input type="submit" name="value" id="recherche">   
                </form>
            </div>
        </section>
    </fieldset>
    
</div>



<?php
require "header.php";

?>


<div>
    <h1 class="container text-center col mb-3 text-warning "> Dashboard</h1>
            <br>

        <div class="row row-cols-1 row-cols-md-2  row-cols-lg-3">
            <div class="col mb-3">
                <div class="card h-100">
            
                            
                    <div class="card-body">
                        
                        <a class="btn btn-success btn-block" href="visite-stats.php">visite-stats</a>
                        <?php
                        include_once "visites1.php";
                        ?>
                            
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                   
                    <div class="card-body">
                        <h5 class="card-title">liste</h5>
                        <img class="img" src="../images/liste.png"> 
                            <a class="btn btn-success btn-block" href="liste-admin.php">liste-admin</a>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                
                    <div class="card-body">
                        <h5 class="card-title">visite-stats</h5>
                        <?php
                        include_once "visites3.php";
                        ?>
                        <a class="btn btn-success btn-block" href="visite-stats.php">visite-stats</a>
                    </div>
                </div>
            </div>

            
            <div class="col mb-3">
                <div class="card h-100">
                    
                    <div class="card-body">
                        <h5 class="card-titlecard-text">contenu</h5>
                        <div class= "liste-item">
                        <?php
                        include_once "contenu1.php";
                        ?>
                          <a class="btn btn-success btn-block" href="contenu-stats.php">Contenu</a>
                    </div>
                </div>
            </div>
        </div>
            <div class="col mb-3">
                <div class="card h-100">
                   
                    <div class="card-body">
                        <h5 class="card-title">PROJET5</h5>
                        <?php
                        include_once "visites4.php";
                        ?>
       
                            <a class="btn btn-success btn-block" href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                     
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        

                        <div class= "images"> <img src="https://source.unsplash.com/random/900×700/?cat" alt="radom"></div>

                      
                            <a class="btn btn-success btn-block" href="https://source.unsplash.com/random/900×700/?cat">images</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



           
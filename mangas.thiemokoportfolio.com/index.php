<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imag" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="images/naruto.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
   <link rel="stylesheet" href="style/index.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.6.0/glide.min.js" integrity="sha512-2sI5N95oT62ughlApCe/8zL9bQAXKsPPtZZI2KE3dznuZ8HpE2gTMHYzyVN7OoSPJCM1k9ZkhcCo3FvOirIr2A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Mono&display=swap" rel="stylesheet">
   <script src="js/index.js" defer></script>
    <title><?=$titre?></title>
</head>
<body>
<nav class="navbar">            
        <div>
          <ul id="js-menu" class="menu">
              <li><a href="index.php"><i class="fa-solid fa-house"></i>Accueil</a></li>
              <li><a href="liste-anime.php"><i class="fa-regular fa-circle-down"></i>Animee</a></li>
              <li><a href="membre.php"><i class="fa-solid fa-person-circle-question"></i>membre</a></li>
              <li><a href="recherche-avancee.php"><i class="fa-solid fa-user"></i>recherche</a></li>
              <li><a href="contact.php"><i class="fa-solid fa-address-book"></i>Contact</a></li>
              
              <form  class="h-25 d-inline-block" style="width: 100%;" action="traitement-recherche-rapide.php" method="get">
              <input type="text" name="mot" id="recherche" placeholder="recherche">
              <input type="submit" value="OK">
              </form>
          </ul>
      </div>     
  </nav>
<h1><span class="badge bg-secondary">ANIME</span></h1>
</body>

<div class="conteneur-carrousel" style="width: 50rem;">
        <div class="conteneur-images">
          <img src="images/anime1.jpg" alt="img1" class="actif">
          <img src="images/anime5.png" alt="img2">
          <img src="images/anime7.jpg" alt="img3">
          <img src="images/assassin.jpg" alt="img4">
        </div>
        <div class="commandes">
          <button class="gauche">
            <img src="images/left.svg" alt="image4">
          </button>
          <button class="droite">
            <img src="images/right.svg" alt="image5">
          </button>
        </div>
        <div class="cercles">
          <button data-clic="1" class="cercle actif-cercle"></button>
          <button data-clic="2" class="cercle"></button>
          <button data-clic="3" class="cercle"></button>
          <button data-clic="4" class="cercle"></button>
        </div>
</div>
   
</html>

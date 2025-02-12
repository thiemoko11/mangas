
<h1>Veillez mettre vos Informations</h1>

<form action="membre/traitement-authentification.php" method="post">
<div class="membre-form">
    <div>
        <label for="pseudonyme">pseudonyme</label>
        <input type="text" name="pseudonyme" id= "pseudonyme">
    </div>
    <div>
        <label for="motdepasse">mot de passe</label>
        <input type="password" name="motdepasse" id= "motdepasse">
    </div>
    <input type="submit" name="membre-authentification" value="Me connecter">
    <span id= "erreur" >
        <?php if (!empty($_SESSION['erreur'])){
            echo $_SESSION['erreur'];
            unset($_SESSION['erreur']);
        }
        ?>
    </span>
</div>
</form>

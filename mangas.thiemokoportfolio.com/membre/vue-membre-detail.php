<fieldset class= "cadre">
<div id="boite-membre">
    <div id ="pseudonyme">
    <label>pseudonyme:</label>
    <span><?=$membre['pseudonyme']?></span>
</div>

<div id ="membre-courriel">
    <label>Courriel:</label>
    <span><?=$membre['courriel']?></span>
</div>

<div id ="membre-prenom">
    <label>Prenom:</label>
    <span><?=$membre['prenom']?></span>
</div>

<div id ="membre-nom">
    <label>nom:</label>
    <span><?=$membre['nom']?></span>
</div>
</div>
</fieldset>
<fieldset class="foto">
<div id ="membre-nom">
   <img src="membre/imagesAva/<?=$membre['avatar']?>" alt="image-avatar">
</div>
</fieldset>

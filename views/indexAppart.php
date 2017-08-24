<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/style.css" />

    <title>MFA.com</title>
</head>
<body>
   <h1><center> Bienvenue chez MonFuturAppart </center></h1>
<div id="un">
    <ul>
        <li><a href="Acceuil" > Acceuil </a></li>
        <li><a href="studio" > studio </a></li>
        <li><a href="f2" > Appartement F2 </a></li>
        <li><a href="f3" > Appartement F3 </a></li>
        <li><a href="appluxe" > Appartement de Luxe </a></li>
    </ul>
</div>

<form action="decoservice" method="post">

    <input type="submit" class="Envoyer" value="Se deconnecter">

</form>
<br>
<form action="newsujetservice" method="post">
<label for="categorie">Catégorie appartement :</label><br>
       <select name="categorie" id="categorie">
           <option value="studio">studio</option>
           <option value="Appartement F2">Appartement F2</option>
           <option value="Appartement F3">Appartement F3</option>
           <option value="Appartement de Luxe">Appartement de Luxe</option>
    </select><br><br>
    <label>Titre:</label><br/><input class="taille" type="text" name="titre" rows="200" cols="50"/><br/><br>
    <label>Description:</label><br/><textarea name="description" rows="10" cols="50"></textarea> <br>
    <input type="submit" value="Envoyer" />
</form>

<?php
$bdd= new bddmanager;
$appart=$bdd->getAllAppart();
$bdd->displayAppart($appart);

?>

</body>
</html>
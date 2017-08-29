<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/styles.css" />

    <title>MFA.com</title>
</head>
<body>
<?php

if( empty($_GET["message"])){

}
else{
    if($_GET["message"]==true){
       echo' <script> alert"Message envoyé"</script>';
    }
    else{
        echo' <script> alert"Message non envoyé"</script>';
    }
}


?>
<hr/>
       <h1><div class="allo"><center> MonFuturAppart </center><div></h1>
<hr/><br>
<div id="un">
    <ul>
        <li><a href="Acceuil" > Acceuil </a></li>
        <li><a href="studio" > studio </a></li>
        <li><a href="f2" > Appartement F2 </a></li>
        <li><a href="f3" > Appartement F3 </a></li>
        <li><a href="appluxe" > Appartement/Villa </a></li>
        <li><a href="profil" > Profil utilisateur</a></li>
    </ul>
</div>

<form action="decoservice" method="post"><br>

    <input type="submit" class="Envoyer" value="Se deconnecter" id="decobout">

</form>
<br>
<center>
<form action="newsujetservice" method="post">
<label for="categorie">Catégorie appartement :</label><br>
       <select name="categorie" id="categorie">
           <option value="studio">studio</option>
           <option value="Appartement F2">Appartement F2</option>
           <option value="Appartement F3">Appartement F3</option>
           <option value="Appartement de Luxe">Appartement de Luxe</option>
    </select><br><br>
    <label>Titre:</label><br/><input class="taille" type="text" name="titre"  placeholder="Entrez votre titre ici" rows="200" cols="50"/><br/><br>
    <label>Description:</label><br/><textarea name="description"  placeholder="Decrivez votre annonce... " rows="10" cols="50"></textarea> <br>
    <input type="submit" value="Envoyer" />
</form>
</center>


<?php
$bdd= new bddmanager;
$appart=$bdd->getAllAppart();
$bdd->displayAppart($appart);

?>

</body>
</html>
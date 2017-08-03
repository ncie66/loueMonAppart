<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="view/animate.css">
    <script type="text/javascript" src="view/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="view/easing.js"></script>
	<script type="text/javascript" src="view/jQuery.js"></script>
	<script type="text/javascript" src="view/scroll.js"></script>
    <title>Projet</title>
</head>
<body>

<header>
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#catégories">Catégories</a></li>
    </ul>
</header>
<br><br><br><br><br><br>

<hr/>
       <h1><div class="allo"><center> Bienvenue sur louepasmonappart ! </center><div></h1>
<hr/>
    <h2> bienvenue ! </h1>

    <form action="service/decoservice.php" >

    <input type="submit" class="Envoyer" value="Se deconnecter">
    <a href="view/profil.php">Profil utilisateur</a></li>

    </form>
<br><br><br><br><br><br>
<hr/><section id="catégories">
    <h1><center>  Catégories ! </center></h1></section>
<div class="cat">
    <div class="cat1">
        <!-- il faudrait que ces categories soit en base de données -->
        <p>studio</p>
        <p>F1</p>
        <p>F2</p>
        <p>F3</p>
    </div>
</div>

<form action="service/newsujetservice.php" method="post">

<label>Titre:</label><br/><input type="text" name="titre" /><br/>
<label>Description:</label><br/><textarea name="description" rows="10" cols="50"></textarea> <br>

<input type="submit" value="Envoyer" />
</form>


<hr/>
<br><br><br><br><br><br>



<?php
include "model/fonction.php";
$titre=$_GET["titre"];
$description=$_GET["description"];
$var= sujetnew($titre,$description);
var_dump($var);
?>

<hr/>



<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
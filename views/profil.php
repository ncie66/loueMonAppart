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


<h2><center>Profil utilisateur </center></h2>

<?php

$user=new users();
$user->displayprofil();

?>




<form enctype="multipart/form-data" action="updateservice" method="post"><br>

  <input type="file" name="updateimage">

  <input type="submit" class="Envoyer" id="decobout" value="Enregistrer les parametres">

</form><br><br>








<a href="http://localhost:8888/php/22_legrandfinal/Acceuil"> Retourner aux locations </a><br><br><br><br>

<form action="decoservice" >

   <input type="submit" class="Envoyer" value="Se deconnecter" id="decobout" >

</form>
</body>
</html>
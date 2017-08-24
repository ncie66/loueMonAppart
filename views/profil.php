<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="view/animate.css">
    <title>Projet</title>
</head>
<body>

<header>
    <ul>
        <li><a href="forum.php">Home</a></li>
        <li><a href="#catégories">Catégories</a></li>
        <li><a href="#tchat">Tchat</a></li>
    </ul>
</header>

<hr/>
       <h1><div class="allo"><center> Bienvenue sur le Forum ! </center><div></h1>
<hr/><br>

<h2><center>Profil utilisateur </center></h2>
<img src="imgprofil.jpg" alt="Photo" style="width: 300px; height: 250px; "/><br>


<script>
if (window.File && window.FileReader && window.FileList && window.Blob) 
  document.write("<b></b>");
else
  document.write('<i>API File non reconnue par ce navigateur.</i>');
</script> 

<input type="file" id="getimage">

<fieldset><legend>Votre image ici</legend>
    <div  id="imgstore"></div>
</fieldset> 


<script>
function imageHandler(e2) 
{ 
  var store = document.getElementById('imgstore');
  store.innerHTML='<img src="' + e2.target.result +'">';
}

function loadimage(e1)
{
  var filename = e1.target.files[0]; 
  var fr = new FileReader();
  fr.onload = imageHandler;  
  fr.readAsDataURL(filename); 
}

window.onload=function()
{
  var x = document.getElementById("filebrowsed");
  x.addEventListener('change', readfile, false);
  var y = document.getElementById("getimage");
  y.addEventListener('change', loadimage, false);
}
</script>

<a href="http://localhost:8888/php/projet/index.php?page=Acceuil"> Retourner axux locations </a>

<form action="service/decoservice.php" >

   <input type="submit" class="Envoyer" value="Se deconnecter">

</form>


</body>
</html>
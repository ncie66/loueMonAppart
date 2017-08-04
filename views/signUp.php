<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="view/animate.css">
    <title>Projet</title>
</head>
<body>
<hr/>
    <h1><div class="allo"><center> Bienvenue sur louepasmonappart ! </center><div></h1>
<hr/>

<h2> S'inscrire ! </h1>


   <form method="post" action="Inscriptionservice.php">
            <label>username </label>
            <input  type="text" name="nom"><br><br>

            <label>password </label>
            <input  type="password" name="password" ><br><br>

            <label>confirm password </label>
            <input  type="password" name="password" ><br><br>

             <label>email </label>
            <input  type="text" name="mail"><br><br>

        <input type="submit" class="Envoyer" value="S'inscrire">
        <a href="signIn">Sign In</a>
    </form> 

</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="views/style.css">
    <title>Inscription</title>
</head>
<body>

<h1><div class="allo"><center> Bienvenue sur MonFuturAppart ! </center><div></h1>

<div class="inscri">
<h2>Inscription </h1>


   <form method="post" action="Inscriptionservice">
            <label>username </label>
            <input  type="text" name="nom"><br><br>

            <label>password </label>
            <input  type="password" name="password" ><br><br>

             <label>email </label>
            <input  type="text" name="mail"><br><br>

        <input type="submit" class="Envoyer" value="S'inscrire">
        <a href="signIn">Sign In</a>
    </form> 
</div>
</body>
</html>
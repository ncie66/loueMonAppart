<?php

$titre = $_POST['titre'];
$description = $_POST['description'];
$userId = $_SESSION["users"][0]["ID"];


if(empty($titre)== false AND empty($description)== false){
        nouveausujet($titre,$description,$userId);
        header("location: ../index.php?page=forum&titre=$titre&description=$description");
}
else{
    header("location: ../index.php?page=Acceuil");
}

?>
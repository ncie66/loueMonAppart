<?php

$username = $_POST['nom'];
$password = $_POST['password'];
$flag = true;
$flag2 = true;

var_dump($username);
var_dump($password);

$bddmanager = new BddManager();
$user = $bddmanager ->check_user_login($username, $password);


if($user==true){
        $_SESSION["user"]=$user;
        Flight::redirect('Acceuil');
}
else{
    Flight::redirect('signIn');
    
}

?>
<?php

$username = $_POST['nom'];
$password = $_POST['password'];
$flag = true;
$flag2 = true;

$bddmanager = new BddManager;
$users = $bddmanager ->check_user_login($username, $password);

if(empty($user)==true){
        $_SESSION["users"]=$users;
        Flight::redirect('Acceuil');
}
else{
    Flight::redirect('signIn');
    
}

?>
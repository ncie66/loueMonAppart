<?php
include "../model/fonction.php";
$username = $_POST['nom'];
$password = $_POST['password'];
$mail = $_POST['mail'];
$flag = true;
$flag2 = true;
$flag3 = false;

$usersameControl = get_user_by_username($username);
$mailControl = get_user_by_mail($mail);

if(empty($usersameControl)==true){
   $flag = false;
}

if(empty($mailControl)==true){
   $flag2 = false;
}
if(strlen($password)<8){
    $flag3 = true;
}

if($flag==false and $flag2==false and $flag3==false){
        inscription($username,$mail,$password);
        header("location: ../index.php?page=signIn");
}
else{
    header("location: ../index.php?page=signUp");
}

?>

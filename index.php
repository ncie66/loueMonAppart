<?php
session_start();

require 'flight/Flight.php';
require "Autoloader.php";


Flight::route('/', function(){
    Flight::redirect('signIn');

});

Flight::route('/signIn', function(){
    Flight::render('signIn');

});

Flight::route('/signUp', function(){
    Flight::render('signUp');

});

Flight::route('/Acceuil', function(){
    Flight::render('indexAppart');
});

Flight::route('/studio', function(){
    Flight::render('studio');
});
Flight::route('/f2', function(){
    Flight::render('f2');
});

Flight::route('/f3', function(){
    Flight::render('f3');
});
Flight::route('/appluxe', function(){
    Flight::render('appluxe');
});
Flight::route('/profil', function(){
    Flight::render('profil');
});

Flight::route('/decoservice', function(){
    $deco=new decoservice();
    $deco->deco();
});


Flight::route('/reserved', function(){
    Flight::render('reserved');

});


Flight::route('POST /Loginservice', function(){
     $username = $_POST['nom'];
    $password = $_POST['password'];


    $bddmanager = new BddManager();
    $user = $bddmanager ->check_user_login($username, $password);

    if($user==false){
            
            Flight::redirect('signIn');
    }
    else{
        $_SESSION["user"]=$user;
        Flight::redirect('Acceuil');
        
    }
});

Flight::route('/decoservice', function(){

    Flight::redirect('Acceuil');
});


Flight::route('POST /Inscriptionservice', function(){
       $username = $_POST['nom'];
       $password = $_POST['password'];
       $mail = $_POST['mail'];
   
   
       $bddmanager = new BddManager();
   
       $user = $bddmanager ->check_user_login($username, $password);
       
        if($user!==false){
                   
               Flight::redirect('signUp');
        }
        else{
            $bddmanager ->save_user($username, $password, $mail);
            Flight::redirect('signIn');
               
        }
});

Flight::route('POST /newsujetservice', function(){
    $description = $_POST['description'];
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $user_id= $_SESSION['user']['id'];


    $bddmanager = new BddManager();

         $bddmanager ->save_sujet($user_id, $titre, $description, $categorie);
         Flight::redirect('Acceuil');

});

Flight::route('POST /updateservice', function(){

        $update=new updateservice();

        $update->addphoto();

        Flight::redirect('Profil');
       
   
});


Flight::route('POST /detailservice/@id', function($id){


    $bddmanager = new BddManager();

         $bddmanager ->getAppartById($id);
         Flight::redirect('Acceuil');

});

Flight::route('POST /deleteService/@id', function($id){

    $bddmanager = new BddManager();
    $bddmanager->deleteannonce($id);
         Flight::redirect('Acceuil');

});

Flight::route('POST /reservedservice/@id', function($id){

   $bddmanager = new BddManager();
   $success = $bddmanager ->reservedannonce($id, $_SESSION['user']['id']);

   if($success == 1){
    Flight::redirect('Acceuil');
    "<script>javascript: alert('bravo !')></script>";
   } 

   else{
    Flight::redirect('studio');
   }
    

});

Flight::start();

?>

?>
    echo"<script language=\"javascript\">"
    echo"alert('Cette appartement est déjà reservé')";
    echo"</script>";
<?
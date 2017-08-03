<?php

require 'flight/flight.php';

Flight::route('/', function(){
    echo 'hello world!';

});

Flight::route('/login', function(){
    Flight::render('login');

});

Flight::start();




// if(isset($_GET['page'])){
//     $page = $_GET['page'];
// }
// else{
//     $page = 'login';
// }
// switch($page){
//     case 'login':
//     // 1) Dans un premier temps, avoir nos données
//     // 2) Dans un second temps, remplir notre template avec ces données
//     include("views/login.php");
//     break;

//     case 'wall';
//     include("views/wall.php");
//     break;

//     case 'test';
//     include("views/test.php");
//     break;
// }

?>
<?php
session_start();

require 'flight/Flight.php';
include "model/BddManager.php";

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
    Flight::render('Acceuil');

});

Flight::route('POST /Loginservice', function(){
    include 'service/Loginservice.php';
});

Flight::start();



?>

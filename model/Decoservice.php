<?php

class Decoservice{
    public function deco(){
        session_destroy();
        
        Flight::redirect("signIn");
        
    }
}




?>
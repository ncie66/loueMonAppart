<?php

class Commentaire_post{

    public function comment(){

        $id = $_POST['id'];
        $username = $_POST['username'];
        $commentaire = $_POST['commentaire'];


        if(!empty($id)  && !empty($username) && !empty($commentaire)){
                $bdd= new bddManager();

                $bdd->commentannonce($id,$username,$commentaire);
                Flight::redirect("Acceuil?message=true");
        }
        else{
            Flight::redirect("Acceuil?message=false");
        }
    }
}

?>
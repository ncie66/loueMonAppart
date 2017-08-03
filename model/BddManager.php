<?php

class BddManager{

    private $connexion;

    public function __construct(){

    }

        public function getConnexion(){
        
        if(empty($this->connexion)){

            $this->connexion= new PDO( "mysql:host=localhost;dbname=appart", "root", "1234");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        }
    }

    public function getUserById($id){
        $this->getConnexion();
        $object = $this->connexion->prepare('SELECT * FROM user WHERE id=:id');
        $object->execute(array(
            'id'=>$id
        ));
        $user = $object->fetchAll(PDO::FETCH_ASSOC);

        return new User($user[0]);
    }

    public function check_user_login($username, $password){
        $this->getConnexion();
        $object = $this->connexion->prepare('SELECT * FROM user WHERE username=:username AND password=:password');
        $object->execute(array(
            'username'=>$username,
            'password'=>$password
        ));
        $user = $object->fetchAll(PDO::FETCH_ASSOC);

        if(empty($user)==false){
            return true;
        }
        else{
            return false;
        }
    }
}

?>
<?php

class BddManager{

    private $connexion;

    public function __construct(){

    }

        public function getConnexion(){
        
        if(empty($this->connexion)){

            $this->connexion= new PDO( "mysql:host=localhost;dbname=appartfinal", "root", "1234");
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

        return $user[0];
    }

    public function check_user_login($username, $password){
        $this->getConnexion();
        $object = $this->connexion->prepare('SELECT * FROM user WHERE username=:username AND password=:password');
        $object->execute(array(
            'username'=>$username,
            'password'=>$password
        ));
        $user = $object->fetch(PDO::FETCH_ASSOC);

        if(empty($user)==false){
            return $user;
        }
        else{
            return false;
        }
    }

    public function save_user($username, $password, $mail){
        $this->getConnexion();
        $object = $this->connexion->prepare('INSERT INTO user SET username=:username, password=:password, mail=:mail');
        $object->execute(array(
            'username'=>$username,
            'password'=>$password,
            'mail'=>$mail
        ));
        $user = $object->fetch(PDO::FETCH_ASSOC);

        if(empty($user)==false){
            return $user;
        }
        else{
            return false;
        }
    }
    public function save_sujet($user_id, $titre, $description, $categorie){
        $this->getConnexion();
        $object = $this->connexion->prepare('INSERT INTO appartfinal SET user_id=:user_id, titre=:titre, categorie=:categorie, description=:description');
        $object->execute(array(
            'user_id'=>$user_id,
            'titre'=>$titre,
            'description'=>$description,
            'categorie'=>$categorie
        ));
        $user = $object->fetch(PDO::FETCH_ASSOC);
    }

    public function displayAppart($appart){

            if($appart == false)
                return;
        
            for($i = 0; $i < count($appart); $i++){
                $var = $appart[$i];
                echo "<form action='detailService.php?id=".$var['id']."' method='post'>";
                echo "categorie:<br>".$var['categorie']."<br><br>";
                echo "titre:<br>".$var['titre']."<br><br>";
                echo "description:<br>".$var['description']."<br><br>";
                echo "<input type='submit' name='action' value='Détails'/>";
                echo "<input type='submit' name='action' value='Delete'/>";
                echo "<hr>";
                echo "</form>";
                echo "<br>";
    
            }
        
    }

    public function getAppartById($id){
        $this->getConnexion();
        $object = $this->connection->prepare('SELECT *
        FROM appartfinal WHERE id=:id');
        $object->execute(array(
            'id'=>$id
        ));
        $appart = $object->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($appart)){
          return $appart;
        }
        return false;
    }

    public function getAllAppart(){
        $this->getConnexion();
      $object = $this->connexion->prepare('SELECT * FROM appartfinal');
      $object->execute(array());
      $appart = $object->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($appart)){
            $tableauAppart=[];
            foreach($appart as $tableauDonneesAppart){
              array_push($tableauAppart, $tableauDonneesAppart);
            }
            return $tableauAppart;
        }
        return false;
    }

    public function saveAppart(Appart $appart){
        if(empty($appart->getId()) == true ){
          $this->insertAppart($appart);
        }
    }

    public function insertAppart(Appart $appart){
      $query="INSERT INTO appartfinal SET categorie=:categorie, titre=:titre, prix=:prix, description=:description";
        $pdo = $this->connection->prepare($query);
        $pdo->execute(array(
            'categorie'=>$appart->getCategorie(),
            'titre' => $appart->getTitre(),
            'description'=>$appart->getDescription(),
        ));
        return $pdo->rowCount();
    }

    public function updateAppart(Appart $appart){
      $query="UPDATE appartfinal SET categorie=:categorie, titre=:titre, prix=:prix, description=:description WHERE id=:id";
        $pdo = $this->connection->prepare($query);
        $pdo->execute(array(
            'id' =>$appart->getId(),
            'categorie'=>$appart->getCategorie(),
            'titre' => $appart->getTitre(),
            'description'=>$appart->getDescription(),
        ));
        return $pdo->rowCount();
    }

    public function deleteAppart(Appart $appart){
      $query="DELETE FROM appartfinal WHERE id=:id";
        $pdo = $this->connection->prepare($query);
        $pdo->execute(array(
            'id' =>$appart->getId()
        ));
        return $pdo->rowCount();
    }

}

?>
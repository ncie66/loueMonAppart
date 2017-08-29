<?php

class BddManager{

    private $connexion;

    public function __construct(){
        $this->getConnexion();
    }

        public function getConnexion(){
        
        if(empty($this->connexion)){

            $this->connexion= new PDO( "mysql:host=localhost;dbname=appartfinal", "root", "1234");
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        }
    }

    public function getUserById($id){
        $object = $this->connexion->prepare('SELECT * FROM user WHERE id=:id');
        $object->execute(array(
            'id'=>$id
        ));
        $user = $object->fetchAll(PDO::FETCH_ASSOC);

        return $user[0];
    }

    public function check_user_login($username, $password){
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
        $object = $this->connexion->prepare('INSERT INTO user SET username=:username, password=:password, mail=:mail, photo=:photo');
        $object->execute(array(
            'username'=>$username,
            'password'=>$password,
            'mail'=>$mail,
            'photo'=>'/php/22_legrandfinal/model/uploads/profil.png'
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
                echo "<form action='detailService/".$var['id']."' method='post'>";
                if ($var['locataire_id']==1){
                    echo "appartement reservé<br><br>";
                }
                echo "categorie:<br>".$var['categorie']."<br><br>";
                echo "titre:<br>".$var['titre']."<br><br>";
                echo "description:<br>".$var['description']."<br><br>";
                echo "<input type='submit' name='action' value='Détails'/>";
                echo "</form>";
                echo "<form action='deleteService/".$var['id']."' method='post'><input type='submit' name='action' value='Delete'/></form>";
                echo "</form>";
                if ($var['locataire_id']==0){
                        echo'   <form method="post" action="reservedservice/'.$var['id'].'">
                                    <input type="submit" value="Reserver">
                               </form>';
                               echo '<br>';
                }
                $comment=$this->getcommentannonce($var['id']);
                if(!empty($comment)){

                    for($y=0;$y<count($comment);$y++){
                        echo 'Pseudo: '.$comment[$y]['username'];
                        echo '<br><br>';
                        echo 'Commentaire: '.$comment[$y]['commentaire'];
                        echo '<br><br>';
                    };                  

                }
                echo '<form action="commentaire_post/" method="post" >';
                echo '<label for="username">Pseudo : </label> ';
                echo '<input type="text" name="username" id="id" placeholder="Entrez votre pseudo..." maxlength="20" /><br />';
                echo '<label for="commentaire">Commentaire : </label><textarea name="commentaire" id="commentaire" placeholder="Entrez un commentaire"></textarea><br />';
                echo '<input type="submit" value="Envoyer" />';
                echo '<input type="hidden" name="id" value="'.$var['id'].'">';
                echo '</form>';
                echo '<br>';
                echo '<hr>';
    
            }
        
    }

    public function getAppartById($id){
        $object = $this->connexion->prepare('SELECT * FROM appartfinal WHERE id=:id');
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

    public function saveAppart(Appart $appart){;
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
        $pdo = $this->connexion->prepare($query);
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
        $pdo = $this->connexion->prepare($query);
        $pdo->execute(array(
            'id' =>$appart->getId()
        ));
        return $pdo->rowCount();
    }

    public function updateprofil(Users $user){
        $param=$user->getParam();
        
        $query="UPDATE user SET photo=:photo WHERE username=:username";
        $pdo = $this->connexion->prepare($query);
        $pdo->execute(array(
            'photo'=>$param['photo'],
            'username'=>$param['username'],
        ));
        return $pdo->rowCount();

    }

    public function selectuser(users $user){
        $param=$user->getParam();
        $object = $this->connexion->prepare('SELECT * FROM user WHERE username=:username');
        $object->execute(array(
            'username'=>$param['username']
        ));
        $user = $object->fetch(PDO::FETCH_ASSOC);

            return $user;
    }

    public function deleteannonce($id){
        $object = $this->connexion->prepare('DELETE FROM appartfinal WHERE id=:id');
        $object->execute(array(
            'id'=>$id,
        ));
        $user = $object->fetch(PDO::FETCH_ASSOC);


    }
    
    public function reservedannonce($id, $user){
        $object = $this->connexion->prepare('UPDATE appartfinal SET locataire_id=:locataire_id WHERE id=:id');
        $object->execute(array(
            'id'=>$id,
            'locataire_id'=>$user,
        ));
        $success = $object->rowCount();
        return $success;
    }


    public function commentannonce($id, $username, $commentaire){
        $object = $this->connexion->prepare('INSERT INTO comment SET annonce_id=:id, username=:username, commentaire=:commentaire');
        $object->execute(array(
            'id'=>$id,
            'username'=>$username,
            'commentaire'=>$commentaire,
        ));
        
    }
    
    public function getcommentannonce($id){
        $object = $this->connexion->prepare('SELECT * FROM comment WHERE annonce_id=:id');
        $object->execute(array(
            'id'=>$id,
        ));
        $user = $object->fetchAll(PDO::FETCH_ASSOC);
        
        return $user;
    }
   

}

?>
<?php

class AppartRepository{

    private $connection;

    public function __construct($connection){
        
            $this->connection= $connection;
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
          return new Appart($appart[0]);
        }
        return false;
    }

    public function getAllAppart(){
      $object = $this->connection->prepare('SELECT * FROM appartfinal');
      $object->execute(array());
      $appart = $object->fetchAll(PDO::FETCH_ASSOC);
        if(!empty($appart)){
            $tableauAppart=[];
            foreach($appart as $tableauDonneesAppart){
              $tableauAppart[]=new Voiture($tableauDonneesAppart);
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


    public function displayAppart($appart){


        for($i = 0; $i < count($appart); $i++){

            $var = new appart($appart[$i]);

            echo    "<form action='newsujetservice.php?id=".$var->id."' method='post'>";
            echo    "Categorie:<br>".$var->categorie."<br><br>";
            echo    "<option value='studio'>studio</option>";
            echo    "<option value='Appartement F2'>Appartement F2</option>";
            echo    "<option value='Appartement F3'>Appartement F3</option>";
            echo    "<option value='Appartement de Luxe'>Appartement de Luxe</option>";
            echo    "</select><br><br>";
            echo    "<label>Titre:</label><br/><input type='text' name='titre' /><br/><br>";
            echo    "<label>Description:</label><br/><textarea name='description' rows='10' cols='50'></textarea> <br>";
            echo    "<input type='submit' value='Envoyer' />";
            echo    "</form>";

        }
    }


}

?>
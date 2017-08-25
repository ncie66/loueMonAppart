<?php

class Appart{
    
  public $categorie;
  public $titre;
  public $description;

  
  function getCategorie() {
      return $this->categorie;
  }

  function getTitre() {
      return $this->titre;
  }

  function getDescription() {
      return $this->description;
  }

  function setCategorie($categorie) {
      $this->categorie = $categorie;
  }

  function setTitre($titre) {
      $this->titre = $titre;
  }
  function setDescription($description) {
    $this->description = $description;
}

    
    public function __construct($donnees = array())
    {
      $this->hydrate($donnees);
    }
   
    public function hydrate($donnees)
    {
        foreach($donnees as $key => $value)
        {
            
            //ici je rajoute un remplacement des undescore
            $key = preg_replace("#_#","",$key);
            //donc pour l'index id on met le en majuscule et le
            // prefix avec "set"
            $method = "set".ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    
    public function save(BddManager $bddManager){
      //$this tout court sert à passer l'objet lui même
      $bddManager->getAppartRepository()->saveAppart($this);
    }
    public function delete(BddManager $bddManager){
      $bddManager->getAppartRepository()->deleteAppart($this);
    }
    public function getAll(BddManager $bddManager){
        return $bddManager->getAppartRepository()->getAllAppart();
    }
    
}
?>
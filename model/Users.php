<?php



class Users {

    private $parametre;

    function getParam() {
        return $this->parametre;
    }
  
    function setParam($parametre) {
        $this->parametre = $parametre;
    }

    public function displayprofil(){
        $username=$_SESSION['user']['username'];
        $this->setParam(array('username'=>$username));
        $bdd= new bddManager();
        $user=$bdd->selectuser($this);
        echo "<center><img width='250 height='200' src='".$user['photo']."'/></center>";
    
    }

}




?>
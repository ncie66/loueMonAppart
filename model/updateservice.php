<?php

class Updateservice{

    public function upload($files){

        $target_path = "/php/22_legrandfinal/model/uploads/";

        $target_path = $target_path . basename( $files['name']);


        if (isset($files) AND $files['error'] == 0)
        {
            
            if ($files['size'] <= 10000000)
            {
                
                $infosfichier = pathinfo($files['name']);

                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    
                    $newName = hash('sha1',$files['name']).'.'.$extension_upload;
                    move_uploaded_file($files['tmp_name'], '/Applications/MAMP/htdocs/php/22_legrandfinal/model/uploads/' . basename($newName));
                    $url='/php/22_legrandfinal/model/uploads/'. basename($newName);
                    return $url;
                }
            }else{
                echo 'Erreur fichier trop gros';
            }
        }else{
            $erreur = $files['error'];
            echo "Le transfert du fichier a subis une erreur de code $erreur";
        }
    }
    public function addphoto(){

            $user=new users();
            $bdd= new bddManager();
            $photo=$_FILES['updateimage'];
            $url=$this->upload($photo);
            $array= array(
                'photo'=>$url,
                'username'=>$_SESSION['user']['username']
            );
            $user->setParam($array);
            $bdd->updateprofil($user);
            
    }
}
<?php

class User{
    private $login;
    private $nom;
    private $prenom;
    private $password;

public function __construct ($id){
    
    $this->id = 0;

    $requete = "SELECT * FROM `users` WHERE `id_user` = '".$id."'  ";
    error_log($requete);
      $result = mysqli_query($GLOBALS['Database'], $requete) or die;

      if ($data = mysqli_fetch_assoc($result)) {

        $this->id = $data['id_user'];
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->login = $data['login'];
        $this->password = password_hash($data['password'], PASSWORD_BCRYPT);
      }
}
    // public static function create($nom, $prenom, $login, $password){    
    // $requete = "INSERT INTO `users` (`nom`, `prenom`, `login`, `password`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$nom) ."','". mysqli_real_escape_string($GLOBALS['Database'],$prenom)."','". mysqli_real_escape_string($GLOBALS['Database'],$login) ."','". mysqli_real_escape_string($GLOBALS['Database'],$password) ."')";
    
    // mysqli_query($GLOBALS['Database'], $requete) or die;
    // }

    public function generate(){    
        $requete = "INSERT INTO `users` (`nom`, `prenom`, `login`, `password`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$this->nom) ."','". mysqli_real_escape_string($GLOBALS['Database'],$this->prenom)."','". mysqli_real_escape_string($GLOBALS['Database'],$this->login) ."','". mysqli_real_escape_string($GLOBALS['Database'],$this->password) ."')";
        error_log($requete);
        mysqli_query($GLOBALS['Database'], $requete) or die;
        return mysqli_insert_id($GLOBALS['Database']);
    }
    public function update(){    
    $requete = "UPDATE `users` SET `nom`='". mysqli_real_escape_string($GLOBALS['Database'],$this->nom) ."', `prenom`='". mysqli_real_escape_string($GLOBALS['Database'],$this->prenom) ."',`login`='". mysqli_real_escape_string($GLOBALS['Database'],$this->login) ."' WHERE `id_user`='". $this->id ."'";
    mysqli_query($GLOBALS['Database'], $requete) or die;
    }

    public static function checkLogin(){
        $request = "SELECT * FROM `users` WHERE `login` = '".$_POST['login']."'";
        $select = mysqli_query($GLOBALS['Database'], $request);
        if(mysqli_num_rows($select)) { 
            return true;    
    }
}




    public function setLogin($login){
        $this->login = $login;
    }
    public function getLogin(){
        return $this->login;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getNom(){
        return $this->nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function getPrenom(){
        return $this->prenom;
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
    public function getPassword(){
        return $this->password;
    }
    public function is_logged(){
        if(isset($_SESSION['id'])){
            return true;
        }else{
            return false;
        }
    }


    public function get_id(){
        if($this->is_logged()){
            return $_SESSION['id'];
        }
    }
    
    

}
<?php

class User{
    private $login;
    private $nom;
    private $prenom;
    private $password;

public function __construct ($login, $nom, $prenom, $password){
    $this->login = $login;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->password = password_hash($password, PASSWORD_BCRYPT);
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
        if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
            return true;
        }else{
            return false;
        } 
    }
    public function get_login(){
        if($this->is_logged()){
            return $_SESSION['login'];
        }
    }
}
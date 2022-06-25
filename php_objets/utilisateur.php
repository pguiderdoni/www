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
    $this->password = $password;
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

}
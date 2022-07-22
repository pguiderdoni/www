<?php

class User{
    private $nom;
    private $adresse;
    private $age;

public function __construct ($id){

    $this->id = 0;
    $requete = "SELECT * FROM `users` WHERE `id_user` = '".$id."'  ";
      $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_assoc($result)) {
            $this->id = $data['id_user'];
            $this->nom = $data['nom_user'];
            $this->adresse = $data['adresse_user'];
            $this->age = $data['age_user'];
        }
}
public function generate(){ 
    $requete = "INSERT INTO `users` (`nom_user`, `adresse_user`, `age_user`) 
                VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$this->nom) ."','". mysqli_real_escape_string($GLOBALS['Database'],$this->adresse)."','". mysqli_real_escape_string($GLOBALS['Database'],$this->age) ."')";
    mysqli_query($GLOBALS['Database'], $requete) or die;
    return mysqli_insert_id($GLOBALS['Database']);
}
public function setNom($nom){
    $this->nom = $nom;
}
public function getNom(){
    return $this->nom;
}
public function setAdresse($adresse){
    $this->adresse = $adresse;
}
public function getAdresse(){
    return $this->adresse;
}
public function setAge($age){
    $this->age = $age;
}
public function getAge(){
    return $this->age;
}
}
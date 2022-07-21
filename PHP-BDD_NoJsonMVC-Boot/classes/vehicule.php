<?php

class vehicule{
    
    private $id;
    private $marque;
    private $modele;
    private $immat;
    private $puissance;


public function __construct ($id){

    $this->id = $id;
    $this->checkData($id);     
}

public function generate(){  
   
    $requete = "INSERT INTO `vehicules` (`nom_marque`, `nom_modele`,`puissance`,`immat`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$this->marque) ."','". mysqli_real_escape_string($GLOBALS['Database'],$this->modele)."','". mysqli_real_escape_string($GLOBALS['Database'],$this->puissance)."','". mysqli_real_escape_string($GLOBALS['Database'],$this->immat)."')";
    $result = mysqli_query($GLOBALS['Database'], $requete) or die;

}
public function update(){ 
$requete = "UPDATE `vehicules` SET `nom_marque`='". mysqli_real_escape_string($GLOBALS['Database'],$this->marque) ."', `nom_modele`='". mysqli_real_escape_string($GLOBALS['Database'],$this->modele) ."',`immat_vehicule`='". mysqli_real_escape_string($GLOBALS['Database'],$this->immat) ."',`puissance`='". mysqli_real_escape_string($GLOBALS['Database'],$puissance) ."'";
mysqli_query($GLOBALS['Database'], $requete) or die;
}

public function checkData($id){
    $requete = "SELECT * FROM `vehicules`  WHERE `id_inter` = '".mysqli_real_escape_string($GLOBALS['Database'],$id) . "'";
    $result = mysqli_query($GLOBALS['Database'], $requete) or die;
    if ($data = mysqli_fetch_array($result)){
        $this->marque = $data['nom_marque'];
        $this->modele = $data['nom_modele'];
        $this->immat = $data['immat'];
        $this->puissance = $data['puissance'];
    }
}





public function setMarque($marque){
    $this->marque = $marque;
}
public function getMarque(){
    return $this->marque;
}
public function setModele($modele){
    $this->modele = $modele;
}
public function getModele(){
    return $this->modele;
}
public function setImmat($immat){
    $this->immat = $immat;
}
public function getImmat(){
    return $this->immat;
}
public function setPuissance($puissance){
    $this->puissance = $puissance;
}
public function getPuissance(){
    return $this->puissance;
}


}
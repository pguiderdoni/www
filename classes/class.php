<?php 

abstract class Produits{

    protected $ref;
    protected $desc;
    protected $prix;
    private $size;
    private $qte;

    public function __construct($ref, $desc, $size, $prix, $qte ){
        $this-> ref = $ref;
        $this-> desc = $desc;
        $this-> prix = $prix;
        $this-> size = $size;
        $this-> qte = $qte;
    }

public function setRef($ref){
    $this->ref = $ref;
}
public function getRef(){
    return $this->ref;
}
public function setDesc($desc){
    $this->desc = $desc;
}
public function getDesc(){
    return $this->desc;
}
public function setPrix($prix){
    if($prix <=0){
        throw new PrixException('<h2 style="color:red">Le prix de ' .$this->desc.' ne peut être inferieur à 0</h2><br>');
    }else{
        $this->prix = $prix;
    }   
}
public function getPrix(){
    return $this->prix;
}
public function setSize($size){
    $this->size = $size;
}
public function getSize(){
    return $this->size;
}
public function setQte($qte){
    if($qte <=0){
        throw new QteException('<h2 style="color:blue">La quantité ne peut être inerieure à 0</h2><br>');
    }else{
        $this->qte = $qte;
    }
}
public function getQte(){
    return $this->qte;
}
}




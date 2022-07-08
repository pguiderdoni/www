<?php
class Vetement extends Produits{


    public function afficherProduit(){
        return '<H2>Le vêtement '.$this->getDesc().'('.$this->getRef().') en taille '.$this->getSize().' coûte '.$this->getPrix().'€</H2><br>';
    }

}
<?php

class Chaussure extends Produits{
 
    
    public function afficherProduit(){
        return '<H2>Les chaussures '.$this->getDesc().'('.$this->getRef().') en pointure '.$this->getSize().' coûtent '.$this->getPrix().'€</H2><br>';
    }
}


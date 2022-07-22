<?php

interface Meat {
    public function cook();
};

class RareMeat implements Meat {
    private $tempsCuisson ; 


    public function setCuisson($tempsCuisson){
        $this->tempsCuisson = $tempsCuisson;
    }
    public function getCuisson(){
        return $this->tempsCuisson;
    }

    public function cook(){

        echo 'Temps de cuisson: '.$this->tempsCuisson.' secondes par face';
    }
};

class MediumRare implements Meat {
    public function cook(){
        echo 'temps de cuisson 2 minutes' ;       
    }
};

class OverCooked implements Meat {
    public function cook(){
        echo 'temps de cuisson 4 minutes';
    }
};

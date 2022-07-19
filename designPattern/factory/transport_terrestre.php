<?php
require_once("transport.php");

class Transport_terrestre extends Transport{
    public function afficher(){
        echo "Transport terrestre effectué!";
    } 
}
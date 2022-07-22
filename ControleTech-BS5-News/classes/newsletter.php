<?php

class NewsLetter{
    private $subscriber ;

    public function __construct (){
        $this->subscriber = array();
    }

    public function addSubscriber($immat){
        $requete =  "SELECT `liste_news` FROM `newsletter` WHERE `id_news`='".mysqli_real_escape_string($GLOBALS['Database'],2) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        if ($data = mysqli_fetch_array($result)){
            if(!empty($data['liste_news']) ||  !is_null($data['liste_news'])){
                $this->subscriber = json_decode($data['liste_news'],true);
                array_push($this->subscriber, $immat);
                $json2 = json_encode($this->subscriber);
                $requete2 = "UPDATE `newsletter` SET `liste_news`='". mysqli_real_escape_string($GLOBALS['Database'],$json2) ."'";
                mysqli_query($GLOBALS['Database'], $requete2) or die;   
            }                
        }
        return $json2;
    }

    public function removeSubscriber($data){
        $this->subscriber = array_unset($subscriber, $data);
    }

    public function sendNewsletter(){
        foreach ($subscriber as $client){

        }
    }

    public function setSubscriber($subscriber){
        $this->subscriber = $subscriber;
    }
    public function getSubscriber(){
        return $this->subscriber;
    }



}
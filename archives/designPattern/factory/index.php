<?php

require_once("transport_maritime.php");
require_once("transport_terrestre.php");
$num_commande = 23455666;
$type_envoi = "camion";


if($type_envoi == "camion"){
    $transport =new Transport_terrestre($num_commande);
}else{
    $transport =new Transport_maritime($num_commande);
}

$transport->afficher();
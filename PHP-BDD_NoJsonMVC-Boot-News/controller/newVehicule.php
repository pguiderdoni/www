<?php
include '../classes/database.php';
include '../classes/vehicule.php';
include '../classes/newsletter.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();


switch($_POST['request']){

    case 'new_vehicule':
        $newsLetter = $_POST['news_letter'];
        error_log($newsLetter);
        $vehicule = new Vehicule(0);
        $vehicule->setMarque($_POST['marque_vehicule']);
        $vehicule->setModele($_POST['modele_vehicule']);
        $vehicule->setImmat($_POST['immat_vehicule']);
        $vehicule->generate();
        if($newsLetter){
            $news = new NewsLetter();
            $news->addSubscriber($_POST['immat_vehicule']);
        }
       
        $status= 1;
        $msg = 'Véhicule enregistré';
            echo json_encode(array("status" => $status, "msg" => $msg ));
    break;

    default :
echo json_encode(1) ;
break; 
}

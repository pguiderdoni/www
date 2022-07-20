<?php
include '../classes/database.php';
include '../classes/vehicule.php';
$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch($_POST['request']){

        case 'factureOk':
            $html = '';
            $idInter = $_POST['idInterv'];
            $requete = "UPDATE `vehicules` SET `fin_inter`='". mysqli_real_escape_string($GLOBALS['Database'],'2') ."' WHERE `id_inter`='".mysqli_real_escape_string($GLOBALS['Database'],$idInter)."'";
            $result = mysqli_query($GLOBALS['Database'], $requete)or die;
            $status = 1;
            $msg = 'facture payée';
            echo json_encode(array("status" => $status, "msg" => $msg ));
        break;

        case 'interventionFinie':
            $html = '';
            $idInter = $_POST['idInter'];
            $requete = "UPDATE `vehicules` SET `fin_inter`='". mysqli_real_escape_string($GLOBALS['Database'],'1') ."' WHERE `id_inter`='".mysqli_real_escape_string($GLOBALS['Database'],$idInter)."'";
            $result = mysqli_query($GLOBALS['Database'], $requete)or die;
            error_log($requete);
            $status = 1;
            $msg = 'véhicule terminé';
            echo json_encode(array("status" => $status, "html" => $html, "msg" => $msg ));
        break;

        case 'interventionNonFinie':
            $html = '';
            $idInter = $_POST['idInterv'];
            $requete = "UPDATE `vehicules` SET `fin_inter`='". mysqli_real_escape_string($GLOBALS['Database'],'0') ."' WHERE `id_inter`='".mysqli_real_escape_string($GLOBALS['Database'],$idInter)."'";
            $result = mysqli_query($GLOBALS['Database'], $requete)or die;
            error_log($requete);
            $status = 1;
            $msg = 'véhicule non terminé';
            echo json_encode(array("status" => $status, "html" => $html, "msg" => $msg ));
        break;


default :
echo json_encode(1) ;
break; 
}

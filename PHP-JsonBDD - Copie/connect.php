<?php
include 'database.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();


switch($_POST['request']){

        case 'new_vehicule':
            $marque = $_POST['marque_vehicule'];
            $modele = $_POST['modele_vehicule'];
            $immatriculation = $_POST['immat_vehicule'];
            $puissance = $_POST['puissance_vehicule'];
            $vehicule = array('immat' => $immatriculation, 'marque' => $marque, 'modele' => $modele, 'puissance' => $puissance);
            $json = json_encode($vehicule);
            error_log(json_encode($vehicule));
            $requete = "INSERT INTO `vehicules` (`vehiculeJson`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$json) ."')";
            mysqli_query($GLOBALS['Database'], $requete) or die;
            $status= 1;
            $msg = 'Vehicule enregistré';
            echo json_encode(array("status" => $status, "msg" => $msg ));
        break;

        case 'interventionLoad':
            $status = 0;
            $requete = "SELECT `vehiculeJson` FROM `vehicules` WHERE `fin_intervention` = '".mysqli_real_escape_string($GLOBALS['Database'],$status) . "'";
            error_log($requete);
            $result = mysqli_query($GLOBALS['Database'], $requete) or die;
            while ($data = mysqli_fetch_array($result)){
                $JsonDecode[] = json_decode($data['vehiculeJson'], true);  
            }
            $html = '';
            foreach($JsonDecode as $interventions){
                $html .= '<tr>
                            <th class="border border-y-slate-700">'.$interventions['marque'].'</th>
                            <th class="border border-y-slate-700">'.$interventions['modele'].'</th>
                            <th class="border border-y-slate-700">'.$interventions['immat'].'</th>
                        </tr>';
                $status = 1;
            }
            echo json_encode(array("status" => $status, "msg" => $html ));
        break;










default :
echo json_encode(1) ;
break; 
}


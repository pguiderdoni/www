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

        case 'marquesLoad':
            $list_marque = array();
            $requete = " SELECT * FROM `marques`";
            $result = mysqli_query($GLOBALS['Database'], $requete) or die;
            $html_marque = '<option class="border border-y-slate-700">-</option>';
            while ($data = mysqli_fetch_array($result)){
                $list_marque[]=$data;

            }
            foreach($list_marque as $marque){
                    $html_marque .= '<option class="border border-y-slate-700" value="'.$marque['id_marque'].'">'.$marque['nom_marque'].'</option>'
                            ;
                    $status = 1;
                }
                echo json_encode(array("status" => $status, "msg" => $html_marque ));
        break;

        case 'modelesLoad':
            $list_modele = array();
            $idMarque = $_POST['marque'];
            $requete2 = " SELECT * FROM `modeles` WHERE `id_marque`='".mysqli_real_escape_string($GLOBALS['Database'],$idMarque) . "'";
            $result2 = mysqli_query($GLOBALS['Database'], $requete2) or die;
            $html_model ="";
            error_log($requete2);
            while ($data2 = mysqli_fetch_array($result2)){
                $list_modele[]=$data2;

            }
            foreach($list_modele as $modele){
                $html_model .= '<option class="border border-y-slate-700" value="'.$modele['id_modele'].'">'.$modele['nom_modele'].'</option>';
                $status = 1;
            }
            echo json_encode(array("status" => $status, "msg" => $html_model ));


        break;









default :
echo json_encode(1) ;
break; 
}


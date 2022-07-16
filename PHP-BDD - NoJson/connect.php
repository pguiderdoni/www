<?php
include 'database.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();


switch($_POST['request']){

        case 'new_vehicule':
            $marqueID = $_POST['marque_vehicule'];
            $modeleID = $_POST['modele_vehicule'];
            $immatriculation = $_POST['immat_vehicule'];
            $puissance = $_POST['puissance_vehicule'];
            // $vehicule = array('marque' => $marqueID, 'modele' => $modeleID, 'puissance' => $puissance,'immat' => $immatriculation);
            // $json = json_encode($vehicule);
            // $requete = "INSERT INTO `vehicules` (`vehiculeJson`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$json) ."')";
            $requete = "INSERT INTO `vehicules` (`nom_marque`, `nom_modele`,`puissance`,`immat`) VALUES ('". mysqli_real_escape_string($GLOBALS['Database'],$marqueID) ."','". mysqli_real_escape_string($GLOBALS['Database'],$modeleID)."','". mysqli_real_escape_string($GLOBALS['Database'],$puissance)."','". mysqli_real_escape_string($GLOBALS['Database'],$immatriculation)."')";
            mysqli_query($GLOBALS['Database'], $requete) or die;
            $status= 1;
            $msg = 'Véhicule enregistré';
            echo json_encode(array("status" => $status, "msg" => $msg ));
        break;

        case 'interventionLoad':
            $status = 0;
            $requete = "SELECT * FROM `vehicules`  WHERE `fin_inter` = '".mysqli_real_escape_string($GLOBALS['Database'],$status) . "'";
            $result = mysqli_query($GLOBALS['Database'], $requete) or die;
            while($data = mysqli_fetch_array($result)){
                $list_vehicule[]=$data;
                $html  = '';
                foreach($list_vehicule as $vehicule){
                    $interv = $vehicule['id_inter'];
                    $immat = $vehicule['immat']; 
                    $requete2 = "SELECT `nom_marque`,`nom_modele` FROM `marques` 
                    INNER JOIN `modeles` 
                    WHERE `marques`.`id_marque` = '".$vehicule['nom_marque']."' 
                    AND `modeles`.`id_modele` = '".$vehicule['nom_modele']."'";
                    $result2 = mysqli_query($GLOBALS['Database'], $requete2) or die;
                    error_log($requete2);
                    if ($data2 = mysqli_fetch_array($result2)){ 
                    $marque = $data2['nom_marque'];  
                    $modele = $data2['nom_modele'];
                    $html .= '<tr id="numInt-'.$interv.'"> 
                            <th class="border border-y-slate-700">'.$interv.'</th>
                            <th class="border border-y-slate-700">'.$marque.'</th>
                            <th class="border border-y-slate-700">'.$modele.'</th>
                            <th class="border border-y-slate-700">'.$immat.'</th>
                            <th class="border border-y-slate-700"><button onclick="interventionOk();">Intervention terminée</button></th>
                            </tr> ';
                    $status = 1;
                    }
                }
                }             
            echo json_encode(array("status" => $status, "msg" => $html ));
        break;

        case 'finishLoad':
            $status = 1;
            $requete = "SELECT * FROM `vehicules`  WHERE `fin_inter` = '".mysqli_real_escape_string($GLOBALS['Database'],$status) . "'";
            $result = mysqli_query($GLOBALS['Database'], $requete) or die;
            while($data = mysqli_fetch_array($result)){
                $list_vehicule[]=$data;
                $html  = '';
                foreach($list_vehicule as $vehicule){
                    $interv = $vehicule['id_inter'];
                    $immat = $vehicule['immat']; 
                    $requete2 = "SELECT `nom_marque`,`nom_modele` FROM `marques` 
                    INNER JOIN `modeles` 
                    WHERE `marques`.`id_marque` = '".$vehicule['nom_marque']."' 
                    AND `modeles`.`id_modele` = '".$vehicule['nom_modele']."'";
                    $result2 = mysqli_query($GLOBALS['Database'], $requete2) or die;
                    error_log($requete2);
                    if ($data2 = mysqli_fetch_array($result2)){ 
                    $marque = $data2['nom_marque'];  
                    $modele = $data2['nom_modele'];
                    $html .= '<tr>
                            <th class="border border-y-slate-700">'.$interv.'</th>
                            <th class="border border-y-slate-700">'.$marque.'</th>
                            <th class="border border-y-slate-700">'.$modele.'</th>
                            <th class="border border-y-slate-700">'.$immat.'</th>
                        </tr>';
                    $status = 1;
                    }
                }
                }             
            echo json_encode(array("status" => $status, "msg" => $html ));
        break;

        case 'interventionFinie':
            $idInter = $_POST['num_interv'];
            $requete = "UPDATE `vehicules` SET `fin_inter`='". mysqli_real_escape_string($GLOBALS['Database'],'1') ."' WHERE `id_inter`='".mysqli_real_escape_string($GLOBALS['Database'],$idInter)."'";
            $result = mysqli_query($GLOBALS['Database'], $requete)or die;
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
            $html_model = '<option class="border border-y-slate-700">-</option>';
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


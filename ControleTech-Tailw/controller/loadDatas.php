<?php
include '../classes/database.php';
include '../classes/vehicule.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

switch($_POST['request']){
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
                if ($data2 = mysqli_fetch_array($result2)){ 
                $marque = $data2['nom_marque'];  
                $modele = $data2['nom_modele'];
                $html .= '<tr> 
                            <th class="border border-y-slate-700 py-2 text-xs">'.$interv.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$marque.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$modele.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$immat.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs"><a type="btn" onclick="interventionOk('.$interv.');" class="underline text-blue-600" href="../templates/liste_interventions.php">Intervention terminée</a></th>
                        </tr>';
                $status = 1;
                }
            }
            }             
        echo json_encode(array("status" => $status, "msg" => $html ));
    break;

    case 'finishLoad':
        $html  = '';
        $status = 1;
        $msg = '';
        $requete = "SELECT * FROM `vehicules`  WHERE `fin_inter` = '".mysqli_real_escape_string($GLOBALS['Database'],$status) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while($data = mysqli_fetch_array($result)){
            $list_vehicule[]=$data;
            foreach($list_vehicule as $vehicule){
                $interv = $vehicule['id_inter'];
                $immat = $vehicule['immat']; 
                $requete2 = "SELECT `nom_marque`,`nom_modele` FROM `marques` 
                INNER JOIN `modeles` 
                WHERE `marques`.`id_marque` = '".$vehicule['nom_marque']."' 
                AND `modeles`.`id_modele` = '".$vehicule['nom_modele']."'";
                $result2 = mysqli_query($GLOBALS['Database'], $requete2) or die;
            } 
                if($data2 = mysqli_fetch_array($result2)){ 
                $marque = $data2['nom_marque'];  
                $modele = $data2['nom_modele'];
                $html .= '<tr>
                            <th class="border border-y-slate-700 py-2 text-xs"><a type="btn" onclick="facturation('.$interv.');" class="underline text-blue-600" href="../templates/base.php">Payer</a></th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$interv.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$marque.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$modele.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$immat.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs"><a type="btn" onclick="interventionNonOk('.$interv.');" class="underline text-blue-600" href="../templates/base.php">Non terminée</a></th>
                        </tr>';
                $status = 1;
                }
            }
                        
        echo json_encode(array("status" => $status, "msg" => $msg, "html" => $html ));
    break;

    case 'facture_load':
        $html  = '';
        $status = 2;
        $msg = '';
        $requete = "SELECT * FROM `vehicules`  WHERE `fin_inter` = '".mysqli_real_escape_string($GLOBALS['Database'],$status) . "'";
        $result = mysqli_query($GLOBALS['Database'], $requete) or die;
        while($data = mysqli_fetch_array($result)){
            $list_vehicule[]=$data;
            foreach($list_vehicule as $vehicule){
                $interv = $vehicule['id_inter'];
                $immat = $vehicule['immat']; 
                $requete2 = "SELECT `nom_marque`,`nom_modele` FROM `marques` 
                INNER JOIN `modeles` 
                WHERE `marques`.`id_marque` = '".$vehicule['nom_marque']."' 
                AND `modeles`.`id_modele` = '".$vehicule['nom_modele']."'";
                $result2 = mysqli_query($GLOBALS['Database'], $requete2) or die;
            } 
                if($data2 = mysqli_fetch_array($result2)){ 
                $marque = $data2['nom_marque'];  
                $modele = $data2['nom_modele'];
                $html .= '<tr>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$interv.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$marque.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$modele.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs">'.$immat.'</th>
                            <th class="border border-y-slate-700 py-2 text-xs"><a type="btn" onclick="interventionNonOk('.$interv.');" class="underline text-blue-600" href="../templates\facturation.php">Non terminée</a></th>
                        </tr>';
                $status = 2;
                }
            }              
        echo json_encode(array("status" => $status, "msg" => $msg, "html" => $html ));
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
                $html_marque .= '<option class="border border-y-slate-700" value="'.$marque['id_marque'].'">'.$marque['nom_marque'].'</option>';
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


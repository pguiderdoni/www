<?php


class HTML
{
	


	public static function changePassword($data){

		$html = "
			<form action='javascript:changePassword();'>
				<input type='hidden' id='user' value='".$data."'>
				<label>Nouveau mot de passe</label>
				<input type='password' id='new_password'>
				<input type='submit' value='Enregistrer'/>
			</form>";

		return $html;
	}


	public static function secondAuth($data){

		$html = "
			<form action='javascript:secondAuth();'>
				<input type='hidden' id='user' value='".$data."'>
				<label>Code SMS</label>
				<input type='text' id='sms'>
				<input type='submit' value='Enregistrer'/>
			</form>";

		return $html;
	}


	public static function displayPage($data){

		if($data['type'] == "prof"){
			$html = "<a href='/aflokkat4/liststudent.php'>Liste Etudiant</a>";
		}else{
			$html = "<a href='/aflokkat4/listprof.php'>Liste Prof</a>";
		}

		$html .= "<button> Deconnexion</button>";

		return $html;
	}


}

<?php


class User
{
	
	private $id;


	private $login;

	
	private $mail;


	private $pass;


	private $pass_end;

	private $type;

	private $hash;

	public function __construct($id){

		$this->id = $id;  

		$this->getFromDatabase();
		
	}

	public function getId(){
		return $this->id;
	}


	public function setId($id){
		$this->id = $id;
	}


	public function getLogin(){
		return $this->login;
	}


	public function setLogin($login){
		$this->login = $login;
	}

	public function getMail(){
		return $this->mail;
	}


	public function setMail($mail){
		$this->mail = $mail;
	}

	public function getPass(){
		return $this->pass;
	}

	public function setPass($pass){
		$this->pass = $pass;
	}

	public function getPassEnd(){
		return $this->pass_end;
	}

	public function setPassEnd($pass_end){
		$this->pass_end = $pass_end;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getHash(){
		return $this->hash;
	}

	public function setHash($hash){
		$this->hash = $hash;
	}

	private function getFromDatabase(){

        $requete = "SELECT * FROM `user` WHERE `id` = '". mysqli_real_escape_string($GLOBALS['database'],$this->id) ."'";
        
        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {

			$this->login = $data['login'];

			$this->mail = $data['mail'];

			$this->pass = $data['pass'];

			$this->pass_end = $data['pass_end'];

			$this->type = $data['type'];

			$this->hash = $data['hash'];
			
        } 
	}


	public static function isExist($data){

		$is_exist = false;

        $requete = "SELECT * 
		FROM `user` 
		WHERE `login` = '". mysqli_real_escape_string($GLOBALS['database'],$data['pseudo']) ."'
		AND `mail` = '". mysqli_real_escape_string($GLOBALS['database'],$data['email']) ."'";
        
        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {

			$is_exist = true;
			
        } 

		return $is_exist;
	}

	public static function getUserByLogin($login){

		$response = array();

        $requete = "SELECT * 
		FROM `user` 
		WHERE `login` = '". mysqli_real_escape_string($GLOBALS['database'],$login) ."'";
        
        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {

			$response = $data;
			
        } 

		return $response;
	}

	public static function getUserByMail($mail){

		$response = 0;

        $requete = "SELECT * 
		FROM `user` 
		WHERE `mail` = '". mysqli_real_escape_string($GLOBALS['database'],$mail) ."'";
        
        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {

			$response = $data['id'];
			
        } 

		return $response;
	}


	public static function connect($email, $pass){

		$connect = array();

		$pass_crypt = sha1($pass);

        $requete = "SELECT * 
		FROM `user` 
		WHERE `mail` = '". mysqli_real_escape_string($GLOBALS['database'],$email) ."'
		AND `pass` = '". mysqli_real_escape_string($GLOBALS['database'],$pass_crypt) ."'";

        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {


        	$connect = $data;
			
        }else{

        	$requete = "INSERT INTO `log_password` ( `mail` ) VALUES ('". mysqli_real_escape_string($GLOBALS['database'],$email) ."')";

        	mysqli_query($GLOBALS['database'], $requete) or die;

        }

		return $connect;
	}

	public static function checkBan($email){

		$ban = false;

        $requete = "SELECT COUNT(*) as `nb` 
		FROM `log_password` 
		WHERE `mail` = '". mysqli_real_escape_string($GLOBALS['database'],$email) ."'";
        
        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {

			if($data['nb'] >= 3){

				$ban = true;

			}
			
        }

		return $ban;
	}
	

	public static function sms($data){

		$code = rand(1000, 10000);

		$requete = "INSERT INTO `log_sms` ( `user_id`,`code` ) VALUES ('". mysqli_real_escape_string($GLOBALS['database'],$data) ."','". mysqli_real_escape_string($GLOBALS['database'],$code) ."')";

		mysqli_query($GLOBALS['database'], $requete) or die;
		
	}

	public static function email($user_id, $hash){


		$requete = "INSERT INTO `request` ( `user_id`,`hash` ) VALUES ('". mysqli_real_escape_string($GLOBALS['database'],$user_id) ."','". mysqli_real_escape_string($GLOBALS['database'],$hash) ."')";

		mysqli_query($GLOBALS['database'], $requete) or die;
		
	}

	public static function checkHash($user_id, $hash){

		$check = false;

		$requete = "SELECT * 
		FROM `request` 
		WHERE `user_id` = '". mysqli_real_escape_string($GLOBALS['database'],$user_id) ."'
		AND `hash` = '". mysqli_real_escape_string($GLOBALS['database'],$hash) ."'
		AND `state` = '". mysqli_real_escape_string($GLOBALS['database'],0) ."'";

        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        if ($data = mysqli_fetch_assoc($result)) {

			$requete = "UPDATE `request` SET `state`='". mysqli_real_escape_string($GLOBALS['database'],1) ."' WHERE `id`='". $data['id'] ."'";
			
            mysqli_query($GLOBALS['database'], $requete) or die;

        	$check = true;
			
        }

		return $check;
		
	}

	public function register(){

		if ($this->id == 0) {
			
			$requete = "INSERT INTO `user` (`login`, `mail`, `pass`, `pass_end`, `type`, `hash`) VALUES ('". mysqli_real_escape_string($GLOBALS['database'],$this->login) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->mail) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->pass) ."','". mysqli_real_escape_string($GLOBALS['database'],date('Y-').(date('m')+3).'-01') ."','". mysqli_real_escape_string($GLOBALS['database'],$this->type) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->hash) ."')";
			error_log($requete);
			if (mysqli_query($GLOBALS['database'], $requete) or die) {

				$this->id = mysqli_insert_id($GLOBALS['database']);
				
			}
			
		} else {

			$requete = "UPDATE `user` SET `login`='". mysqli_real_escape_string($GLOBALS['database'],$this->login) ."', `mail`='". mysqli_real_escape_string($GLOBALS['database'],$this->mail) ."', `pass`='". mysqli_real_escape_string($GLOBALS['database'],$this->pass) ."', `pass_end`='". mysqli_real_escape_string($GLOBALS['database'],$this->pass_end) ."', `type`='". mysqli_real_escape_string($GLOBALS['database'],$this->type) ."', `hash`='". mysqli_real_escape_string($GLOBALS['database'],$this->hash) ."' WHERE `id`='". $this->id ."'";
			
            mysqli_query($GLOBALS['database'], $requete) or die;
		}
	}

}

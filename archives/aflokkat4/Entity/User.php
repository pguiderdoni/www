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

	/**
	 * Get the user primary key
	 *
	 * @return int
	*/
	public function getId(){
		return $this->id;
	}


	/**
	 * Set the user primary key
	 *
	 * @param int $id 
	 *
  	 * @return void	
	*/
	public function setId($id){
		$this->id = $id;
	}

	/**
	 * Get the user login
	 *
	 * @return string
	*/
	public function getLogin(){
		return $this->login;
	}

	/**
	 * Set the user login
	 *
	 * @param string $login 
	 *
  	 * @return void	
	*/
	public function setLogin($login){
		$this->login = $login;
	}

	/**
	 * Get the user mail
	 *
	 * @return string
	*/
	public function getMail(){
		return $this->mail;
	}

	/**
	 * Set the user mail
	 *
	 * @param string $mail 
	 *
  	 * @return void	
	*/
	public function setMail($mail){
		$this->mail = $mail;
	}

	/**
	 * Get the user pass
	 *
	 * @return string
	*/
	public function getPass(){
		return $this->pass;
	}

	/**
	 * Set the user pass
	 *
	 * @param string $pass 
	 *
  	 * @return void	
	*/
	public function setPass($pass){
		$this->pass = $pass;
	}

	/**
	 * Get the user pass
	 *
	 * @return string
	*/
	public function getPassEnd(){
		return $this->pass_end;
	}

	/**
	 * Set the user pass
	 *
	 * @param string $pass 
	 *
  	 * @return void	
	*/
	public function setPassEnd($pass_end){
		$this->pass_end = $pass_end;
	}

	/**
	 * Get the user pass
	 *
	 * @return string
	*/
	public function getType(){
		return $this->type;
	}

	/**
	 * Set the user pass
	 *
	 * @param string $pass 
	 *
  	 * @return void	
	*/
	public function setType($type){
		$this->type = $type;
	}


	/**
	 * Get the user pass
	 *
	 * @return string
	*/
	public function getHash(){
		return $this->hash;
	}

	/**
	 * Set the user pass
	 *
	 * @param string $pass 
	 *
  	 * @return void	
	*/
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

	public function register(){

		if ($this->id == 0) {
			
			$requete = "INSERT INTO `user` (`login`, `mail`, `pass`, `pass_end`, `type`, `hash`) VALUES ('". mysqli_real_escape_string($GLOBALS['database'],$this->login) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->mail) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->pass) ."','". mysqli_real_escape_string($GLOBALS['database'],date('Y-').(date('m')+3).date('-d')) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->type) ."','". mysqli_real_escape_string($GLOBALS['database'],$this->hash) ."')";

			if (mysqli_query($GLOBALS['database'], $requete) or die) {

				$this->id = mysqli_insert_id($GLOBALS['database']);
				
			}
			
		} else {

			$requete = "UPDATE `user` SET `login`='". mysqli_real_escape_string($GLOBALS['database'],$this->login) ."', `mail`='". mysqli_real_escape_string($GLOBALS['database'],$this->mail) ."', `pass`='". mysqli_real_escape_string($GLOBALS['database'],$this->pass) ."', `pass_end`='". mysqli_real_escape_string($GLOBALS['database'],$this->pass_end) ."', `type`='". mysqli_real_escape_string($GLOBALS['database'],$this->type) ."', `hash`='". mysqli_real_escape_string($GLOBALS['database'],$this->hash) ."' WHERE `id`='". $this->id ."'";
			
            mysqli_query($GLOBALS['database'], $requete) or die;
		}
	}

}

<?php 


$db = new Database();
$GLOBALS['database'] = $db->mysqlConnexion();

class Utilisateur {   

	private $id;
   private $login;
   private $mail; 
	private $password;
	private $prenom;   
	private $nom; 

	 public function __construct($id){ 

    $this->id = 0;

    $requete = "SELECT * FROM `user` WHERE `id` = '".$id."'  ";
        
      $result = mysqli_query($GLOBALS['database'], $requete) or die;

      if ($data = mysqli_fetch_assoc($result)) {

        $this->id = $data['id'];
        $this->login = $data['login'];
        $this->mail = $data['mail'];
    
      }

   

	 }

	public function setNom($nom)  
	{       
		$this->nom = $nom;   
	} 

   public function getNom()   
   {       
   	return $this->nom;   
   } 

	public function setPrenom($prenom)   
	{       
		$this->prenom = $prenom;   
	} 

   public function getPrenom()   
   {       
   	return $this->prenom;   
   } 

   public function setPassword($password)   
	{       
		$this->password = password_hash($password, PASSWORD_BCRYPT);   
	} 

   public function setLogin($login)   
   {       
   		$this->login = $login;   
   } 

   public function getLogin()   
   {       
   		return $this->login;   
   }

   public function getMail()   
   {       
    return $this->mail;   
   } 

   public function getId()   
   {       
    return $this->id;   
   }


   public static function getAllUser()   
   {    
   		$response = array();   
   		$requete = "SELECT * FROM `user` ";
        
        $result = mysqli_query($GLOBALS['database'], $requete) or die;

        while ($data = mysqli_fetch_assoc($result)) {

			$response[] = $data;
			
        }  

        return $response;  
   } 

   public function delete()   
   {    
      $requete = "DELETE FROM `user` WHERE `id` = '".$this->id."' ";
       mysqli_query($GLOBALS['database'], $requete) or die;
  
   }

   public static function create($login, $mail)   
   {    
      $requete = "INSERT INTO `user` (`login`, `mail`) VALUES ('". mysqli_real_escape_string($GLOBALS['database'],$login) ."','". mysqli_real_escape_string($GLOBALS['database'],$mail) ."')";
       mysqli_query($GLOBALS['database'], $requete) or die;
  
   }


   public static function update($login, $mail,$id)   
   {    
      $requete = "UPDATE `user` SET `login`='". mysqli_real_escape_string($GLOBALS['database'],$login) ."', `mail`='". mysqli_real_escape_string($GLOBALS['database'],$mail) ."' WHERE `id`='". $id ."'";

      mysqli_query($GLOBALS['database'], $requete) or die;
  
   }
}
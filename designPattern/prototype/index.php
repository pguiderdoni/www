<?php
include 'database.php';
include 'user.php';

$db = new Database();
$GLOBALS['Database'] = $db->connexion();

$nom = 'Jean-Michel';
$adresse = 'Furiani';
$age = '35';


$user = new User(0);
            $user->setNom($nom);
            $user->setAdresse($adresse);
            $user->setAge($age);
            $id = $user->generate();


$user2 = clone $user;
$user2->setAge(45);
$user2->setNom('Dume');
$user2->generate();
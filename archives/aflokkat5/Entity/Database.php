<?php


class Database
{

    private $db;

    public function __construct(){

        try {

            $this->db = mysqli_connect("localhost", "root", "", "aflokkat5");

		} catch (RuntimeException $e) {

			error_log($e->getMessage());

            exit(0);
        }
    }

    public function mysqlConnexion(){

        return $this->db;
    }
}
<?php
class Database{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "la de siempre con un astrisco al final";
    private $database  = "appsalon"; 
    
    public function getConnection(){	
		try {
	     $conn = new PDO("mysql:host=$this->host;dbname=$this->database",$this->user,$this->password);
		 return $conn;
		} catch (\Throwable $th) {
		  	die("No se a podido conectar a la base de datos: " . $th);
		}	
    }
}
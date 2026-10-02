<?php

namespace Database\MySQLi;

class Connection {

    private static $instance;
    private $connection;

    private function __construct() {
        $this->make_connection();
    }

    public static function getInstance() {

        if(!self::$instance instanceof self)
            self::$instance = new self();

        return self::$instance;

    }

    public function get_database_instance() {
        return $this->connection;
    }

    private function make_connection() {

        $server     =   "127.0.0.1";
        $database   =   "finanzas_personales";
        $username   =   "root";
        $password   =   "";
        
        // Esta es al forma orientada a objetos
        $mysqli = new \mysqli($server, $username, $password, $database);
        
        // Comprobar conexión de manera orientada a objetos
        if ($mysqli->connect_errno)
            die("Falló la conexión: {$mysqli->connect_error}");
        
        // Esto nos ayuda a poder usar cualquier caracter en nuestras consultas
        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $mysqli;
        
    }
    
}






//esta es la procedural
// $mysqli = mysqly_connect($server, $username, $password, $database);

//Comprobar conexion
/*if (!$mysqli) 
    die("Fallo la conexion: " . mysqly_connect_error());
    */


//esta es la forma orientada a objetos
/*$mysqli = new mysqli($server, $username, $password, $database, $port);
//Comprobar conexion de manera orientada a objetos
if($mysqli->connect_errno)
    die("Falló la conexión: {$mysqli->connect_error}");


//Esto nos ayuda a colocar cualquier caracter en nuestras consultas
$setnames = $mysqli->prepare("SET NAMES 'utf8'");
$setnames->execute();

var_dump($setnames);

*/


<?php

$server     =   "127.0.0.1";
$database   =   "finanzas_personales";
$username   =   "root";
$password   =   "";
$port       =   3307;


//esta es la procedural
// $mysqli = mysqly_connect($server, $username, $password, $database);

//Comprobar conexion
/*if (!$mysqli) 
    die("Fallo la conexion: " . mysqly_connect_error());
    */


//esta es la forma orientada a objetos
$mysqli = new mysqli($server, $username, $password, $database, $port);
//Comprobar conexion de manera orientada a objetos
if($mysqli->connect_errno)
    die("Falló la conexión: {$mysqli->connect_error}");


//Esto nos ayuda a colocar cualquier caracter en nuestras consultas
$setnames = $mysqli->prepare("SET NAMES 'utf8'");
$setnames->execute();

var_dump($setnames);


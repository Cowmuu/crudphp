<?php


$servidor="localhost";
$db="crudphp";
$username="root";
$pass="";
$port="3307";

try {
    $conexion =  new PDO("mysql:host=$servidor;dbname=$db;port=$port",$username,$pass);

} catch (Exception $e) {
    echo $e->getMessage();
}


?>
<?php
// Creamos una clase para usarla como objeto más adelante
class Conexion{
    // Las clases existen para agrupar una o muchas funciones
    public function get_conexion(){
        // Creamos las cuatro variables fijas para realizar la conexión
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db   = "proyectoElemental";
        // Creamos la cadena de conexión
        $conexion = new PDO("mysql: host=$host; dbname=$db;", $user, $pass);
        return $conexion;
        // El retorno es para que la conexión se quede activa-mantenga
    }
}


?>
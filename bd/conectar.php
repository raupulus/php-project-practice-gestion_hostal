<?php
//Datos de Conexión
$host="127.0.0.1";
$port="5432";
$user="hostal";
$pass="123456";
$dbname="hostal";

//Función para conectar
function conectar_pg() {
$conexion = pg_connect("
    user=$user,
    password=$pass,
    host=$host,
    port=$port,
    dbname=$bd
") or die( "Error al conectar: ".pg_last_error() );

    return $conexion;
}

//Función para desconectar
function desconectar() {
    pg_close(conectar_pg());
}
?>

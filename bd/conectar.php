<?php
//Datos de Conexión
$host="127.0.0.1";
$port="5432";
$user="hostal";
$pass="123456";
$dbname="hostal";

/**
 * Función para conectar, devuelve el objeto de la conexión
 * @return Object   Devuelve el objeto que contiene la conexión a la BD
 */
function conectar() {
$conexion = pg_connect("
    user=$user,
    password=$pass,
    host=$host,
    port=$port,
    dbname=$bd
") or die( "Error al conectar: ".pg_last_error() );

    return $conexion;
}

/**
 * Función que desconecta la conexión previamente establecida con la BD
 */
function desconectar() {
    pg_close(conectar_pg());
}
?>

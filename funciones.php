<?php
// Importadas funciones
require './bd/conectar.php';
require './bd/consultas.php';

function limpiarPOST(string $cadena): string
{
    return trim(filter_input(INPUT_POST, $cadena));
}

function limpiarGET(string $cadena): string
{
    return trim(filter_input(INPUT_GET, $cadena));
}

function limpiarSalida()
{

}

/**
 * Escapa una cadena correctamente.
 * @param  string $cadena La cadena a escapar
 * @return string         La cadena escapada
 */
function limpiarCadena($cadena): string
{
    return htmlspecialchars($cadena, ENT_QUOTES | ENT_SUBSTITUTE);
}

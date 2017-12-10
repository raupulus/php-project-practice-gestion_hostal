<?php
// Importadas funciones
require './bd/conectar.php';
require './bd/consultas.php';

function limpiarEntrada()
{

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

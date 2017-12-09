<?php

function consulta_clientes_todos()
{
    conectar();
    return $clientes = $pdo->query('SELECT * FROM clientes');
}

function consulta_clientes_con_reserva()
{
    // $clientes = consulta_clientes_todos();
    // Filtrar resultados¿?
    // desconectar();
}

function consulta_clientes_sin_reserva()
{

}

function consulta_clientes_nunca_reservaron()
{

}

function consulta_clientes_fecha_ultima_reserva()
{

}

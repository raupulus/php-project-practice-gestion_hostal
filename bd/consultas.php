<?php

function consulta_clientes_todos()
{
    $pdo = conectar();
    return $clientes = $pdo->query('SELECT * FROM clientes');
}

function consulta_clientes_con_reserva()
{
    $pdo = conectar();
    return $clientes = $pdo->query('SELECT
            clientes.nombre,
            clientes.apellidos,
            clientes.telefono,
            clientes.provincia,
            clientes.ciudad,
            habitaciones.numero as numeros,
            (reservas.fecha_salida - reservas.fecha_entrada) AS dias_reservados,
            reservas.precio as precio
        FROM
            clientes
            JOIN reservas ON clientes.id = reservas.clientes_id
            JOIN habitaciones ON reservas.clientes_id = habitaciones.id
        WHERE reservas.fecha_entrada > CURRENT_DATE
        ORDER BY reservas.fecha_entrada ASC
        ;
    ');
}

function consulta_clientes_sin_reserva()
{
    $pdo = conectar();
    return $clientes = $pdo->query('SELECT
            clientes.nombre,
            clientes.apellidos,
            clientes.telefono,
            clientes.provincia,
            clientes.ciudad
        FROM
            clientes
            LEFT JOIN reservas ON clientes.id = reservas.clientes_id

        EXCEPT

        SELECT
            clientes.nombre,
            clientes.apellidos,
            clientes.telefono,
            clientes.provincia,
            clientes.ciudad
        FROM
            clientes
            LEFT JOIN reservas ON clientes.id = reservas.clientes_id
        WHERE reservas.fecha_entrada > CURRENT_DATE
        ;
    ');
}

function consulta_clientes_nunca_reservaron()
{
    $pdo = conectar();
    return $clientes = $pdo->query('SELECT
            clientes.nombre,
            clientes.apellidos,
            clientes.telefono,
            clientes.provincia,
            clientes.ciudad
        FROM
            clientes
            LEFT JOIN reservas ON clientes.id = reservas.clientes_id
        WHERE (reservas.fecha_entrada IS NULL) AND (reservas.fecha_salida) IS NULL
        ;
    ');
}

function consulta_clientes_fecha_ultima_reserva()
{

}

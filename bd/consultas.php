<?php
/**
 * Devuelve todas las filas de la tabla clientes
 * @return query Devuelve las tuplas con los clientes.
 */
function consulta_clientes_todos()
{
    $pdo = conectar();
    return $clientes = $pdo->query('SELECT * FROM clientes');
}

/**
 * Devuelve todas las filas de clientes que tengan alguna reserva,
 * el número de habitación, los días reservados y el precio de la reserva.
 * @return query Devuelve los clientes, habitación, día y precio
 */
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

/**
 * Devuelve todas las filas de clientes que no tengan reservas
 * @return query Devuelve los clientes sin reserva
 */
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

/**
 * Devuelve los clientes que nunca han realizado una reserva
 * @return query Con clientes que nunca han reservado
 */
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

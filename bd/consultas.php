<?php
/**
 * Devuelve todas las filas de la tabla clientes
 * @param  PDO  $pdo Recibe un objeto que representa la conexión con la BD
 * @return query Devuelve las tuplas con los clientes.
 */
function consulta_clientes_todos($pdo)
{
    return $clientes = $pdo->query('SELECT * FROM clientes');
}

/**
 * Devuelve todas las filas de clientes que tengan alguna reserva,
 * el número de habitación, los días reservados y el precio de la reserva.
 * @param  PDO  $pdo Recibe un objeto que representa la conexión con la BD
 * @return query Devuelve los clientes, habitación, día y precio
 */
function consulta_clientes_con_reserva($pdo)
{
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
 * @param  PDO  $pdo Recibe un objeto que representa la conexión con la BD
 * @return query Devuelve los clientes sin reserva
 */
function consulta_clientes_sin_reserva($pdo)
{
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
 * @param  PDO  $pdo Recibe un objeto que representa la conexión con la BD
 * @return query Con clientes que nunca han reservado
 */
function consulta_clientes_nunca_reservaron($pdo)
{
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

/**
 * Devuelve solo la fecha del último alta de cliente
 * @param  PDO  $pdo Recibe un objeto que representa la conexión con la BD
 * @return DateTime  Objeto creado con la marca de tiempo devuelta
 */
function consulta_clientes_fecha_ultima_alta(PDO $pdo): DateTime
{
    $alta = $pdo->prepare('SELECT max(fecha_alta) AS ultima_alta
                             FROM clientes
                            ;
                        ');
    $alta->execute();
    $alta = $alta->fetchColumn();
    return new DateTime($alta);
}

function consulta_clientes_buscar(PDO $pdo, array $datos)
{
    // TODO →
    $clientes = $pdo->prepare(
        'SELECT *
           FROM clientes
          WHERE lower(nombre) LIKE lower(:nombre)
                AND lower(apellidos) LIKE lower(:apellidos)
                AND lower(dni) LIKE lower(:dni)
                AND telefono::text LIKE :telefono
        ;
    ');

    $nombre = $datos['nombre'];
    $apellidos = $datos['apellidos'];
    $dni = $datos['dni'];
    $telefono = $datos['telefono'];
    $clientes->execute([
        ':nombre' => "%{$nombre}%",
        ':apellidos' => "%{$apellidos}%",
        ':dni' => "%{$dni}%",
        ':telefono' => "%{$telefono}%",
    ]);
    return $clientes->fetchAll();
}

function consulta_reservas_fecha_ultima_reserva($pdo)
{
    // TOFIX → Sin completar
    return $clientes = $pdo->query('SELECT
            max(fecha_reserva) AS ultima_reserva
            FROM reservas
    ;
    ');
}

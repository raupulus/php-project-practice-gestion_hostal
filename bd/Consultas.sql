-----------------------------------------
-- ---     Raúl Caro Pastorino     --- --
--- --                             -- ---
---- - https://github.com/fryntiz/ - ----
--- --                             -- ---
-- ---       www.fryntiz.es        --- --
-----------------------------------------

----------------------------------------
---Reservas que tienen que entrar aún---
----------------------------------------
SELECT
    clientes.nombre,
    clientes.apellidos,
    clientes.telefono,
    reservas.precio,
    habitaciones.numero,
    habitaciones.nombre,
    reservas.fecha_entrada,
    reservas.fecha_salida
FROM
    clientes
    JOIN reservas ON clientes.id = reservas.clientes_id
    JOIN habitaciones ON reservas.clientes_id = habitaciones.id
WHERE reservas.fecha_entrada > CURRENT_DATE
ORDER BY reservas.fecha_entrada ASC;

-------------------------------------
---Reservas que ya se han cumplido---
-------------------------------------
SELECT
    clientes.nombre,
    clientes.apellidos,
    clientes.telefono,
    reservas.precio,
    habitaciones.numero,
    habitaciones.nombre,
    reservas.fecha_entrada,
    reservas.fecha_salida
FROM
    clientes
    JOIN reservas ON clientes.id = reservas.clientes_id
    JOIN habitaciones ON reservas.clientes_id = habitaciones.id
WHERE reservas.fecha_entrada < CURRENT_DATE
ORDER BY reservas.fecha_entrada ASC;

---------------------------
---Clientes con Reservas--- CREAR VISTA!!!!!!!!!!!!!!!!
---------------------------
SELECT
    clientes.nombre,
    clientes.apellidos,
    clientes.telefono,
    clientes.provincia,
    clientes.ciudad,
    habitaciones.numero,
    (reservas.fecha_salida - reservas.fecha_entrada) AS dias_reservados,
    reservas.precio
FROM
    clientes
    JOIN reservas ON clientes.id = reservas.clientes_id
    JOIN habitaciones ON reservas.clientes_id = habitaciones.id
WHERE reservas.fecha_entrada > CURRENT_DATE
ORDER BY reservas.fecha_entrada ASC;

---------------------------
---Clientes sin Reservas--- CREAR VISTA!!!!!!!!!!!!!!!!
---------------------------
SELECT
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

--------------------------------------
---Clientes que nunca ha reservado---  CREAR VISTA!!!!!!!!!!!!!!!!
--------------------------------------
SELECT
    clientes.nombre,
    clientes.apellidos,
    clientes.telefono,
    clientes.provincia,
    clientes.ciudad
FROM
    clientes
    LEFT JOIN reservas ON clientes.id = reservas.clientes_id
WHERE (reservas.fecha_entrada IS NULL) AND (reservas.fecha_salida) IS NULL;

--------------------------
---MOSTRAR HABITACIONES---  CREAR VISTA!!!!!!!!!!!!!!!!
--------------------------
SELECT
    habitaciones.numero,
    habitaciones.nombre,
    habitaciones.precio_base,
    habitaciones.descripcion
FROM
    habitaciones
ORDER BY
    habitaciones.numero
;

-------------------------------------
---MOSTRAR HABITACIONES RESERVADAS---  CREAR VISTA!!!!!!!!!!!!!!!!
-------------------------------------
SELECT
    habitaciones.numero,
    habitaciones.nombre,
    (reservas.fecha_salida - reservas.fecha_entrada) AS Dias_Reservados,
    reservas.precio,
    clientes.nombre,
    clientes.telefono
FROM
    habitaciones
    LEFT JOIN reservas ON reservas.habitaciones_id = habitaciones.id
    JOIN clientes ON reservas.clientes_id = clientes.id
;

----------------------------------------------------------
---MOSTRAR HABITACIONES RESERVADAS LOS PRÓXIMOS 10 DÍAS---  CREAR VISTA!!!!!!!!!!!!!!!!
----------------------------------------------------------
SELECT
    habitaciones.numero,
    habitaciones.nombre,
    (reservas.fecha_salida - reservas.fecha_entrada) AS Dias_Reservados,
    reservas.precio,
    reservas.fecha_entrada,
    reservas.fecha_salida,
    clientes.nombre,
    clientes.telefono
FROM
    habitaciones
    LEFT JOIN reservas ON reservas.habitaciones_id = habitaciones.id
    JOIN clientes ON reservas.clientes_id = clientes.id
WHERE
    (
        (reservas.fecha_entrada <= CURRENT_DATE)
        AND
        (reservas.fecha_salida >= CURRENT_DATE)
    )
    OR
    (
        (reservas.fecha_entrada >= CURRENT_DATE)
        AND
        (reservas.fecha_entrada <= (CURRENT_DATE - 10))
    )
    OR
    (
        (reservas.fecha_salida >= CURRENT_DATE)
        AND
        (reservas.fecha_salida <= (CURRENT_DATE - 10))
    )
ORDER BY reservas.fecha_entrada, Dias_Reservados
;

-------------------------------------
---MOSTRAR RESERVAS PARA EL FUTURO---  CREAR VISTA!!!!!!!!!!!!!!!!
-------------------------------------
SELECT
    habitaciones.numero,
    habitaciones.nombre,
    (reservas.fecha_salida - reservas.fecha_entrada) AS Dias_Reservados,
    reservas.precio,
    reservas.fecha_entrada,
    reservas.fecha_salida,
    clientes.nombre,
    clientes.telefono
FROM
    habitaciones
    LEFT JOIN reservas ON reservas.habitaciones_id = habitaciones.id
    JOIN clientes ON reservas.clientes_id = clientes.id
WHERE
    (
        (reservas.fecha_entrada <= CURRENT_DATE)
        AND
        (reservas.fecha_salida >= CURRENT_DATE)
    )
    OR
    (
        (reservas.fecha_entrada >= CURRENT_DATE)
        AND
        (reservas.fecha_salida >= CURRENT_DATE)
    )
ORDER BY reservas.fecha_entrada, Dias_Reservados
;

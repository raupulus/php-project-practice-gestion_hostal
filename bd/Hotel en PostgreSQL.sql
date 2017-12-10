-----------------------------------------
-- ---     Raúl Caro Pastorino     --- --
--- --                             -- ---
---- - https://github.com/fryntiz/ - ----
--- --                             -- ---
-- ---       www.fryntiz.es        --- --
-----------------------------------------


--------------------------------
---Crear Base de Datos hostal---
--------------------------------
/*
#Se recomienda la contraseña "hostal":
sudo -u postgres createuser -P hostal
sudo -u postgres createdb hostal
sudo -u postgres psql -l
*/

--------------------------
---Crear Tabla Clientes---
--------------------------
DROP TABLE IF EXISTS clientes CASCADE; --Elimina la tabla si existiera
CREATE TABLE clientes (
    id            BIGSERIAL CONSTRAINT pk_clientes PRIMARY KEY
    , nombre      VARCHAR(255)
    , apellidos   VARCHAR(255)
    , dni         VARCHAR(255)
    , sexo        VARCHAR(255)
    , fecha_naci  DATE
    , pais        VARCHAR(255)
    , provincia   VARCHAR(255)
    , ciudad      VARCHAR(255)
    , cod_postal  NUMERIC(30)
    , direccion   VARCHAR(255)
    , telefono    NUMERIC(30)
    , observacion TEXT
);


--------------------------------------
---Insertar Datos en tabla Clientes---
--------------------------------------
INSERT INTO clientes (
    nombre,apellidos,dni,sexo,
    fecha_naci,pais,provincia,ciudad,cod_postal,
    direccion,telefono,
    observacion)

    VALUES
        (
        'Pepe', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','Dos Hermanas', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Ana', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'Trebujena', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        ),

        (
        'Juan', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','SEVILLA', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Josefa', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'CADIZ', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        ),

        (
        'Marcos', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','SEVILLA', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Susana', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'CADIZ', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        ),

        (
        'Ramon', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','SEVILLA', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Elena', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'CADIZ', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        ),

        (
        'Victor', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','SEVILLA', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Casandra', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'CADIZ', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        ),

        (
        'Eduardo', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','SEVILLA', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Pamela', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'CADIZ', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        ),

        (
        'Melchor', 'Martinez Gallego', '41021318D', 'HOMBRE',
        '01-04-1934', 'ESPAÑA', 'SEVILLA','SEVILLA', 42323,
        'Calle Inventada nº14, Bloque A', 621322123,
        'Es un buen cliente, cuidadoso, amable y paga por adelantado'
        ),

        (
        'Sabrina', 'Muñoz Alacarta', '51021318D', 'MUJER',
        '05-09-1966', 'ESPAÑA', 'CADIZ', 'CADIZ', 22723,
        'Calle Inventada nº13, Bloque A', 661622123,
        'No he tratado con ella'
        )
;

------------------------------
---Crear Tabla habitaciones---
------------------------------
DROP TABLE IF EXISTS habitaciones CASCADE; --Elimina la tabla si existiera
CREATE TABLE habitaciones (
    id              BIGSERIAL CONSTRAINT pk_habitaciones PRIMARY KEY
    , numero        NUMERIC(30)
    , descripcion   TEXT
    , precio_base   DECIMAL(12,2)
    , nombre        VARCHAR(255)
);

------------------------------------------
---Insertar Datos en tabla habitaciones---
------------------------------------------
INSERT INTO habitaciones (
    numero
    , descripcion
    , precio_base,nombre)

    VALUES
        (
        1
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        2
        , 'Habitación con dos camas'
        , 21, 'Habitación Triple'
        ),

        (
        3
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        4
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        5
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        6
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        7
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        8
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        9
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        ),

        (
        10
        , 'Habitación con dos camas'
        , 68, 'Habitación Doble'
        )
;

--------------------------
---Crear Tabla Reservas---
--------------------------
DROP TABLE IF EXISTS reservas CASCADE; --Elimina la tabla si existiera
CREATE TABLE reservas (
    habitaciones_id    BIGINT
                       CONSTRAINT fk_reservas_habitaciones
                       REFERENCES habitaciones(id)
    , fecha_entrada      DATE
    , fecha_salida       DATE
    , clientes_id        BIGINT
                       CONSTRAINT fk_reservas_clientes
                       REFERENCES clientes(id)
    , precio             DECIMAL(12,2)
    , observacion        TEXT

    , CONSTRAINT pk_reservas PRIMARY KEY (habitaciones_id, fecha_entrada, fecha_salida)
);

--------------------------------------
---Insertar Datos en tabla reservas---
--------------------------------------
INSERT INTO reservas (
    habitaciones_id
    , fecha_entrada, fecha_salida
    , clientes_id, precio
    , observacion
)

    VALUES
        (
        1
        , '01-09-2016','04-09-2016'
        , 1,251.44
        , 'Se marcharon un día antes de lo previsto'
        ),

        (
        6
        , '15-12-2017','03-09-2018'
        , 4,3200
        , 'Reserva realizada un año antes'
        ),

        (
        3
        , CURRENT_DATE,(CURRENT_DATE + 1)
        , 3,134.22
        , 'No hay datos'
        ),

        (
        7
        , (CURRENT_DATE - 6),(CURRENT_DATE + 22)
        , 5,1231.12
        , 'No hay datos'
        ),

        (
        10
        , (CURRENT_DATE - 1),(CURRENT_DATE + 5)
        , 9,399.21
        , 'No hay datos'
        )
;

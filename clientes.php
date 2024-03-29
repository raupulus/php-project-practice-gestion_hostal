<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Administración Hotel</title>
        <?php //Metaetiquetas globales importadas
            require ('metaetiquetas-generales.php');
        ?>
        <meta name='revised' content='Tuesday, February 13th, 2017, 13:22 pm' /><!--Última revisión del sitio-->
    </head>

    <body>
        <?php
            require ('funciones.php');
            require ('header.php');
            $pdo = conectar();
            $fecha = consulta_clientes_fecha_ultima_alta($pdo);
        ?>

        <div id="cajaContenido">
            <div id="cajaEntradas">
                <article>
                    <header>
                        <h2>CLIENTES</h2>
                        <P>Detalles de clientes registrados</P>
                        <time datetime="<?= $fecha->format('d-m-Y H:i:s O'); ?>">
                            <small>
                                Último cliente registrado →
                                <?= $fecha->format('d-m-Y H:i:s'); ?>
                            </small>
                        </time>
                    </header>

                    <div class="agregar" onClick="location.href = 'form-clientes.php'">
                        +Nuevo Cliente
                    </div>

                    <div class="agregar mostrarBuscar">
                        Buscar Cliente
                    </div>

                    <div>
                        <form action="clientes.php" method="post">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" type="search" name="nombre"
                                   value="<?= limpiarPOST('nombre') ?>" />

                            <label for="apellidos">Apellidos</label>
                            <input id="apellidos" type="search" name="apellidos"
                                   value="<?= limpiarPOST('apellidos') ?>" />

                            <br /><br />

                            <label for="dni">DNI</label>
                            <input id="dni" type="search" name="dni"
                                   value="<?= limpiarPOST('dni') ?>" />

                            <label for="telefono">Teléfono</label>
                            <input id="telefono" type="search" name="telefono"
                                   value="<?= limpiarPOST('telefono') ?>" />

                            <input type="submit" value="Buscar" />
                        </form>
                    </div>

                    <?php
                        if (!empty($_POST)):
                            $datos = [
                                'nombre'=>limpiarPOST('nombre'),
                                'apellidos'=>trim(filter_input(INPUT_POST, 'apellidos')),
                                'dni'=>trim(filter_input(INPUT_POST, 'dni')),
                                'telefono'=>trim(filter_input(INPUT_POST, 'telefono')),
                            ];
                    ?>
                        <section>
                            <h3>Resultado de la búsqueda</h3>
                            <P>Las coincidencias con la búsqueda son:</P>
                            <table>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Teléfono</th>
                                    <th>Provincia</th>
                                    <th>Ciudad</th>
                                    <th>Tiene Reservas</th>
                                </tr>

                                <?php
                                    $clientes = consulta_clientes_buscar($pdo, $datos);
                                    foreach ($clientes as $key => $value):
                                ?>
                                        <tr>
                                            <td><?= $value['nombre'] ?></td>
                                            <td><?= $value['apellidos'] ?></td>
                                            <td><?= $value['telefono'] ?></td>
                                            <td><?= $value['provincia'] ?></td>
                                            <td><?= $value['ciudad'] ?></td>
                                            <td></td>
                                        </tr>
                                <?php
                                    endforeach;
                                ?>
                            </table>
                        </section>
                    <?php
                    else:
                    ?>

                    <section>
                        <h3>Con reserva en este momento</h3>
                        <P>Clientes que tienen reserva</P>
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                                <th>Nº Habitación</th>
                                <th>Días</th>
                                <th>Precio</th>
                            </tr>

                            <?php
                                $clientes = consulta_clientes_con_reserva($pdo);
                                foreach ($clientes as $key => $value):
                            ?>
                                    <tr>
                                        <td><?= $value['nombre'] ?></td>
                                        <td><?= $value['apellidos'] ?></td>
                                        <td><?= $value['telefono'] ?></td>
                                        <td><?= $value['provincia'] ?></td>
                                        <td><?= $value['ciudad'] ?></td>
                                        <td><?= $value['numeros'] ?></td>
                                        <td><?= $value['dias_reservados'] ?></td>
                                        <td><?= $value['precio'] ?></td>
                                    </tr>
                            <?php
                                endforeach;
                            ?>
                        </table
                    </section>

                    <section>
                        <h3>Sin reserva en este momento</h3>
                        <P>Clientes que tienen no tienen reserva</P>
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                            </tr>

                            <?php
                                $clientes = consulta_clientes_sin_reserva($pdo);
                                foreach ($clientes as $key => $value):
                            ?>
                                    <tr>
                                        <td><?= $value['nombre'] ?></td>
                                        <td><?= $value['apellidos'] ?></td>
                                        <td><?= $value['telefono'] ?></td>
                                        <td><?= $value['provincia'] ?></td>
                                        <td><?= $value['ciudad'] ?></td>
                                    </tr>
                            <?php
                                endforeach;
                            ?>
                        </table>
                    </section>

                    <section>
                        <h3>Clientes que nunca han reservados</h3>
                        <P>Clientes que no han creado nunca una reserva</P>
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                            </tr>

                            <?php
                                $clientes = consulta_clientes_nunca_reservaron($pdo);
                                foreach ($clientes as $key => $value):
                            ?>
                                    <tr>
                                        <td><?= $value['nombre'] ?></td>
                                        <td><?= $value['apellidos'] ?></td>
                                        <td><?= $value['telefono'] ?></td>
                                        <td><?= $value['provincia'] ?></td>
                                        <td><?= $value['ciudad'] ?></td>
                                    </tr>
                            <?php
                                endforeach;
                            ?>
                        </table>
                    </section>

                    <section>
                        <h3>Todos los clientes</h3>
                        <P>Tablas con todos los clientes existentes</P>
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                            </tr>
                            <?php
                                $clientes = consulta_clientes_todos($pdo);
                                foreach ($clientes as $key => $value):
                            ?>
                                    <tr>
                                        <td><?= $value['nombre'] ?></td>
                                        <td><?= $value['apellidos'] ?></td>
                                        <td><?= $value['telefono'] ?></td>
                                        <td><?= $value['provincia'] ?></td>
                                        <td><?= $value['ciudad'] ?></td>
                                    </tr>
                            <?php
                                endforeach;
                            ?>
                        </table>
                    </section>
                </article>

                <?php
                    endif;
                ?>
            </div>

        <?php require ('aside.php'); ?>
        </div>
        <?php require ('footer.php'); ?>
    </body>
</html>

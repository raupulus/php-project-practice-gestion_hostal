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
        ?>

        <div id="cajaContenido">
            <div id="cajaEntradas">
                <article>
                    <header>
                        <h2>CLIENTES</h2>
                        <P>Detalles de clientes registrados</P>
                        <time datetime="2017-02-14T01:20:00+01:00"><small>Último cliente registrado 14-02-2017 a las 01:20</small></time>
                    </header>

                    <div class="agregar" onClick="location.href = 'form-clientes.php'">
                        +Nuevo Cliente
                    </div>

                    <div class="agregar mostrarBuscar" onClick="document.getElementById('buscar').style.display = 'block';">
                        Buscar Cliente
                    </div>

                    <div id="buscar">
                        <FORM>
                            <input type="button" value="Buscar" onClick="document.getElementById('busqueda').style.display = 'block';"/>
                            Nombre <input type="search" />
                            Apellidos <input type="search" />
                            <BR /><BR />
                            DNI <input type="search" />
                            Teléfono <input type="search" />
                        </FORM>
                    </div>

                    <section id="busqueda"><!--No se muestra hasta que se pulsa buscar-->
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
                        </table>
                    </section>

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
                                $clientes = consulta_clientes_con_reserva();
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

                            <!--Temporal para diseño, esta parte se llena con la BD-->
                            <tr>
                                <td>Pepe</td>
                                <td>Mero Calistro</td>
                                <td>612123123</td>
                                <td>Cádiz</td>
                                <td>Chipiona</td>
                            </tr>
                            <tr>
                                <td>Ana</td>
                                <td>Corneta Quemada</td>
                                <td>6987987</td>
                                <td>Sevilla</td>
                                <td>Dos Hermanas</td>
                            </tr>
                            <!--Fin de la parte temporal-->

                            <?php

                            ?>
                        </table>
                    </section>

                    <section>
                        <h3>Clientes que nunca han reservados</h3>
                        <P>Clientes que no han creado nuna una reserva</P>
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Provincia</th>
                                <th>Ciudad</th>
                            </tr>

                            <!--Temporal para diseño, esta parte se llena con la BD-->
                            <tr>
                                <td>Pepe</td>
                                <td>Mero Calistro</td>
                                <td>612123123</td>
                                <td>Cádiz</td>
                                <td>Chipiona</td>
                            </tr>
                            <tr>
                                <td>Ana</td>
                                <td>Corneta Quemada</td>
                                <td>6987987</td>
                                <td>Sevilla</td>
                                <td>Dos Hermanas</td>
                            </tr>
                            <!--Fin de la parte temporal-->
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
                                $clientes = consulta_clientes_todos();
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
            </div>

        <?php require ('aside.php'); ?>
        </div>
        <?php require ('footer.php'); ?>
    </body>
</html>

<!DOCTYPE html>
<HTML lang="es">
    <HEAD>
        <TITLE>Administración Hotel</TITLE>
        <?php //Metaetiquetas globales importadas
            require ('metaetiquetas-generales.php');
        ?>
        <META name='revised' content='Tuesday, February 13th, 2017, 13:22 pm' /><!--Última revisión del sitio-->
    </HEAD>

    <BODY>
        <?php
            require ('funciones.php');
            require ('header.php');
        ?>

        <DIV id="cajaContenido">
            <DIV id="cajaEntradas">
                <ARTICLE>
                    <HEADER>
                        <H2>CLIENTES</H2>
                        <P>Detalles de clientes registrados</P>
                        <TIME datetime="2017-02-14T01:20:00+01:00"><SMALL>Último cliente registrado 14-02-2017 a las 01:20</SMALL></TIME>
                    </HEADER>

                    <DIV class="agregar" onClick="location.href = 'form-clientes.php'">
                        +Nuevo Cliente
                    </DIV>

                    <DIV class="agregar mostrarBuscar" onClick="document.getElementById('buscar').style.display = 'block';">
                        Buscar Cliente
                    </DIV>

                    <DIV id="buscar">
                        <FORM>
                            <INPUT type="button" value="Buscar" onClick="document.getElementById('busqueda').style.display = 'block';"/>
                            Nombre <INPUT type="search" />
                            Apellidos <INPUT type="search" />
                            <BR /><BR />
                            DNI <INPUT type="search" />
                            Teléfono <INPUT type="search" />
                        </FORM>
                    </DIV>

                    <SECTION id="busqueda"><!--No se muestra hasta que se pulsa buscar-->
                        <H3>Resultado de la búsqueda</H3>
                        <P>Las coincidencias con la búsqueda son:</P>
                        <TABLE>
                            <TR>
                                <TH>Nombre</TH>
                                <TH>Apellidos</TH>
                                <TH>Teléfono</TH>
                                <TH>Provincia</TH>
                                <TH>Ciudad</TH>
                                <TH>Tiene Reservas</TH>
                            </TR>
                        </TABLE>
                    </SECTION>

                    <SECTION>
                        <H3>Con reserva en este momento</H3>
                        <P>Clientes que tienen reserva</P>
                        <table>
                            <TR>
                                <TH>Nombre</TH>
                                <TH>Apellidos</TH>
                                <TH>Teléfono</TH>
                                <TH>Provincia</TH>
                                <TH>Ciudad</TH>
                                <TH>Nº Habitación</TH>
                                <TH>Días</TH>
                                <TH>Precio</TH>
                            </TR>

                            <?php
                                $clientes = consulta_clientes_con_reserva();
                                foreach ($clientes as $key => $value):
                            ?>
                                    <TR>
                                        <TD><?= $value['nombre'] ?></TD>
                                        <TD><?= $value['apellidos'] ?></TD>
                                        <TD><?= $value['telefono'] ?></TD>
                                        <TD><?= $value['provincia'] ?></TD>
                                        <TD><?= $value['ciudad'] ?></TD>
                                        <TD><?= $value['numeros'] ?></TD>
                                        <TD><?= $value['dias_reservados'] ?></TD>
                                        <TD><?= $value['precio'] ?></TD>
                                    </TR>
                            <?php
                                endforeach;
                            ?>
                        </table
                    </SECTION>

                    <SECTION>
                        <H3>Sin reserva en este momento</H3>
                        <P>Clientes que tienen no tienen reserva</P>
                        <TABLE>
                            <TR>
                                <TH>Nombre</TH>
                                <TH>Apellidos</TH>
                                <TH>Teléfono</TH>
                                <TH>Provincia</TH>
                                <TH>Ciudad</TH>
                            </TR>

                            <!--Temporal para diseño, esta parte se llena con la BD-->
                            <TR>
                                <TD>Pepe</TD>
                                <TD>Mero Calistro</TD>
                                <TD>612123123</TD>
                                <TD>Cádiz</TD>
                                <TD>Chipiona</TD>
                            </TR>
                            <TR>
                                <TD>Ana</TD>
                                <TD>Corneta Quemada</TD>
                                <TD>6987987</TD>
                                <TD>Sevilla</TD>
                                <TD>Dos Hermanas</TD>
                            </TR>
                            <!--Fin de la parte temporal-->

                            <?php

                            ?>
                        </TABLE>
                    </SECTION>

                    <SECTION>
                        <H3>Clientes que nunca han reservados</H3>
                        <P>Clientes que no han creado nuna una reserva</P>
                        <TABLE>
                            <TR>
                                <TH>Nombre</TH>
                                <TH>Apellidos</TH>
                                <TH>Teléfono</TH>
                                <TH>Provincia</TH>
                                <TH>Ciudad</TH>
                            </TR>

                            <!--Temporal para diseño, esta parte se llena con la BD-->
                            <TR>
                                <TD>Pepe</TD>
                                <TD>Mero Calistro</TD>
                                <TD>612123123</TD>
                                <TD>Cádiz</TD>
                                <TD>Chipiona</TD>
                            </TR>
                            <TR>
                                <TD>Ana</TD>
                                <TD>Corneta Quemada</TD>
                                <TD>6987987</TD>
                                <TD>Sevilla</TD>
                                <TD>Dos Hermanas</TD>
                            </TR>
                            <!--Fin de la parte temporal-->
                        </TABLE>
                    </SECTION>

                    <SECTION>
                        <H3>Todos los clientes</H3>
                        <P>Tablas con todos los clientes existentes</P>
                        <TABLE>
                            <TR>
                                <TH>Nombre</TH>
                                <TH>Apellidos</TH>
                                <TH>Teléfono</TH>
                                <TH>Provincia</TH>
                                <TH>Ciudad</TH>
                            </TR>
                            <?php
                                $clientes = consulta_clientes_todos();
                                foreach ($clientes as $key => $value):
                                ?>
                                    <TR>
                                        <TD><?= $value['nombre'] ?></TD>
                                        <TD><?= $value['apellidos'] ?></TD>
                                        <TD><?= $value['telefono'] ?></TD>
                                        <TD><?= $value['provincia'] ?></TD>
                                        <TD><?= $value['ciudad'] ?></TD>
                                    </TR>
                                <?php
                                endforeach;
                            ?>
                        </TABLE>
                    </SECTION>
                </ARTICLE>
            </DIV>

        <?php require ('aside.php'); ?>
        </DIV>
        <?php require ('footer.php'); ?>
    </BODY>
</HTML>

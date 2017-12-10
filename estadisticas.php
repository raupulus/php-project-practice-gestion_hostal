<!DOCTYPE html>
<HTML lang="es">
    <HEAD>
        <TITLE>Administración Hotel</TITLE>
        <?php //Metaetiquetas globales importadas
                include ('metaetiquetas-generales.php');
            ?>
        <META name='revised' content='Tuesday, February 20th, 2017, 13:10 pm' /><!--Última revisión del sitio-->
    </HEAD>

    <BODY>
        <?php
            require ('funciones.php');
            require ('header.php');
        ?>

        <div id="cajaContenido">
            <div id="cajaEntradas">
                <ARTICLE>
                    <HEADER>
                        <H2>Estadísticas</H2>
                        <P>Detalles sobre el desarrollo de las actividades</P>
                    </HEADER>

                    <SECTION>
                        <H3>Clientes</H3>
                        <P>Detalles sobre los clientes</P>
                        <UL>
                            <LI>Clientes totales</LI>
                            <LI>Añdadidos esta semana</LI>
                            <LI>Añdadidos este mes</LI>
                            <LI>Añadidos el último año</LI>
                        </UL>
                    </SECTION>

                    <SECTION>
                        <H3>Reservas</H3>
                        <P>Detalles sobre las Reservas</P>
                        <UL>
                            <LI>Reservas totales</LI>
                            <LI>Añdadidas esta semana</LI>
                            <LI>Añdadidas este mes</LI>
                            <LI>Añadidas el último año</LI>
                        </UL>
                    </SECTION>

                    <SECTION>
                        <H3>Control de cuentas</H3>
                        <P>Detalles sobre los beneficios</P>
                        <UL>
                            <LI>Ingresos totales</LI>
                            <LI>Ingresos de esta semana</LI>
                            <LI>Ingresos de este mes</LI>
                            <LI>Ingresos del último año</LI>
                        </UL>
                    </SECTION>
                </ARTICLE>
            </div>

        <?php require ('aside.php'); ?>
        </div>
        <?php require ('footer.php'); ?>
    </body>
</html>

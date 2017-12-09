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
            echo    '<DIV id="cajaContenido">';
            echo    '<DIV id="cajaEntradas">';
            require ('contenido.php');
            echo '</DIV>';
            require ('aside.php');
            echo    '</DIV>';
            require ('footer.php');
        ?>
    </BODY>
</HTML>

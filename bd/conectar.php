<?php
/**
 * Función para conectar, devuelve el objeto de la conexión
 * @return PDO          La instancia de la clase PDO que representa la conexión
 * @throws PDOException Si se produce algún error que impide la conexión
 */
function conectar(): PDO
{
    // Datos de Conexión
    $controlador="pgsql"; // pgsql/mysql
    $host="localhost";
    $port="5432";
    $dbname="hostal";
    $user="hostal";
    $pass="hostal";

    try {
        return $conexion = new PDO("
            $controlador:host=$host;
            port=$port;
            dbname=$bd;
            user=$user;
            password=$pass;
            charset=UTF8;
        ");
    } catch (PDOException $e) {
?>
        <h1>Error catastrófico de base de datos: no se puede continuar</h1>
        <p>
            No ha sido posible la conexión con la base de datos
        </p>
<?php
        throw $e;
    }
}

/**
 * Función que desconecta la conexión previamente establecida con la BD
 */
function desconectar()
{
    pg_close(conectar_pg());
}
?>

<?php
/**
*    File        : backend/config/databaseConfig.php
*    Project     : CRUD PHP
*    Author      : Tecnologías Informáticas B - Facultad de Ingeniería - UNMdP
*    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
*    Date        : Mayo 2025
*    Status      : Prototype
*    Iteration   : 3.0 ( prototype )
*/
// Definición de las variables de configuración de la base de datos
$host = "localhost";
$user = "students_user_3";
$password = "12345";
$database = "students_db_3";

// Crea una nueva conexión a la base de datos
$conn = new mysqli($host, $user, $password, $database);

// Verifica si hubo un error al intentar conectarse a la base de datos
if ($conn->connect_error) 
{
    http_response_code(500);
    die(json_encode(["error" => "Database connection failed"]));// Si hay un error, muestra un mensaje en formato JSON
}
?>
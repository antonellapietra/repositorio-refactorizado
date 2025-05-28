<?php
/**
*    File        : backend/controllers/studentsController.php
*    Project     : CRUD PHP
*    Author      : Tecnologías Informáticas B - Facultad de Ingeniería - UNMdP
*    License     : http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
*    Date        : Mayo 2025
*    Status      : Prototype
*    Iteration   : 3.0 ( prototype )
*/

require_once("./models/students.php"); // Se incluye el archivo para manejar los estudiantes en la bd


// Funcion para manejar la solicitud GET - obtencion de datos
function handleGet($conn) 
{
    $input = json_decode(file_get_contents("php://input"), true); //decodifica la solicitud JSON
    
    if (isset($input['id'])) //si se pasa un id
    {
        $student = getStudentById($conn, $input['id']); //obtiene el estudiante con dicho id
        echo json_encode($student); //devuelve los datos en formato JSON
    } 
    else //si no se pasa un id
    {
        $students = getAllStudents($conn); //obtiene todos los estudiantes
        echo json_encode($students); //devuelve una lista de todos estudiantes en formato JSON
    }
}

// Funcion para manejar la solicitud POST - crea nuevo dato
function handlePost($conn) 
{
    $input = json_decode(file_get_contents("php://input"), true);

    $result = createStudent($conn, $input['fullname'], $input['email'], $input['age']); //intenta crear estudiante nuevo en bd
    if ($result['inserted'] > 0) //si se inserta correctamente
    {
        echo json_encode(["message" => "Estudiante agregado correctamente"]);
    } 
    else //si no se inserto correctamente
    {
        http_response_code(500); //establece codigo de respuesta 
        echo json_encode(["error" => "No se pudo agregar"]);
    }
}

// Funcion para manejar la solicitud PUT -actualiza datos existentes
function handlePut($conn) 
{
    $input = json_decode(file_get_contents("php://input"), true);

    $result = updateStudent($conn, $input['id'], $input['fullname'], $input['email'], $input['age']); //intenta actualizar datos
    if ($result['updated'] > 0) 
    {
        echo json_encode(["message" => "Actualizado correctamente"]);
    } 
    else 
    {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo actualizar"]);
    }
}

// Funcion para manejar DELETE -eliminacion de datos
function handleDelete($conn) 
{
    $input = json_decode(file_get_contents("php://input"), true); //intenta eliminar el estudiante con dicho ID

    $result = deleteStudent($conn, $input['id']);
    if ($result['deleted'] > 0) 
    {
        echo json_encode(["message" => "Eliminado correctamente"]);
    } 
    else 
    {
        http_response_code(500);
        echo json_encode(["error" => "No se pudo eliminar"]);
    }
}
?>
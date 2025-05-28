/*VOLVER TODO A CERO, BORRAR BASE DE DATOS Y USUARIO (SE DEBERÍA EJECUTAR COMO ROOT)*/
REVOKE ALL PRIVILEGES, GRANT OPTION FROM 'students_user_3'@'localhost';

-- Elimina la base de datos 'students_db_3' si existe.
DROP USER IF EXISTS 'students_user_3'@'localhost';

-- Elimina la base de datos 'students_db_3' si existe.
DROP DATABASE IF EXISTS students_db_3;
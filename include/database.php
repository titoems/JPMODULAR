<?php

$server   = "127.0.0.1:3307";
$username = "root";
$password = "tecsup";
$database = "planificacion_abril";


$mysqli = new mysqli($server, $username, $password, $database);


if ($mysqli->connect_error) {
    die('error'.$mysqli->connect_error);
}


// segunda coneccion con el servidor 

$server_dos   = "127.0.0.1:3307";
$username_dos = "root";
$password_dos = "tecsup";
$database_dos = "jpingenieria";


$mysqli_dos = new mysqli($server_dos, $username_dos, $password_dos, $database_dos);


if ($mysqli_dos->connect_error) {
    die('error'.$mysqli_dos->connect_error);
}

/* tercera con mi propia reniec */

/*
$server_tres   = "127.0.0.1";
$username_tres = "";
$password_tres = "";
$database_tres = "reniec";


$mysqli_tres = new mysqli($server_tres, $username_tres, $password_tres, $database_tres);


if ($mysqli_tres->connect_error) {
    die('error'.$mysqli_tres->connect_error);
}

*/

?>
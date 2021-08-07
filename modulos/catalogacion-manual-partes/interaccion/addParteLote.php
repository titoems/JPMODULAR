<?php

include "../../../include/database.php";

if ( isset($_POST['parteLote']) ) {

    $parteLote = $_POST['parteLote'];
    $ft = $_POST['tr'];

    $codigo_parte = $parteLote['codigo_parte'];
    $nombre_parte = $parteLote['nombre_parte'];
    $titulo_parte = $parteLote['titulo_parte'];
    $codigo_sap = $parteLote['codigo_sap'];
    $modelo_lote = $parteLote['modelo_lote'];

    $query = "INSERT INTO partes_equipos(codigo_parte_equipo, nombre_parte, titulo_segmento, cod_sap, cod_equipo, ficha_tecnica) 
    VALUES ('$codigo_parte','$nombre_parte','$titulo_parte','$codigo_sap','$modelo_lote','$ft')";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die('Query Failed.');
    }
    echo 'Parte Lote añadido satisfactoriamente.';
}


?>
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

    $query = "UPDATE partes_equipos SET nombre_parte = '$nombre_parte', titulo_segmento = '$titulo_parte', cod_sap = '$codigo_sap', cod_equipo = '$modelo_lote', ficha_tecnica = '$ft'
    WHERE codigo_parte_equipo = '$codigo_parte'";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die('Query Failed.');
    }
    echo 'Parte Lote actualizado satisfactoriamente.';
}
?>
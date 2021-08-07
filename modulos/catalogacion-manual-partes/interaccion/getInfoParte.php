<?php
    include "../../../include/database.php";

    $search = $_POST['search'];
    if(!empty($search)) {
        $result = $mysqli->query("SELECT codigo_parte_equipo, nombre_parte, titulo_segmento, cod_sap, ficha_tecnica, cod_equipo FROM partes_equipos WHERE codigo_parte_equipo LIKE '$search%'");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }        

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'codigo_parte' => $row['codigo_parte_equipo'],
                'nombre_parte' => $row['nombre_parte'],
                'titulo_segmento' => $row['titulo_segmento'],
                'cod_sap' => $row['cod_sap'],
                'ficha_tecnica' => $row['ficha_tecnica'],
                'cod_equipo' => $row['cod_equipo']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
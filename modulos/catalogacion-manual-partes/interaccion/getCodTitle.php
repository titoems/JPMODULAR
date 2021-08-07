<?php
    include "../../../include/database.php";

    $search = $_POST['search'];
    $modelo = $_POST['mod'];
    if(!empty($search)) {
        $result = $mysqli->query("SELECT codigo_parte_equipo, titulo_segmento FROM partes_equipos p WHERE codigo_parte_equipo LIKE '$search%' AND cod_equipo LIKE '$modelo' ");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'codigo_parte' => $row['codigo_parte_equipo'],
                'titulo_segmento' => $row['titulo_segmento']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
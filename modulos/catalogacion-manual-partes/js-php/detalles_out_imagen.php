<?php
    include "../../../include/database.php";

    $search = $_POST['search'];
    if(!empty($search)) {
        $result = $mysqli->query("SELECT e.codigo_equipo, e.estado, e.presion_alta, e.presion_baja, e.frecuencia, e.capacidad, e.refrigerante, e.tipo, e.numero_serie, e.voltaje, e.amperaje, e.tipo_equipo, e.observacion_calefaccion  FROM equipos e WHERE e.modelo LIKE '$search%' ORDER BY e.modelo");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }        

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'nombre' => $row['codigo_equipo'],
                'estado' => $row['estado'],
                'presion_alta' => $row['presion_alta'],
                'presion_baja' => $row['presion_baja'],
                'frecuencia' => $row['frecuencia'],
                'capacidad' => $row['capacidad'],
                'refrigerante' => $row['refrigerante'],
                'tipo' => $row['tipo'],
                'numero_serie' => $row['numero_serie'],
                'voltaje' => $row['voltaje'],
                'amperaje' => $row['amperaje'],
                'tipoEquipo' => $row['tipo_equipo'],
                'observacion' => $row['observacion_calefaccion']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
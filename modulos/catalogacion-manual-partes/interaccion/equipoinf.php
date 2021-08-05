<?php
    include "../../../include/database.php";

    $mod = $_POST['mod'];
    if(!empty($mod)) {
        $result = $mysqli->query("SELECT DISTINCT modelo/* , codigo_equipo, estado, presion_alta, presion_baja, frecuencia, capacidad, refrigerante, tipo, numero_serie, voltaje, amperaje, tipo_equipo */ FROM equipos WHERE modelo LIKE '$mod%' ORDER BY modelo");
        if (!$result) {
            die('Query Error '.mysqli_error($mysqli));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'modelo' => $row['modelo']/* ,
                'nombre' => $row['codigo_equipo'],
                'estado' => $row['estado'],
                'presAlta' => $row['presion_alta'],
                'presBaja' => $row['presion_baja'],
                'frecuencia' => $row['frecuencia'],
                'capacidad' => $row['capacidad'],
                'refrigerante' => $row['refrigerante'],
                'tipo' => $row['tipo'],
                'numero_serie' => $row['numero_serie'],
                'voltaje' => $row['voltaje'],
                'amperaje' => $row['amperaje'],
                'tipo_equipo' => $row['tipo_equipo'] */
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
?>
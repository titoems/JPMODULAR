<?php
    include "../../../include/database.php";

    $search = $_POST['search'];
    if(!empty($search)) {
        $result = $mysqli->query("SELECT e.codigo_equipo, e.estado, e.tipo, e.numero_serie, e.voltaje, e.amperaje, e.tipo_equipo, f.archivo, t.nombre, e.observacion_calefaccion  FROM equipos e, files_upload f, tipo_files t WHERE e.modelo LIKE '$search%' AND f.id_categoria LIKE '$search' AND t.id_tipo_files LIKE f.id_subfile ORDER BY e.modelo LIMIT 1");
        print_r($result);
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }elseif(empty($result)){
            echo '<script>alert('.$result.')<script>';
        }
        

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'nombre' => $row['codigo_equipo'],
                'estado' => $row['estado'],
                'tipo' => $row['tipo'],
                'tipoEquipo' => $row['tipo_equipo'],
                'archivo' => $row['archivo'],
                'tipoArchivo' => $row['nombre'],
                'observacion' => $row['observacion_calefaccion']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
<?php
    include "../../../include/database.php";

    $search = $_POST['search'];

    if(!empty($search)) {
        $result = $mysqli->query("SELECT DISTINCT codigo_equipo, estado, lugar, modelo, marca, cliente FROM equipos WHERE modelo LIKE '$search%' ORDER BY modelo LIMIT 100");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }
        

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'nombre' => $row['codigo_equipo'],
                'estado' => $row['estado'],
                'lugar' => $row['lugar'],
                'modelo' => $row['modelo'],
                'marca' => $row['marca'],
                'cliente' => $row['cliente']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
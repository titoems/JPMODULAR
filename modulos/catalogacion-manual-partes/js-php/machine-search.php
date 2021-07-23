<?php
    include "../../../include/database.php";

    $search = $_POST['search'];

    if(!empty($search)) {
        $result = $mysqli->query("SELECT DISTINCT nombre, estado, lugar, modelo, marca, cliente FROM equipos WHERE modelo LIKE '$search%' ORDER BY modelo LIMIT 100");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }
        

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'nombre' => $row['nombre'],
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
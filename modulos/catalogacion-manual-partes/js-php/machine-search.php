<?php
    include "../../../include/database.php";

    $search = $_POST['search'];

    if(!empty($search)) {
        $result = $mysqli->query("SELECT nombre, estado FROM equipos WHERE nombre LIKE '$search%' ORDER BY nombre LIMIT 100");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'nombre' => $row['nombre'],
                'estado' => $row['estado']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
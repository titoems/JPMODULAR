<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT nombre FROM equipos ORDER BY nombre");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $row['nombre']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT DISTINCT modelo, codigo_equipo FROM equipos ORDER BY codigo_equipo");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'codigo' => $row['codigo_equipo'],
            'modelo' => $row['modelo']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
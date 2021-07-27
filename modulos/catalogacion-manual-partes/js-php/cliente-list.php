<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT DISTINCT modelo, cliente FROM equipos ORDER BY cliente");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'cliente' => $row['cliente'],
            'modelo' => $row['modelo']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
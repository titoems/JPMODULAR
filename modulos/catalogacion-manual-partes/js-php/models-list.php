<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT modelo FROM equipos ORDER BY nombre");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'modelo' => $row['modelo']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
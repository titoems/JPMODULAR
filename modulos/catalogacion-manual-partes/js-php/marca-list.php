<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT DISTINCT marca FROM equipos ORDER BY marca");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'marca' => $row['marca']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
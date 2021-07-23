<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT DISTINCT cliente FROM equipos ORDER BY cliente");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'cliente' => $row['cliente']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
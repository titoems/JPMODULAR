<?php
    include "../../../include/database.php";

    $result = $mysqli->query("SELECT DISTINCT lugar FROM equipos ORDER BY lugar");

    if (!$result) {
        die('Query Failed'. mysqli_error($mysqli));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'lugar' => $row['lugar']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>
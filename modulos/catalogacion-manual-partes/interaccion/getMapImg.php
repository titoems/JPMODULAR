<?php
    include "../../../include/database.php";

    $search = $_POST['search'];
    if(!empty($search)) {
        $result = $mysqli->query("SELECT archivo, mapImg FROM files_upload WHERE archivo LIKE '$search%'");
        if(!$result) {
            die('Query Error '. mysqli_error($mysqli));
        }        

        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'archivo' => $row['archivo'],
                'mapImg' => $row['mapImg']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
    
?>
<?php
    include "../../../include/database.php";

    $elemento = $_GET['elementosS'];
    $columna = strtolower(substr($_GET['selectId'], 6));

    /* if(!empty($columna) and !empty($elemento)){
        
        $pr = $mysqli->prepare("")
    } */


    echo $elemento.' '. $columna;
?>
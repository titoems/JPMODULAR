<?php

    $archivo = $_FILES['archivo']['name'];
    $destino = $_SERVER['DOCUMENT_ROOT'] . '/JPMODULAR/dist/img/equipos/tmp/';

    if (isset($archivo) && $archivo != "") {
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
                     - Se permiten archivos .jpg, .png. y de 200 kb como máximo.</b></div>';
        } else {
            if (move_uploaded_file($temp, $destino . $archivo)) {
                $array = array(
                    "link"  => 'http://localhost/JPMODULAR/dist/img/equipos/tmp/' . $archivo,
                    "nombre"  => $archivo,
                );
                $stringarray = json_encode($array);
                echo $stringarray;
            } else {
                echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
            }
        }
    }

?>
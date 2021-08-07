<?php
include "../../../include/database.php";

if ( isset($_POST['ident']) ) {

    $parteLote = $_POST['ident'];
    $ft = $_POST['templatemap'];

    $query = "UPDATE files_upload SET mapImg = '$ft'
    WHERE archivo = '$parteLote'";
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die('Query Failed.');
    }
    echo 'actualizado satisfactoriamente.';
}
?>
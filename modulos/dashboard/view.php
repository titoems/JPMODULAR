<?php  
date_default_timezone_set('America/Lima');
session_start();
include "../include/setting.php";
include "../include/control.php";
include "../include/funciones.php";

if (@$_GET['module'] == "salir") {

session_destroy();
header('Location: ../inicio');
    
}

if ($_SESSION['id'] == NULL) { 
session_destroy();
header('Location: ../inicio');
} else {
  
require_once "../include/database.php";
$mar = $_SESSION['id'];
$usuario = mysqli_query($mysqli,"SELECT * FROM usuario WHERE id = '$mar' ") or die ("error ".mysqli_error($mysqli));
$u = mysqli_fetch_assoc($usuario);

}
?>

<!DOCTYPE html>
<html lang="es">
<?php include "../include/".$head; ?>
<body class="hold-transition skin-yellow-light sidebar-collapse sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php 
include "../include/menu.php"; 
include "../include/menu1.php";
include $contenido;
include "../include/footer.php";
include "../include/".$footer_contenido;
?>

  
  
<script type="text/javascript">
$(document).on('ready',function(){
  $('#guardar').click(function(){
        var url = "<?= $update ?>";
        $.ajax({                        
           type: "POST",                 
           url: url,
           
           data: $("#frm_comprobanteelectronico").serialize(), 
           success: function(data)             
           {
             $('#respuesta').html(data);               
           }
       });
    });
});
</script>



  <!-- Control Sidebar -->
 </div>
</body>
</html>

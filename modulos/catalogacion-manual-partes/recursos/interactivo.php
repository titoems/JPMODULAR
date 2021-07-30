<style>
   .main-container {
      margin-left: 70px;
      margin-right: 10px;
   }

   .flex-column-div {
      width: 40%;
   }
</style>
<div class="main-container">
   <div class="flex-column-div">
      <div class="form-group">
         <div class="main-container">


            <form action="#" method="POST" enctype="multipart/form-data" />
            Añadir imagen: <input name="archivo" id="archivo" type="file" />
            <input type="submit" name="subir" value="Subir imagen" />
            </form>

            <?php
            //Si se quiere subir una imagen
            if (isset($_POST['subir'])) {
               //Recogemos el archivo enviado por el formulario
               $archivo = $_FILES['archivo']['name'];

               //Ruta de la carpeta destino en servidor
               $destino = $_SERVER['DOCUMENT_ROOT'] . '/JPMODULAR/dist/img/equipos/';

               //Si el archivo contiene algo y es diferente de vacio
               if (isset($archivo) && $archivo != "") {
                  //Obtenemos algunos datos necesarios sobre el archivo
                  $tipo = $_FILES['archivo']['type'];
                  $tamano = $_FILES['archivo']['size'];
                  $temp = $_FILES['archivo']['tmp_name'];
                  //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                  if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                     echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
        - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
                  } else {
                     //Si la imagen es correcta en tamaño y tipo
                     //Se intenta subir al servidor
                     if (move_uploaded_file($temp, $destino . $archivo)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod($destino . $archivo, 0777);
                        //Mostramos el mensaje de que se ha subido co éxito
                        echo '<div><b>Se ha subido correctamente la imagen.</b></div>';
                        //Mostramos la imagen subida
                        echo '<p><img src="http://localhost/JPMODULAR/dist/img/equipos/' . $archivo . '"></p>';
                     } else {
                        //Si no se ha podido subir la imagen, mostramos un mensaje de error
                        echo '<div><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div>';
                     }
                  }
               }
            }
            ?>


         </div>
      </div>
   </div>
</div>
<script src="<?= $direccion ?>js/vendor/jquery-1.11.3.min.js"></script>
<script>
   $(document).ready(function() {
      $('img').click(function(e) {
         var offset = $(this).offset();

         console.log((e.pageX-offset.left)+"   "+(e.pageY-offset.top));

/*          alert(e.pageX - offset.left);
         alert(e.pageY - offset.top); */
      });
   });
</script>
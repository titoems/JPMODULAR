<?php
require_once "../include/head.php";
require_once "../include/database.php";
$codigo_equipo = $mysqli->query("SELECT DISTINCT codigo_equipo FROM equipos");
$marcas = $mysqli->query("SELECT DISTINCT marca FROM equipos");
$clientes = $mysqli->query("SELECT DISTINCT cliente FROM equipos");
$modelo = $mysqli->query("SELECT DISTINCT modelo FROM equipos");
?>
<div class="main-container">
  <div class="main-container-flex">
    <div class="flex-column-div" style="border:1px solid blue;">
      <p>INFORMACION</p>

      <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </nav>


      <div class="form-group col-md-6">
        <label for="selectCodigo">Codigo:</label>
        <select id="selectCodigo" class="form-control">
          <!-- LLENADO POR PHP/AJAX -->
        </select>
      </div>



      <div class="form-group col-md-6">
        <label for="selectMarca">Marca:</label>
        <select type="text" id="selectMarca" class="form-control">
          <option selected></option>
          <?php
          while ($valores = mysqli_fetch_array($marcas)) {
            echo '<option value="' . $valores[marca] . '">' . $valores[marca] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="selectCliente">Cliente:</label>
        <select id="selectCliente" class="form-control">
          <option selected></option>
          <?php
          while ($valores = mysqli_fetch_array($clientes)) {
            echo '<option value="' . $valores[cliente] . '">' . $valores[cliente] . '</option>';
          }
          ?>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="selectModelo">Modelo:</label>
        <select id="selectModelo" class="form-control">
          <option selected></option>
          <?php
          #while ($valores = mysqli_fetch_array($modelo)){
          #  echo '<option value="'.$valores[modelo].'">'.$valores[modelo].'</option>';
          #}
          ?>
        </select>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <div class="flex-column-div1" style="border:1px solid orange;">
        <br>

        <ul id="containerequipos"></ul>

      </div>
    </div>
    <div class="flex-column-div" style="border:1px solid orange;">

      <?php
      $interacciones = '<img src="https://www.sdlgla.com/wp-content/uploads/2018/03/img_paginaproduto_01.jpg" usemap="#image-map">
                          <map name="image-map">
                              <area target="" alt="Cabina" title="Cabina" href="C:\Users\Public\Pictures\JPMODULAR\retroexcabadoracabina.jpg" coords="331,168,328,188,334,197,334,224,318,260,314,293,308,319,322,308,359,305,391,305,421,313,442,335,461,358,476,370,512,368,514,317,513,285,534,279,547,267,526,217,519,187,486,168" shape="poly">
                          </map>';
      echo $interacciones;
      ?>

    </div>
    <div class="flex-column-div" style="border:1px solid purple;">
      <p>Tercera columna</p>
    </div>
  </div>
</div>
<style>
  .main-container {
    margin-left: 50px;
    margin-right: 10px;
  }

  .main-container-flex {
    border: 1px solid red;
    display: flex;
    justify-content: space-between;
  }

  .flex-column-div {
    width: 610px;
  }

  .flex-column-div1 {
    margin-left: 30px;
    margin-right: 50px;
    width: 500px;
  }
</style>
<script src="../js/vendor/jquery-1.11.3.min.js"></script>
<script src="../modulos/catalogacion-manual-partes/js-php/catapp.js"></script>
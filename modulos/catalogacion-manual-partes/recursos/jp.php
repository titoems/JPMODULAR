<?php
?>

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
<div class="main-container">
  <div class="main-container-flex">
    <div class="flex-column-div" style="border:1px solid blue;">
      <p>INFORMACION</p>

      <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
        <?php 

        if (isset($_REQUEST['modelo'])){
          $modelo = $_REQUEST['modelo'];
        ?>
          <input type="text" placeholder="Search" aria-label="Search" class="form-control mr-sm-2" id="search" list="languageList" value=<?=$modelo ?> ><!--your input textbox-->
        <?php
        }else{
        ?>
          <input type="text" placeholder="Search" aria-label="Search" class="form-control mr-sm-2" id="search" list="languageList" ><!--your input textbox-->
        <?php
        }
        ?>
            <datalist id="languageList">
            </datalist>

          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </nav>


      <div class="form-group col-md-6">
        <label for="selectLugar">Lugar:</label>
        <select id="selectLugar" class="form-control">
          <!-- LLENADO POR PHP/AJAX -->
        </select>
      </div>



      <div class="form-group col-md-6">
        <label for="selectMarca">Marca:</label>
        <select type="text" id="selectMarca" class="form-control">
          
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="selectCliente">Cliente:</label>
        <select id="selectCliente" class="form-control">
          
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="selectCodigo">Codigo:</label>
        <select id="selectCodigo" class="form-control">
          <!-- LLENADO POR PHP/AJAX -->
        </select>
      </div>
      <br>
      <div class="flex-column-div1" >
        <ul id="detalles"></ul>
      </div>
    </div>
    <div class="flex-column-div" >

      <?php
      $interacciones = '<img src="https://www.sdlgla.com/wp-content/uploads/2018/03/img_paginaproduto_01.jpg" usemap="#image-map">
                          <map name="image-map">
                              <area target="" alt="Cabina" title="Cabina" href="http://localhost/JPMODULAR/main/lista-equipo/797f" coords="331,168,328,188,334,197,334,224,318,260,314,293,308,319,322,308,359,305,391,305,421,313,442,335,461,358,476,370,512,368,514,317,513,285,534,279,547,267,526,217,519,187,486,168" shape="poly">
                          </map>';
      echo $interacciones;
      ?>

    </div>
  </div>
</div>

<script src="<?=$direccion?>js/vendor/jquery-1.11.3.min.js"></script>
<script src="<?=$direccion?>modulos/catalogacion-manual-partes/js-php/catapp.js"></script>
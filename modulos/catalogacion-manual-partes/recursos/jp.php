<?php
?>

<style>
  .main-container {
    margin-left: 50px;
    margin-right: 10px;
    background-color: #ecf0f5;
  }

  .main-container-flex {

    display: flex;
    justify-content: space-between;
  }

  .flex-column-div {
    width: 40%;
  }

  .flex-column-div1 {
    margin-left: 20px;
    margin-right: 20px;
    width: 35%;
  }
  img {
    object-fit: contain;
      margin-left: 0;
      margin-right: 0;
      width: 100%;
  }
</style>
<div class="main-container">
  <div class="main-container-flex">
    <div class="flex-column-div">
      <p>INFORMACION</p>

      <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
          <?php

          if (isset($_REQUEST['modelo'])) {
            $modelo = $_REQUEST['modelo'];
          ?>
            <input type="text" placeholder="Search" aria-label="Search" class="form-control mr-sm-2" id="search" list="languageList" value=<?= $modelo ?>>
            <!--your input textbox-->
          <?php
          } else {
          ?>
            <input type="text" placeholder="Search" aria-label="Search" class="form-control mr-sm-2" id="search" list="languageList">
            <!--your input textbox-->
          <?php
          }
          ?>
          <datalist id="languageList">
          </datalist>

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

      <!-- LISTADO DE ARCHIVOS EN TABLA -->
      <h6>Archivos de Equipo</h6>
      <div class="flex-column-div1">
        <div class="box-body">
          <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
              <div class="col-sm-6"></div>
              <div class="col-sm-6"></div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                  <thead>
                    <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Motor de renderizado: activar para ordenar la columna descendente">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Nombre</font>
                        </font>
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                        <font style="vertical-align: inherit;">
                          <font style="vertical-align: inherit;">Tipo</font>
                        </font>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="tableArchivos">
                    <tr role="row" class="odd">
                        <td>No archivos</td>
                        <td>Ningun tipo</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <h6>Detalles de Equipos</h6>
      <div class="flex-column-div1">
        <div class="box-body">
          <div id="detallesWraper" class="dataTables_wrapper form-inline dt-bootstrap">
          Ningun Elemento Seleccionado
          </div>
        </div>
      </div>

      <h6>Partes de Equipo</h6>
      <div class="flex-column-div1">
        <div class="box-body">
          <div id="partes_equipo_div" class="dataTables_wrapper form-inline dt-bootstrap">
          Ningun Elemento Seleccionado
          </div>
        </div>
      </div>

    </div>




    <!-- Mostrado de Archivos Dinamicos -->
    <div class='container' >
      <div id="divImg">Ningun Elemento Seleccionado</div>
      <div id="divMapps"></div>

      <?php
      /* $interacciones = '<img src="https://www.sdlgla.com/wp-content/uploads/2018/03/img_paginaproduto_01.jpg" usemap="#image-map">
                          <map name="image-map">
                              <area target="" alt="Cabina" title="Cabina" href="http://localhost/JPMODULAR/main/lista-equipo/797f" coords="331,168,328,188,334,197,334,224,318,260,314,293,308,319,322,308,359,305,391,305,421,313,442,335,461,358,476,370,512,368,514,317,513,285,534,279,547,267,526,217,519,187,486,168" shape="poly">
                          </map>';
      echo $interacciones; */
      ?>

    </div>
  </div>
</div>

<script src="<?= $direccion ?>js/vendor/jquery-1.11.3.min.js"></script>
<script src="<?= $direccion ?>modulos/catalogacion-manual-partes/js-php/catapp.js"></script>
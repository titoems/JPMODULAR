<!DOCTYPE html>
<html lang="es">

<head>
   <style>
      .main-container {
         margin-left: 28px;
         background-color: #ecf0f5;
      }

      #image-map-wrapper {
         padding: 0;
      }

      svg {
         box-sizing: border-box;
         position: absolute;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         height: 100%;
         overflow: hidden;
         width: 100%;
      }

      img {
         z-index: 5;
         padding: 0;
         object-fit: contain;
         margin-left: 0;
         margin-right: 0;
         width: 100%;
      }
   </style>
</head>

<body>




   <div class="main-container">
      <div class="flex-column-div">
         <div class="form-group">
            <div class="main-container">



               <div class="row">
                  <div class="col-md-3">
                     <div class="box box-primary">
                        <div class="box-header with-border">
                           <h3 class="box-title">Nuevo Modelo</h3>
                        </div>
                        <form id="newModuleImage" role="form" action="#" method="POST" enctype="multipart/form-data">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="modeloEquipos">Nombre Modelo:</label>
                                 <input id="modeloequipos" type="text" class="form-control" placeholder="Selecciona un Modelo" list="modelList">
                                 <datalist id="modelList"></datalist>
                              </div>
                              <div class="form-group">
                                 <button type="button" class="btn btn-success btn-lg" id="image-mapper-upload">
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Seleccionar Imagen</font>
                                    </font>
                                 </button>
                                 <input type="file" class="hide" name="archivo" id="image-mapper-file">
                              </div>
                           </div>
                           <div class="form-group">
                              <div id="listFiles" class="list-group">
                              </div>
                           </div>
                           <div class="form-group">

                              <button id="showformAddE" type="button" class="btn btn-info" >Añadir Equipo <span class="glyphicon glyphicon-plus-sign"></span></button>

                           </div>
                           <div class="form-group">

                              <div id="accordionEquipos">

                              </div>

                           </div>
                           <div class="box-footer">
                              <button type="submit" class="btn btn-primary">Guardar</button>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="box box-primary">
                        <div class="box-header with-border">
                           <h3 class="box-title">Acciones</h3>
                        </div>
                        <div class="col-md-12" id="image-map-wrapper">
                           <div id="image-map-container">
                              <div id="image-map" style="max-width: 100%" class="image-mapper">
                                 <img class="image-mapper-img">
                                 <svg class="image-mapper-svg"></svg>
                              </div>
                           </div>
                        </div>

                        <div id="cardEquipo" class="card hide" style="width: 38rem; text-align: center; margin: auto">
                           <div class="card-header">
                              Nuevo Equipo
                           </div>
                           <div class="card-body">
                              <form>
                                 <div class="form-group">
                                    <label for="codigoEquipo" class="col-form-label">Codigo:</label>
                                    <input type="text" class="form-control" id="codigoEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="marcaEquipo" class="col-form-label">Marca:</label>
                                    <input type="text" class="form-control" id="marcaEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="clienteEquipo" class="col-form-label">Cliente:</label>
                                    <input type="text" class="form-control" id="clienteEquipo">
                                 </div>

                                 Estado:
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estadoRadioB" id="estOperativo" value="Operativo" checked>
                                    <label class="form-check-label" for="estOperativo">Operativo</label>
                                 </div>
                                 <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estadoRadioB" id="estInoperativo" value="Inoperativo">
                                    <label class="form-check-label" for="estInoperativo">Inoperativo</label>
                                 </div>

                                 <div class="form-group">
                                    <label for="presionAEquipo" class="col-form-label">Presion Alta:</label>
                                    <input type="number" class="form-control" id="presionAEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="presionBEquipo" class="col-form-label">Presion Baja:</label>
                                    <input type="number" class="form-control" id="presionBEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="frecuenciaEquipo" class="col-form-label">Frecuencia:</label>
                                    <input type="number" class="form-control" id="frecuenciaEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="capacidadEquipo" class="col-form-label">Capacidad:</label>
                                    <input type="number" class="form-control" id="capacidadEquipo">
                                 </div>

                                 <div class="form-group">
                                    <label for="refrigeranteEquipo" class="col-form-label">Refrigerante:</label>
                                    <input type="text" class="form-control" id="refrigeranteEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="tipoOnly" class="col-form-label">Tipo:</label>
                                    <input type="text" class="form-control" id="tipoOnly">
                                 </div>
                                 <div class="form-group">
                                    <label for="numSerieEquipo" class="col-form-label">Numero de Serie:</label>
                                    <input type="text" class="form-control" id="numSerieEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="voltajeEquipo" class="col-form-label">Voltaje:</label>
                                    <input type="number" class="form-control" id="voltajeEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="amperajeEquipo" class="col-form-label">Amperaje:</label>
                                    <input type="number" class="form-control" id="amperajeEquipo">
                                 </div>
                                 <div class="form-group">
                                    <label for="tipoEquipo" class="col-form-label">Tipo Equipo:</label>
                                    <input type="text" class="form-control" id="tipoEquipo">
                                 </div>
                                 <button id="createEquipo" class="btn btn-success" >Crear Equipo</button>
                              </form>
                           </div>
                        </div>

                        <table class="table hide" id="image-mapper-table">
                           <thead>
                              <tr>
                                 <th>
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Activo</font>
                                    </font>
                                 </th>
                                 <th>
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Forma</font>
                                    </font>
                                 </th>
                                 <th>
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Enlace</font>
                                    </font>
                                 </th>
                                 <th>
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Título</font>
                                    </font>
                                 </th>
                                 <th>
                                    <font style="vertical-align: inherit;">
                                       <font style="vertical-align: inherit;">Objetivo</font>
                                    </font>
                                 </th>
                                 <th style="width: 25px"></th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr id="0cont">
                                 <td style="width: 65px">
                                    <div class="control-label input-sm"><input id="0" type="radio" name="im[active]" value="1" checked="checked"></div>
                                 </td>
                                 <td><select name="im[0][shape]" class="form-control input-sm">
                                       <option value="rect">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Rect</font>
                                          </font>
                                       </option>
                                       <option value="poly" selected>
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Poly</font>
                                          </font>
                                       </option>
                                       <option value="circle">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">Circulo</font>
                                          </font>
                                       </option>
                                    </select></td>
                                 <td><input type="text" name="im[0][href]" value="" placeholder="Enlace" class="form-control input-sm"></td>
                                 <td><input type="text" name="im[0][title]" value="" placeholder="Título" class="form-control input-sm"></td>
                                 <td><select name="im[0][target]" class="form-control input-sm">
                                       <option value="">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">---</font>
                                          </font>
                                       </option>
                                       <option value="_blank">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">_blanco</font>
                                          </font>
                                       </option>
                                       <option value="_parent">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">_padre</font>
                                          </font>
                                       </option>
                                       <option value="_self">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">_uno mismo</font>
                                          </font>
                                       </option>
                                       <option value="_top">
                                          <font style="vertical-align: inherit;">
                                             <font style="vertical-align: inherit;">_cima</font>
                                          </font>
                                       </option>
                                    </select></td>
                                 <td name="btn"><button class="btn btn-default btn-sm remove-row" name="im[0][remove]" value=""><span class="glyphicon glyphicon-remove"></span></button></td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th colspan="6" style="text-align: right">
                                    <button id="addformabtn" type="button" class="btn btn-danger btn-sm add-row">
                                       <span class="glyphicon glyphicon-plus"></span>
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;"> Agregar nueva área</font>
                                       </font>
                                    </button>
                                    <button id="mostrarCod" type="button" class="btn btn-success btn-sm add-row">
                                       <span class="glyphicon glyphicon-ok"></span>
                                       <font style="vertical-align: inherit;">
                                          <font style="vertical-align: inherit;"> Listo</font>
                                       </font>
                                    </button>
                                 </th>
                              </tr>
                           </tfoot>
                        </table>
                        <div class="box-footer">
                           
                        </div>
                     </div>
                  </div>
               </div>







            </div>
         </div>
      </div>
   </div>
   <script src="<?= $direccion ?>js/vendor/jquery-1.11.3.min.js"></script>
   <script src="<?= $direccion ?>modulos/catalogacion-manual-partes/interaccion/accionesInteraccion.js"></script>
</body>

</html>
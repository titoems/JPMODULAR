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

      area :hover {
         cursor: move;
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
                                 <input id="modeloEquipos" name="modeloEquipo" type="text" class="form-control" placeholder="Selecciona un Modelo" list="modelList">
                                 <datalist id="modelList"></datalist>
                              </div>
                              <div class="form-group">
                                 <button type="button" class="btn btn-success btn-lg" id="image-mapper-upload" disabled="disabled" >
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

                              <button id="showformAddE" type="button" class="btn btn-info" disabled="disabled" >Añadir Parte <span class="glyphicon glyphicon-plus-sign"></span></button>

                           </div>
                           <div class="form-group">

                              <div id="accordionEquipos">

                              </div>

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
                              <h3 class="box-title">Nuevo Parte</h3>
                           </div>
                           <div class="card-body">
                              <form id="createEquipo">
                                 <div class="input-group">
                                    <span class="input-group-addon">Codigo Parte:</span>
                                    <input id="codParte" type="text" class="form-control">
                                 </div>
                                 <br>
                                 <div class="input-group">
                                    <span class="input-group-addon">Nombre:</span>
                                    <input id="nombreParte" type="text" class="form-control">
                                 </div>
                                 <br>
                                 <div class="input-group">
                                    <span class="input-group-addon">Titulo Segmento:</span>
                                    <input id="tituloSeg" type="text" class="form-control">
                                 </div>
                                 <br>
                                 <div class="input-group">
                                    <span class="input-group-addon">Codigo SAP:</span>
                                    <input id="codSap" type="text" class="form-control">
                                 </div>
                                 <br>
                                 <div class="box">
                                    <div class="box-header">
                                       <h3 class="box-title">Ficha Tecnica</h3>
                                       <div class="pull-right box-tools">
                                          <button id="addInfParte" type="button" class="btn btn-info btn-sm">
                                             <i class="fa fa-plus"></i>
                                          </button>
                                          <button id="removeInfParte" type="button" class="btn btn-danger btn-sm">
                                             <i class="fa fa-minus"></i>
                                          </button>
                                       </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body no-padding">
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Titulo</th>
                                                <th>Informacion</th>
                                             </tr>
                                          </thead>
                                          <tbody id="nuevoDato">
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.box-body -->
                                 </div>
                                 <div class="box-footer">
                                    <button class="btn btn-success">Crear Parte</button>
                                 </div>
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
                                 <th style="width: 25px"></th>
                              </tr>
                           </thead>
                           <tbody id="tbodygeneraMapp">
                              
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
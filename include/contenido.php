<?php include "../include/database.php"; ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="col-xs-16">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#ordenServicio" data-toggle="tab">Orden de servicio</a></li>
              <li><a href="#kpi" data-toggle="tab">KPI</a></li>
              <li><a href="#equipo" data-toggle="tab">Equipo</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="ordenServicio">
                  <h2>Plan semanal</h2>
                <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Ordenes de servicio</h3>

                      <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                          <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Numero</th>
                            <th>Nro Orde Servicio</th>
                            <th>Fecha Orden Servicio</th>
                            <th>Cliente</th>
                            <th>Tipo Servicio</th>
                            <th>Equipo</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $query ="SELECT id_o_servicio,nro_orden_servicio,fecha_orden_servicio,id_clientes,id_acciones,codigo_equipo FROM o_servicio WHERE id_personal=6";
                          $result_o_servicio = mysqli_query($mysqli_dos , $query);
                          while( $row = mysqli_fetch_array($result_o_servicio)){?>
                            <tr>
                              <td><?php echo $row['id_o_servicio'] ?></td>
                              <td><?php echo $row['nro_orden_servicio'] ?></td>
                              <td><?php echo $row['fecha_orden_servicio'] ?></td>
                              <td>
                                <?php 
                                  $queryCliente ="SELECT descripcion FROM clientes WHERE id=$row[id_clientes]";
                                  $result_o_servicio_Cliente= mysqli_query($mysqli , $queryCliente);
                                  $rowCliente = mysqli_fetch_array($result_o_servicio_Cliente);
                                  echo $rowCliente['descripcion'];
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $queryAccion ="SELECT nombre FROM accion WHERE id=$row[id_acciones]";
                                  $result_o_servicio_Accion= mysqli_query($mysqli , $queryAccion);
                                  $rowAccion = mysqli_fetch_array($result_o_servicio_Accion);
                                  echo $rowAccion['nombre'];
                                ?>
                                </td>
                              <td>
                                <?php 
                                  $queryEquipo ="SELECT modelo FROM equipos WHERE id=$row[codigo_equipo]";
                                  $result_o_servicio_Equipo= mysqli_query($mysqli , $queryEquipo);
                                  $rowEquipo = mysqli_fetch_array($result_o_servicio_Equipo);
                                  echo $rowEquipo['modelo']; 
                                ?>
                              </td>
                              <td>
                                <?php 
                                $queryEquipoEstado ="SELECT estado FROM equipos WHERE id=$row[codigo_equipo]";
                                $result_o_servicio_EquipoEstado= mysqli_query($mysqli , $queryEquipoEstado);
                                $rowEquipoEstado = mysqli_fetch_array($result_o_servicio_EquipoEstado);
                                ?>
                                <?php if($rowEquipoEstado['estado']=="Operativo"){?>
                                  <span class="label label-success"><?php echo $rowEquipoEstado['estado'];  ?></span>
                                <?php }elseif($rowEquipoEstado['estado']=="Inoperativo"){?>
                                  <span class="label label-danger"><?php echo $rowEquipoEstado['estado'];  ?></span>
                                <?php }elseif($rowEquipoEstado['estado']=="Observacion"){?>
                                  <span class="label label-warning"><?php echo $rowEquipoEstado['estado'];  ?></span>
                                <?php } ?>
                              </td>
                              <td>
                              <button type="button" class="btn btn-block btn-info">Ver</button>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
              </div>
              <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Ordenes Diarias</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="">
                      <div class="table-responsive">
                      <table class=" table no-margin">
                        <thead>
                          <tr>
                            <th>Numero</th>
                            <th>Nro Orde Servicio</th>
                            <th>Fecha Orden Servicio</th>
                            <th>Cliente</th>
                            <th>Tipo Servicio</th>
                            <th>Equipo</th>
                            <th>Estado</th>
                            <th>Detalles</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $query ="SELECT id_o_servicio,nro_orden_servicio,fecha_orden_servicio,id_clientes,id_acciones,codigo_equipo FROM o_servicio WHERE id_personal=6";
                          $result_o_servicio = mysqli_query($mysqli_dos , $query);
                          while( $row = mysqli_fetch_array($result_o_servicio)){?>
                            <?php if(date("Y-m-d", strtotime("2021-07-06"))==$row['fecha_orden_servicio']){ ?>
                              <tr>
                              <td><?php echo $row['id_o_servicio'] ?></td>
                              <td><?php echo $row['nro_orden_servicio'] ?></td>
                              <td><?php echo $row['fecha_orden_servicio'] ?></td>
                              <td>
                                <?php 
                                  $queryCliente ="SELECT descripcion FROM clientes WHERE id=$row[id_clientes]";
                                  $result_o_servicio_Cliente= mysqli_query($mysqli , $queryCliente);
                                  $rowCliente = mysqli_fetch_array($result_o_servicio_Cliente);
                                  echo $rowCliente['descripcion'];
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $queryAccion ="SELECT nombre FROM accion WHERE id=$row[id_acciones]";
                                  $result_o_servicio_Accion= mysqli_query($mysqli , $queryAccion);
                                  $rowAccion = mysqli_fetch_array($result_o_servicio_Accion);
                                  echo $rowAccion['nombre'];
                                ?>
                                </td>
                              <td>
                                <?php 
                                  $queryEquipo ="SELECT modelo FROM equipos WHERE id=$row[codigo_equipo]";
                                  $result_o_servicio_Equipo= mysqli_query($mysqli , $queryEquipo);
                                  $rowEquipo = mysqli_fetch_array($result_o_servicio_Equipo);
                                  echo $rowEquipo['modelo']; 
                                ?>
                              </td>
                              <td>
                                <?php 
                                $queryEquipoEstado ="SELECT estado FROM equipos WHERE id=$row[codigo_equipo]";
                                $result_o_servicio_EquipoEstado= mysqli_query($mysqli , $queryEquipoEstado);
                                $rowEquipoEstado = mysqli_fetch_array($result_o_servicio_EquipoEstado);
                                ?>
                                <?php if($rowEquipoEstado['estado']=="Operativo"){?>
                                  <span class="label label-success"><?php echo $rowEquipoEstado['estado'];  ?></span>
                                <?php }elseif($rowEquipoEstado['estado']=="Inoperativo"){?>
                                  <span class="label label-danger"><?php echo $rowEquipoEstado['estado'];  ?></span>
                                <?php }elseif($rowEquipoEstado['estado']=="Observacion"){?>
                                  <span class="label label-warning"><?php echo $rowEquipoEstado['estado'];  ?></span>
                                <?php } ?>
                              </td>
                              <td>
                              <button type="button" class="btn btn-block btn-info">Ver</button>
                              </td>
                            </tr>
                              <?php }?>  
                          <?php } ?>
                        </tbody>
                      </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <!-- USERS LIST -->
                      <div class="box box-danger">
                        <div class="box-header with-border">
                          <h3 class="box-title">Guardia de trabajo Actual</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                          </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                          <ul class="users-list clearfix">
                            <li>
                              <img src="dist/img/user1-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Alexander Pierce</a>
                              <span class="users-list-date">Today</span>
                            </li>
                            <li>
                              <img src="dist/img/user8-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Norman</a>
                              <span class="users-list-date">Yesterday</span>
                            </li>
                            <li>
                              <img src="dist/img/user7-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Jane</a>
                              <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                              <img src="dist/img/user6-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">John</a>
                              <span class="users-list-date">12 Jan</span>
                            </li>
                            <li>
                              <img src="dist/img/user2-160x160.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Alexander</a>
                              <span class="users-list-date">13 Jan</span>
                            </li>
                            <li>
                              <img src="dist/img/user5-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Sarah</a>
                              <span class="users-list-date">14 Jan</span>
                            </li>
                            <li>
                              <img src="dist/img/user4-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Nora</a>
                              <span class="users-list-date">15 Jan</span>
                            </li>
                            <li>
                              <img src="dist/img/user3-128x128.jpg" alt="User Image">
                              <a class="users-list-name" href="#">Nadia</a>
                              <span class="users-list-date">15 Jan</span>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="tab-pane" id="kpi">
                  <?php include "../include/kpi.php"; ?>
                </div>
                <div class="tab-pane" id="equipo">
                  <?php include "../include/equipo.php"; ?>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
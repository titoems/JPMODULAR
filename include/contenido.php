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
                          echo $rowCliente['descripcion'] ;
                        ?>
                      </td>
                      <td>
                        <?php 
                          $queryAccion ="SELECT nombre FROM accion WHERE id=$row[id_acciones]";
                          $result_o_servicio_Accion= mysqli_query($mysqli , $queryAccion);
                          $rowAccion = mysqli_fetch_array($result_o_servicio_Accion);
                          echo $rowAccion['nombre'] ;
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
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
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
                          echo $rowCliente['descripcion'] ;
                        ?>
                      </td>
                      <td>
                        <?php 
                          $queryAccion ="SELECT nombre FROM accion WHERE id=$row[id_acciones]";
                          $result_o_servicio_Accion= mysqli_query($mysqli , $queryAccion);
                          $rowAccion = mysqli_fetch_array($result_o_servicio_Accion);
                          echo $rowAccion['nombre'] ;
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
            <div class="col-md-6">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Direct Chat</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                      <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Is this template really for free? That's unbelievable!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Alexander Pierce</span>
                        <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        Working with AdminLTE on a great new app! Wanna join?
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">Sarah Bullock</span>
                        <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        I would love to.
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->

                  </div>
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                  <div class="direct-chat-contacts">
                    <ul class="contacts-list">
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Count Dracula
                                  <small class="contacts-list-date pull-right">2/28/2015</small>
                                </span>
                            <span class="contacts-list-msg">How have you been? I was...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Sarah Doe
                                  <small class="contacts-list-date pull-right">2/23/2015</small>
                                </span>
                            <span class="contacts-list-msg">I will be waiting for...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nadia Jolie
                                  <small class="contacts-list-date pull-right">2/20/2015</small>
                                </span>
                            <span class="contacts-list-msg">I'll call you back at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Nora S. Vans
                                  <small class="contacts-list-date pull-right">2/10/2015</small>
                                </span>
                            <span class="contacts-list-msg">Where is your new...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  John K.
                                  <small class="contacts-list-date pull-right">1/27/2015</small>
                                </span>
                            <span class="contacts-list-msg">Can I take a look at...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                      <li>
                        <a href="#">
                          <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Image">

                          <div class="contacts-list-info">
                                <span class="contacts-list-name">
                                  Kenneth M.
                                  <small class="contacts-list-date pull-right">1/4/2015</small>
                                </span>
                            <span class="contacts-list-msg">Never mind I found...</span>
                          </div>
                          <!-- /.contacts-list-info -->
                        </a>
                      </li>
                      <!-- End Contact Item -->
                    </ul>
                    <!-- /.contatcts-list -->
                  </div>
                  <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form action="#" method="post">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat">Send</button>
                          </span>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
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
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- SEGUNDO CHAT CREADO -->
          <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Chat</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="" data-original-title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                </div>
              </div>
            </div>
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><div class="box-body chat" id="chat-box" style="overflow: hidden; width: auto; height: 250px;">
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/user4-128x128.jpg" alt="user image" class="online">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                    Mike Doe
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
                <div class="attachment">
                  <h4>Attachments:</h4>

                  <p class="filename">
                    Theme-thumbnail-image.jpg
                  </p>

                  <div class="pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat">Open</button>
                  </div>
                </div>
                <!-- /.attachment -->
              </div>
              <!-- /.item -->
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/user3-128x128.jpg" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                    Alexander Pierce
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              <!-- /.item -->
              <!-- chat item -->
              <div class="item">
                <img src="dist/img/user2-160x160.jpg" alt="user image" class="offline">

                <p class="message">
                  <a href="#" class="name">
                    <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                    Susan Doe
                  </a>
                  I would like to meet you to discuss the latest news about
                  the arrival of the new theme. They say it is going to be one the
                  best themes on the market
                </p>
              </div>
              <!-- /.item -->
            </div><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 184.911px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
            <!-- /.chat -->
            <div class="box-footer">
              <div class="input-group">
                <input class="form-control" placeholder="Type message...">

                <div class="input-group-btn">
                  <button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="kpi">
          <?php include "../include/kpi.php"; ?>
          </div>
            <!-- /.tab-pane -->
          <div class="tab-pane" id="equipo">
          <?php include "../include/equipo.php"; ?>
          </div>
            <!-- /.tab-pane -->
          </div>
            <!-- /.tab-content -->
        </div>
          <!-- /.nav-tabs-custom -->
      </div>
    </section>
  </div>
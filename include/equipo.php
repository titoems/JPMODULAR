<div>
    <h3>BUSCAR EQUIPO POR CODIGO</h3>
    <form role="form-horizontal" method="post" action="">
        <div class="box-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
                <input type="text" name="CodigoEquipo" class="form-control pull-right" placeholder="Buscar">
                <div class="input-group-btn">
                    <button type="submit" name="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
            <h3>DETALLES DE EQUIPO "<?php echo $rowEquipos['codigo_equipo']?>"</h3>
            <div class="box-body">
                <div class="row">
                    <!-- Primera Columna -->
                        <div class="col-xs-4">
                            <div class="box box-warning">
                                <div class="box-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Id:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['id']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="box">
                                        <div class="box-body no-padding">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>NOMBRE</th>
                                                        <th>TAG</th>
                                                        <th>CODIGO EQUIPO</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <th><?php echo $rowEquipos['nombre']?></th>
                                                        <th><?php echo $rowEquipos['tag']?></th>
                                                        <th><?php echo $rowEquipos['codigo_equipo']?></th>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Modelo:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['modelo']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Tipo:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['tipo']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Voltaje:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['voltaje']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Amperaje:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['amperaje']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Presion Alta:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['presion_alta']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Presion Baja:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['presion_baja']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Primera Columna -->
                        <!-- Segunda Columna -->
                        <div class="col-xs-4">
                            <div class="box box-warning">
                                <div class="box-body">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Frecuencia:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['frecuencia']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Capacidad:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['capacidad']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Refrigerante:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['refrigerante']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Tipo Equipo:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['tipo_equipo']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Cliente:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['cliente']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Lugar:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['lugar']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class="col-sm-5 control-label">Ubicacion:</label>
                                            <div class="col-sm-11">
                                                <input type="text" class="form-control" value="<?php echo $rowEquipos['ubicacion']?>" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <div class="col-sm-11">
                                            <button type="button" class="btn btn-block btn-primary btn-lg">Documentacion</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <!-- Segunda Columna -->
            <!-- Tercera Columna -->
            <div class="col-xs-4">
                <div class="box box-warning">
                    <br>
                    <br>
                    <br>
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-time"></i></span>
                        <div class="info-box-content">
                            <center>
                                <span class="info-box-text">
                                    <h4>
                                    <?php
                                        $Barra="/";
                                        if($rowEquipos['marca']==null && $rowEquipos['modelo']==null){
                                            echo "Marca/Modelo";
                                        }else{
                                            echo $rowEquipos['marca'] .$Barra. $rowEquipos['modelo'];
                                            $queryOrometro ="SELECT MAX(fecha),horometro FROM trabajos WHERE codigo_equipo='$rowEquipos[codigo_equipo]'";
                                            $resultOrometro=mysqli_query($mysqli , $queryOrometro);
                                            $rowOrometro = mysqli_fetch_array($resultOrometro);
                                        
                                    ?>
                                    </h4>
                                </span>
                                <span class="info-box-number">Horas totales : <?php echo $rowOrometro['horometro']; ?></span>
                                <?php }?>
                            </center>
                        </div>
                    </div>
                    <br>
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <div class="info-box-content">
                            <center>
                                <span class="info-box-text"><h3>Ultimo Mantenimiento Preventivo</h3></span>
                                <span class="info-box-number">
                                    <?php
                                        $queryFecha ="SELECT MAX(fecha) FROM trabajos WHERE codigo_equipo='$rowEquipos[codigo_equipo]'"; 
                                        if($result_Fecha=mysqli_query($mysqli , $queryFecha)){
                                            $rowFecha = mysqli_fetch_array($result_Fecha);
                                            if($rowFecha['MAX(fecha)']!=null){
                                                echo $rowFecha['MAX(fecha)'];
                                            }else{
                                                echo "Fecha";
                                            }
                                        }
                                    ?>
                                </span>
                            </center>
                        </div>
                    </div>
                    <br>
                    <h3>Estado Sistema</h3>
                    <br>
                    <div class="info-box <?=$_SESSION['ColorTargetaAire']; ?>">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-indent-left"></i></span>
                        <div class="info-box-content">
                            <center>
                                <span class="info-box-text"><h4>Aire Acondicionado</h4></span>
                                <span class="info-box-text">
                                    <h4>
                                        <?= $_SESSION['AireAcondicionado']?>
                                    </h4>
                                </span>
                            </center>
                        </div>
                    </div>
                    <div class="info-box  <?= $_SESSION['ColorTargeta']; ?>">
                        <span class="info-box-icon"><i class="glyphicon glyphicon-fire"></i></span>
                        <div class="info-box-content">
                            <center>
                                <span class="info-box-text"><h4>Calefaccion</h4></span>
                                <span class="info-box-text">
                                    <h4>
                                        <?= $_SESSION['EstadoCalefaccion']; ?>
                                    </h4>
                                </span>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tercera Columna -->
        </div>
    </div>
    <!-- Fin Formulario Equipo -->
    <!-- Inicio Partes Estado -->
    <div class="box-body">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">PARTES EQUIPO</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
                </div>
                <div class="box-body no-padding">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                            <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                            <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                                <br>
                                <div class="info-box bg-green">
                                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Marca/Modelo</span>
                                        <span class="info-box-number">Horas Totales 92,050</span>
                                        <div class="progress">
                                            <div class="progress-bar" style="width: 20%"></div>
                                        </div>
                                        <span class="progress-description">
                                            20% Increase in 30 Days
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
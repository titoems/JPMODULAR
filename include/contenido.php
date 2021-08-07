<?php include "../include/database.php"; ?>
<?php
  //Variable de busqueda en pestaña Equipos
  $rowEquipos=null;
  //variables de definicion de pestañas
  $_SESSION['pestañaO_Servicio']="active";
  $_SESSION['pestañaKPI']="";
  $_SESSION['pestañaEquipo']="";
  //Color de targetas de equipos y variale del dato;
  $_SESSION['ColorTargeta']="bg-green";
  $_SESSION['ColorTargetaAire']="bg-green";
  $_SESSION['EstadoCalefaccion']="";
  $_SESSION['AireAcondicionado']="";
  //busqeuda equipos solo si se preciona el boton de buscar
  if(isset($_POST["search"])){
    if(!empty($_POST['CodigoEquipo'])){
      $_SESSION['pestañaO_Servicio']="";
      $_SESSION['pestañaKPI']="";
      $_SESSION['pestañaEquipo']="active";
      $codigo=$_POST['CodigoEquipo'];

      //consulta para datos de pestaña Equipo
      $queryEquipos ="SELECT * FROM equipos WHERE codigo_equipo='$codigo'";
      $result_Equipos= mysqli_query($mysqli , $queryEquipos);
      $rowEquipos = mysqli_fetch_array($result_Equipos);
      
      //Resultados de estado de calefaccion
        if($rowEquipos['estado_calefaccion']=="Operativo"){
          $_SESSION['ColorTargeta']="bg-green";
          $_SESSION['EstadoCalefaccion']=$rowEquipos['estado_calefaccion']; 
        }elseif($rowEquipos['estado_calefaccion']=="Inoperativo"){
          $_SESSION['ColorTargeta']="bg-red";
          $_SESSION['EstadoCalefaccion']=$rowEquipos['estado_calefaccion'];   
        }elseif($rowEquipos['estado_calefaccion']=="Observacion"){
          $_SESSION['ColorTargeta']="bg-yellow";
          $_SESSION['EstadoCalefaccion']=$rowEquipos['estado_calefaccion'];  
        }
      //Resultados de estado de Aire Acondicionado
        if($rowEquipos['estado']=="Operativo"){
          $_SESSION['ColorTargetaAire']="bg-green";
          $_SESSION['AireAcondicionado']=$rowEquipos['estado']; 
        }elseif($rowEquipos['estado']=="Inoperativo"){
          $_SESSION['ColorTargetaAire']="bg-red";
          $_SESSION['AireAcondicionado']=$rowEquipos['estado'];   
        }elseif($rowEquipos['estado']=="Observacion"){
          $_SESSION['ColorTargetaAire']="bg-yellow";
          $_SESSION['AireAcondicionado']=$rowEquipos['estado'];  
        }
    }
  }
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="col-xs-16">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?= $_SESSION['pestañaO_Servicio']; ?>"><a href="#ordenServicio" data-toggle="tab">Orden de servicio</a></li>
              <li class="<?= $_SESSION['pestañaEquipo']; ?>"><a href="#equipo" data-toggle="tab">Equipo</a></li>
              <li class="<?= $_SESSION['pestañaKPI']; ?>"><a href="#kpi" data-toggle="tab">KPI</a></li>
            </ul>
            <div class="tab-content">
                <div class="<?= $_SESSION['pestañaO_Servicio']; ?> tab-pane" id="ordenServicio">
                <?php include "../include/OrdenServicio.php"; ?>
                </div>
                <div class="<?= $_SESSION['pestañaKPI']; ?> tab-pane" id="kpi">
                  <?php include "../include/kpi.php"; ?>
                </div>
                <div class="<?= $_SESSION['pestañaEquipo']; ?> tab-pane" id="equipo">
                  <?php include "../include/equipo.php"; ?>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
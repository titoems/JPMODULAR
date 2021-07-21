<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- search form -->
      <form action="busquedas" method="POST" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Buscar Usuario" autocomplete="off">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="<?= $action ?>"><a href="<?= $menu ?>inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>

<?php

if ($_SESSION['id_tipo_usuario'] == 5 || $_SESSION['id_tipo_usuario'] == 9 ) {
?>
<li class="treeview <?= $action01 ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Planificacion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $action03 ?>"><a href="<?= $menu ?>lista-orden-servicio"><i class="fa fa-list"></i>Lista Orden Servicio</a></li>
            <li class="<?= $action04 ?>"><a href="<?= $menu ?>nueva-orden-servicio"><i class="fa fa-file-excel-o"></i>Nueva Orden Servicio</a></li>
            
          </ul>
        </li>

<?php

} elseif ($_SESSION['id_tipo_usuario'] == 3)  {

?>

<!-- aqui uds crearan su propio menu -->
<li class="treeview <?= $action01 ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Personal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $action01 ?>"><a href="<?= $menu ?>lista-de-usuarios"><i class="fa fa-list"></i> Lista </a></li>
            <li class="<?= $action02 ?>"><a href="<?= $menu ?>nuevo-usuario"><i class="fa fa-user"></i> Nuevo</a></li>
            
          </ul>
        </li>

        <li class="treeview <?= $action01 ?>">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Planificacion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $action03 ?>"><a href="<?= $menu ?>lista-orden-servicio"><i class="fa fa-list"></i>Lista Orden Servicio</a></li>
            <li class="<?= $action04 ?>"><a href="<?= $menu ?>nueva-orden-servicio"><i class="fa fa-file-excel-o"></i>Nueva Orden Servicio</a></li>
            
          </ul>
        </li>

        <li class="treeview <?= $action01 ?>">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Catalogacion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?= $action05 ?>"><a href="<?= $menu ?>lista-equipos"><i class="fa fa-list"></i>Lista de Equipos</a></li>
            <li class="<?= $action06 ?>"><a href="<?= $menu ?>modulo-interactivo"><i class="fa fa-crop"></i>Modulo interactivo</a></li>
            
          </ul>
        </li>
        

        

<?php

}


?>
        
        <li class="<?= $action ?>"><a href="<?= $menu ?>view.php?module=salir"><i class="fa fa-power-off"></i> <span>Cerrar Sesion</span></a></li>
       
       
     
        
        
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
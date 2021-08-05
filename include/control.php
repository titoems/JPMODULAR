<?php

$valor = @$_REQUEST['module'];

if ($valor == null) {
$valor = "inicio";
}

switch ($valor) {
	case 'inicio':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action = 'active';
		$head = 'head.php';
		$footer_contenido = 'contenido_footer.php';
		$contenido = "../include/contenido.php";
	break;
	default:
	case 'lista-equipo':
		$direccion = '../../';
		$update = '../upload.php';
		$menu = '../';
		$action02 = 'active';
		$head = 'form_head.php';
		$footer_contenido = 'form_footer.php';
		$contenido = "../modulos/catalogacion-manual-partes/recursos/jp.php";
	break;
	case 'nueva-orden-servicio':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action04 = 'active';
		$head = 'form_head.php';
		$footer_contenido = 'form_footer.php';
		$contenido = "../main/trabajos_list.php";
	break;
	case 'lista-de-usuarios':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action01 = 'active';
		$head = 'tablas_head.php';
		$footer_contenido = 'tablas_footer.php';
		$contenido = "../main/usuarios_list.php";
	break;
	case 'nuevo-usuario':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action02 = 'active';
		$head = 'form_head.php';
		$footer_contenido = 'form_footer.php';
		$contenido = "../main/usuarios_new.php";
	break;
	case 'personal':
		$direccion = '../../';
		$update = '../upload.php';
		$menu = '../';
		$action02 = 'active';
		$head = 'form_head.php';
		$footer_contenido = 'form_footer.php';
		$contenido = "../main/usuarios_edit.php";
	break;
	case 'imprimir':
		$direccion = '../../';
		$update = '../upload.php';
		$menu = '../';
		$action01 = 'active';
		$head = 'head.php';
		$footer_contenido = 'contenido_footer.php';
		$contenido = "../main/pdf.php";
	break;
	case 'lista-orden-servicio':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action03 = 'active';
		$head = 'tablas_head.php';
		$footer_contenido = 'tablas_footer.php';
		$contenido = "../main/os_list.php";
	break;
	case 'orden-servicio':
		$direccion = '../../';
		$update = '../upload.php';
		$menu = '../';
		$action04 = 'active';
		$head = 'head.php';
		$footer_contenido = 'contenido_footer.php';
		$contenido = "../main/pdf-os.php";
	break;
	case 'lista-equipos':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action05 = 'active';
		$head = 'head.php';
		$footer_contenido = 'contenido_footer.php';
		$contenido = "../modulos/catalogacion-manual-partes/recursos/jp.php";
	break;
	case 'modulo-interactivo':
		$direccion = '../';
		$update = 'upload.php';
		$menu = '';
		$action06 = 'active';
		$head = 'head.php';
		$footer_contenido = 'contenido_footer.php';
		$contenido = "../modulos/catalogacion-manual-partes/recursos/interactivo.php";
	break;
	case 'anexos':
		$direccion = '../../';
		$update = '../upload.php';
		$menu = '../';
		$action = 'active';
		$head = 'head.php';
		$footer_contenido = 'contenido_footer.php';
		$contenido = "../main/anexos.php";
	break;
	
// a partir de aqui ud deben empezar a crear su codigo
	
	
}



?>
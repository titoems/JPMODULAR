<?php
date_default_timezone_set('America/Lima');
include "../include/database.php";
include "../include/funciones.php";
include "../include/CifrasEnLetras.php";

$variable = base64_decode($_POST['option']);
$id_user = base64_decode(@$_POST['id_user']);

$time = time();
$fecha_hora = date("d-m-Y (H:i:s)", $time);
$fecha = date("Y-m-d");

switch($variable) {


	case 'registro_personal':
	$id_tipo_usuario = @$_POST['id_tipo_usuario'];
	$id_tipo_documento = @$_POST['id_tipo_documento'];
	$nro_documento = @$_POST['nro_documento'];
	$ap_paterno = @$_POST['ap_paterno'];
	$ap_materno = @$_POST['ap_materno'];
	$nombre = @$_POST['nombre'];
	$nombres = @$_POST['nombres'];
	$id_distrito = @$_POST['id_distrito'];
	$direccion = @$_POST['direccion'];
	$email = @$_POST['email'];
	$telefono = @$_POST['telefono'];
	$id_grado_instruccion = @$_POST['id_grado_instruccion'];
	$id_tipo_brevete = @$_POST['id_tipo_brevete'];
	$accidente_llamar = @$_POST['accidente_llamar'];
	$contacto_emergencia = @$_POST['contacto_emergencia'];
	$tipo_sangre = @$_POST['tipo_sangre'];
	$fecha_nacimiento = @$_POST['fecha_nacimiento'];
	$pago_mensual = @$_POST['pago_mensual'];
	$horas_semana = @$_POST['horas_semana'];
	$fecha_contrato = @$_POST['fecha_contrato'];
	$alergias = @$_POST['alergias'];
	$nacionalidad = @$_POST['nacionalidad'];
	$observaciones = @$_POST['observaciones'];
	$usuario = $nro_documento;
	$password = sha1($nro_documento);
	if ($pago_mensual == NULL) { $pago_mensual == '0.00'; }
	if ($id_distrito == NULL) { $id_distrito == 'NULL'; }
	if ($id_tipo_usuario == NULL) { 
		$color = "red";
		$paso = ' ¡ERROR!<br> El campo tipo de usuario es obligatorio';
		 }
	elseif ($id_tipo_documento == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo tipo de Documento es Obligatorio";
		 }
	elseif ($nro_documento == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Numero de Documento de Identidad es Obligatorio";
		 }
	elseif ($ap_paterno == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Apellido Paterno es Obligatorio";
		}
	elseif ($ap_materno == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Apellido Materno es Obligatorio";
		 }
	elseif ($nombre == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Primer Nombre es Obligatorio";
		 }
	elseif ($telefono == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Telefono / Celular es Obligatorio";
		 }
	elseif ($id_grado_instruccion == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Grado de Instruccion es obligatorio";
		 }
	elseif ($accidente_llamar == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Grado de Instruccion es obligatorio";
		 }
	elseif ($contacto_emergencia == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Nombre de Contacto de Emergencia y Parentesco es obligatorio";
		 }
	elseif ($fecha_nacimiento == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Fecha de Nacimiento es obligatorio";
		 }
	elseif ($fecha_contrato == NULL) { 
		$color = "red";
		$paso = " ¡ERROR!<br> El campo Fecha de Contrato es obligatorio";
		 }
	else { 

$consulta = mysqli_query($mysqli_dos,"SELECT COUNT(nro_documento) as a FROM p_personal WHERE nro_documento = '$nro_documento' ") or die ("error ".mysqli_error($mysqli_dos));
$da = mysqli_fetch_assoc($consulta);
 if ($da['a'] >= 1) {

	$color = "orange";
		$paso = " ¡ADVERTENCIA!<br> El NRO documento ya se encuentra registrado en la base de datos";

 } else {


if ($id_tipo_documento == 1 || $id_tipo_documento ==2 || $id_tipo_documento == 5 ) {
	$nacionalidad = 'PERUANA';
}		


$query = mysqli_query($mysqli_dos,"INSERT INTO p_personal (id_tipo_documento,id_tipo_usuario,nro_documento,ap_paterno,ap_materno,nombre,nombres,id_distrito,email,direccion,id_grado_instruccion,accidente_llamar,tipo_sangre,observaciones,fecha_nacimiento,pago_mensual,fecha_contrato,alergias,nacionalidad,contacto_emergencia,usuario,password,id_tipo_brevete,telefono,horas_semana ) VALUES ('$id_tipo_documento','$id_tipo_usuario','$nro_documento','$ap_paterno','$ap_materno','$nombre','$nombres','$id_distrito','$email','$direccion','$id_grado_instruccion','$accidente_llamar','$tipo_sangre','$observaciones','$fecha_nacimiento','$pago_mensual','$fecha_contrato','$alergias','$nacionalidad','$contacto_emergencia','$usuario','$password','$id_tipo_brevete','$telefono','$horas_semana') ") or die ("ERROR ".mysqli_error($mysqli_dos));



$colora = "blue";
$pasoa = " ¡EXITO!<br> Registro Satisfactorio se realizo satisfactoriamente";


$ultimo = mysqli_query($mysqli_dos,"SELECT id_personal FROM p_personal ORDER BY id_personal DESC LIMIT 1");
$u = mysqli_fetch_assoc($ultimo);
?>

<script type="text/javascript">
	 //var toastHTML = '<span>I am toast content</span><button class="btn-flat toast-action">Imprimir</button>';
  
	M.toast({
		displayLength : '5000',
		classes : '<?= $colora ?>',
		html: '<?= $pasoa  ?> '+'<br>  <a href="imprimir/'+<?= $u['id_personal'] ?>+'" class="btn btn-warning">Imprimir</a>',
		//completeCallback: function(){window.location.href = "nuevo-usuario"}
	})
	//window.location.href = "nuevo-usuario"
</script>

<?php





		}

}
?>

<script type="text/javascript">
	M.toast({
		displayLength : '3000',
		classes : '<?= $color ?>',
		html: '<?= $paso  ?>'
	})

</script>

<?php

	break;
}
        
?>


<?php
function getRealIP()
{

    if (isset($_SERVER["HTTP_CLIENT_IP"]))
    {
        return $_SERVER["HTTP_CLIENT_IP"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
    {
        return $_SERVER["HTTP_X_FORWARDED"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
    {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_FORWARDED"]))
    {
        return $_SERVER["HTTP_FORWARDED"];
    }
    else
    {
        return $_SERVER["REMOTE_ADDR"];
    }

}

function mes($valor) {
    if ($valor == '01') {
       $mes = "ENERO";
    }
    elseif ($valor == '02') {
        $mes = "FEBRERO";
    }
    elseif ($valor == '03') {
        $mes = "MARZO";
    }
    elseif ($valor == '04') {
        $mes = "ABRIL";
    }
    elseif ($valor == '05') {
        $mes = "MAYO";
    }
    elseif ($valor == '06') {
        $mes = "JUNIO";
    }
    elseif ($valor == '07') {
        $mes = "JULIO";
    }
    elseif ($valor == '08') {
        $mes = "AGOSTO";
    }
    elseif ($valor == '09') {
        $mes = "SETIEMBRE";
    }
    elseif ($valor == '10') {
        $mes = "OCTUBRE";
    }
    elseif ($valor == '11') {
        $mes = "NOVIEMBRE";
    }
    elseif ($valor == '12') {
        $mes = "DICIEMBRE";
    }

    echo $mes;

}


function numero($label,$name,$placeholder,$valor) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="number" class="form-control" id= "$name" name="$name" placeholder="$placeholder" value="$valor">
                </div>

  </div>

EOD;
echo $var;
}


function text($label,$name,$placeholder) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="text" class="form-control" id= "$name" name="$name" placeholder="$placeholder">
                </div>

  </div>

EOD;
echo $var;
}

function text_edit($label,$name,$placeholder,$value) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="text" class="form-control" id= "$name" name="$name" placeholder="$placeholder" value="$value">
                </div>

  </div>

EOD;
echo $var;
}

function fecha($label,$name) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="date" class="form-control" id= "$name" name="$name" >
                </div>

  </div>

EOD;
echo $var;
}


function fecha_edit($label,$name,$value) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="date" class="form-control" id= "$name" name="$name" value="$value" >
                </div>

  </div>

EOD;
echo $var;
}


function email($label,$name,$placeholder) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="email" class="form-control" id= "$name" name="$name" placeholder="$placeholder">
                </div>

  </div>

EOD;
echo $var;
}

function email_edit($label,$name,$placeholder,$value) {
$var = "";
$var .= <<<EOD

<div class="col-md-4">
                <div class="form-group">
                  <label>$label</label>
                  <input type="email" class="form-control" id= "$name" name="$name" placeholder="$placeholder" value="$value">
                </div>

  </div>

EOD;
echo $var;
}


function textarea($label,$tamano,$name,$placeholder,$value) {

$var = "";
$var .= <<<EOD
<div class="col-md-$tamano">
<div class="form-group">
                  <label>$label</label>
                  <textarea class="form-control" rows="3" name="$name" id="$name" placeholder="$placeholder">$value</textarea>
                </div>
                
</div>
EOD;
echo $var;                

}

function campo_obligatorio($nombre_campo) {
$var = "";
$var .= <<<EOD


<h4 class="modal-title">¡ERROR!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <h2 style="color: red;">¡CAMPO OBLIGATORIO!</h2>
        <p>El campo $nombre_campo es obligatorio</p>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

EOD;
echo $var;                    
}

function registro_exitoso($nombre_campo) {
$var = "";
$var .= <<<EOD


<h4 class="modal-title">$nombre_campo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <h2 style="color: blue;">¡EXITO!</h2>
        <p>El registro se añadio correctamente en nuestra base de datos</p>
              
            </div>
            <div class="modal-footer justify-content-between">
              
              <a href="nuevo-usuario" class="btn btn-primary">Cerrar</a>

EOD;
echo $var;                    
}


function msje($color,$mensaje) {

if ($color == 'warning') {
$alert = 'Alerta!';
$ico = 'warning';    
} 

$var= "";
$var .= <<<EOD
<div class="alert alert-$ico alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-$ico"></i> $alert</h4>
                $mensaje
              </div>    
EOD;
echo $var;              
}

























?>
 
<div class="login-box">
  <div class="login-logo">
    <?= $empresa ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Recuperar Contraseña</p>

      <form id="formulario" name="formulario" method="POST" autocomplete="off" action="login-check.php">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required="">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        
        <div class="row">
          <div class="col-xs-8">
           <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-xs-8">
            <table width="70%">
              <tr>
                <td><a href="inicio" class="btn btn-warning btn-block">Regresar</a></td>
                <td colspan="50" rowspan="50"></td>
                <td><button  id="enviar" name="enviar" class="btn btn-primary btn-block"> Enviar</button></td>
              </tr>
            </table>
            
            
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.login-card-body -->
  </div>

<!-- /.login-box -->

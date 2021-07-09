 
<div class="login-box">
  <div class="login-logo">
    <?= $empresa ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Autentificar sus Credenciales</p>

      <form id="formulario" name="formulario" method="POST" autocomplete="off" action="login-check.php">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required="">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
          <div class="col-xs-4">
            <button  id="contrasena" name="contrasena" class="btn btn-primary btn-block btn-flat"> Ingresar</button>
            
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="recuperar-contrasena">Olvidaste la Contraseña</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>

<!-- /.login-box -->

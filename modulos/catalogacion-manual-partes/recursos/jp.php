<?php
require_once "../include/database.php";
$tipos = $mysqli->query("SELECT DISTINCT tipo FROM equipos");
$marcas = $mysqli->query("SELECT DISTINCT marca FROM equipos");
$clientes = $mysqli->query("SELECT DISTINCT cliente FROM equipos");
$ubicaciones = $mysqli->query("SELECT DISTINCT ubicacion FROM equipos");
?>
<div class="main-container">
    <div class="main-container-flex">
        <div class="flex-column-div" style="border:1px solid blue;">
        <form action="../search-documents.php" method="POST">
        
        </form>
        
            <p>INFORMACION</p>

            <nav class="navbar navbar-light bg-light">
              <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
              </form>
            </nav>


            <div class="form-group col-md-6">
            <label for="inputState">Tipo:</label>
              <select id="inputState" class="form-control">
                <option selected></option>
                <?php
                while ($valores = mysqli_fetch_array($tipos)){
                  echo '<option value="'.$valores[tipo].'">'.$valores[tipo].'</option>';
                }
                ?>
              </select>
            </div>


        
            <div class="form-group col-md-6">
            <label for="inputState">Marca:</label>
              <select type= "text" id="inputState" class="form-control">
                <option selected></option>
                <?php
                while ($valores = mysqli_fetch_array($marcas)){
                  echo '<option value="'.$valores[marca].'">'.$valores[marca].'</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-6">
            <label for="inputState">Cliente:</label>
              <select id="inputState" class="form-control">
                <option selected></option>
                <?php
                while ($valores = mysqli_fetch_array($clientes)){
                  echo '<option value="'.$valores[cliente].'">'.$valores[cliente].'</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-6">
            <label for="inputState">Ubicacion:</label>
              <select id="inputState" class="form-control">
                <option selected></option>
                <?php
                while ($valores = mysqli_fetch_array($ubicaciones)){
                  echo '<option value="'.$valores[ubicacion].'">'.$valores[ubicacion].'</option>';
                }
                ?>
              </select>
            </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
            <div class="flex-column-div1" style="border:1px solid orange;">
            <br>

            <p>Item one</p>
            <p>Item two</p>
            <p>Item Three</p>
            <p>Item one</p>
            <p>Item two</p>
            <p>Item Three</p>
            <p>Item one</p>
            <p>Item two</p>
            <p>Item Three</p>
            <p>Item one</p>
            <p>Item two</p>
            <p>Item Three</p>
            
            </div>
        </div>
        <div class="flex-column-div" style="border:1px solid orange;">

            <p>Segunda columna</p>
            
        </div>
        <div class="flex-column-div" style="border:1px solid purple;">
            <p>Tercera columna</p>
        </div>
    </div>
</div>
<style>

.main-container{
    margin-left:50px;
    margin-right:10px;
}
.main-container-flex{
    border: 1px solid red;
    display:flex;
    justify-content:space-between;
}
.flex-column-div{
    width:610px;
}
.flex-column-div1{
    margin-left:30px;
    margin-right:50px;
    width:500px;
}


</style>
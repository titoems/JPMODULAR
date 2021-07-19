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
                <option>...</option>
              </select>
            </div>


        
            <div class="form-group col-md-6">
            <label for="inputState">Marca:</label>
              <select type= "text" id="inputState" class="form-control">
                <option selected></option>
                <option>...</option>
              </select>
            </div>

            <div class="form-group col-md-6">
            <label for="inputState">Cliente:</label>
              <select id="inputState" class="form-control">
                <option selected></option>
                <option>...</option>
              </select>
            </div>

            <div class="form-group col-md-6">
            <label for="inputState">Ubicacion:</label>
              <select id="inputState" class="form-control">
                <option selected></option>
                <option>...</option>
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

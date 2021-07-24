$(document).ready(function() {

     


    let link = true;
    let value = $.trim($('#search').val());
    if(value.length>0){
        if ($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/machine-search.php',
                type: 'POST',
                data: { search },
                success: function(resdata) {
                    let equipos = JSON.parse(resdata);
                    let template = '';
                    let templateL = '';
                    let templateMar = '';
                    let templateC = '';
                    let templateMod = '';
                    let temporal = '';
                    
                    equipos.forEach(equipo => {

                        temporal = equipo.modelo;
                        if (template.indexOf(temporal) == -1 ){
                            template += `
                            <option value="${equipo.modelo}" />
                            `;
                        }

                        temporal = equipo.lugar;
                        if (templateL.indexOf(temporal) == -1 ){
                            templateL += `
                            <option value="${equipo.lugar}">${equipo.lugar}</option>
                            `;
                        }

                        temporal = equipo.marca;
                        if (templateMar.indexOf(temporal) == -1 ){
                            templateMar += `
                            <option value="${equipo.marca}">${equipo.marca}</option>
                            `;
                        }

                        temporal = equipo.cliente;
                        if (templateC.indexOf(temporal) == -1 ){
                            templateC += `
                            <option value="${equipo.cliente}">${equipo.cliente}</option>
                            `;
                        }
                        
                        temporal = equipo.nombre;
                        if (templateMod.indexOf(temporal) == -1 ){
                            templateMod += `
                            <option value="${equipo.nombre}">${equipo.nombre}</option>
                            `;
                        }

                    });
                    $('#languageList').html(template);
                    $('#selectLugar').html(templateL);
                    $('#selectMarca').html(templateMar);
                    $('#selectCliente').html(templateC);
                    $('#selectCodigo').html(templateMod);
                }
            })
            buscaDetalles(search);
            link = false
        }
    }

    

    $('#search').keyup(function(e) {
        if ($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/machine-search.php',
                type: 'POST',
                data: { search },
                success: function(resdata) {
                    let equipos = JSON.parse(resdata);
                    let template = '';
                    let templateL = '';
                    let templateMar = '';
                    let templateC = '';
                    let templateMod = '';
                    let temporal = '';
                    
                    equipos.forEach(equipo => {
                        temporal = equipo.modelo;
                        if (template.indexOf(temporal) == -1 ){
                            template += `
                            <option value="${equipo.modelo}" />
                            `;
                        }

                        temporal = equipo.lugar;
                        if (templateL.indexOf(temporal) == -1 ){
                            templateL += `
                            <option value="${equipo.lugar}">${equipo.lugar}</option>
                            `;
                        }

                        temporal = equipo.marca;
                        if (templateMar.indexOf(temporal) == -1 ){
                            templateMar += `
                            <option value="${equipo.marca}">${equipo.marca}</option>
                            `;
                        }

                        temporal = equipo.cliente;
                        if (templateC.indexOf(temporal) == -1 ){
                            templateC += `
                            <option value="${equipo.cliente}">${equipo.cliente}</option>
                            `;
                        }
                        
                        temporal = equipo.nombre;
                        if (templateMod.indexOf(temporal) == -1 ){
                            templateMod += `
                            <option value="${equipo.nombre}">${equipo.nombre}</option>
                            `;
                        }
                    });
                    $('#languageList').html(template);
                    $('#selectLugar').html(templateL);
                    $('#selectMarca').html(templateMar);
                    $('#selectCliente').html(templateC);
                    $('#selectCodigo').html(templateMod);
                }
            })
            buscaDetalles(search);
            link = false;
        }
    })

    if(link){
        fillLugar();
        fillMarcas();
        fillClientes();
        fillModelos();
    }

    $("select").change(function() {
        let selectId = $(this).attr("id");
        $(`#${selectId} option:selected`).each(function() {
            let elementosS = $(this).text();
            console.log(elementosS);
            $.ajax({
                url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/atributos.php',
                type: 'GET',
                data: { selectId, elementosS },
                success:function(response) {
                    console.log(`${response} llego`);
                }
            })
        })
    });

    
});

function buscaDetalles(busqueda){
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/informacion.php',
        type: 'POST',
        data: { search:busqueda },
        success: function(resdata) {
            let detalles = JSON.parse(resdata);
            let template = '';
            let templateImagen = '';
            let templateDetalles = '';
            let temporal = '';

            detalles.forEach(detalle => {

                temporal = detalle.archivo;
                if (template.indexOf(temporal) == -1){
                    template += `
                    <tr role="row" class="odd">
                        <td>${detalle.archivo}</td>
                        <td>${detalle.tipoArchivo}</td>
                    </tr>
                    `;
                }

                temporal = detalle.archivo;
                if (templateImagen.indexOf(temporal) == -1){
                    templateImagen += `
                    <img src="http://localhost/JPMODULAR/dist/img/equipos/${detalle.archivo}" usemap="#image-map">
                    `;
                }


                temporal = detalle.nombre;
                if (templateDetalles.indexOf(temporal) == -1){
                    templateDetalles += `

                    <div class="row">
                        <div class="col-sm-6">${detalle.nombre}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                    <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Motor de renderizado: activar para ordenar la columna descendente">
                                        <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Informacion</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                                        <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Valor</font>
                                        </font>
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <th>Codigo Equipo</th>
                                        <td>${detalle.nombre}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Estado</th>
                                        <td>${detalle.estado}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Presion Alta</th>
                                        <td>${detalle.presion_alta}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Presion Baja</th>
                                        <td>${detalle.presion_baja}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Frecuencia</th>
                                        <td>${detalle.frecuencia}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Capacidad</th>
                                        <td>${detalle.capacidad}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Refrigerante</th>
                                        <td>${detalle.refrigerante}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Tipo</th>
                                        <td>${detalle.tipo}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Numero de Serie</th>
                                        <td>${detalle.numero_serie}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Voltaje</th>
                                        <td>${detalle.voltaje}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Amperaje</th>
                                        <td>${detalle.amperaje}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Tipo de Equipo</th>
                                        <td>${detalle.tipoEquipo}</td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <th>Observacion Calefaccion</th>
                                        <td>${detalle.observacion}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    `;
                }
            })
            $('#tableArchivos').html(template);
            $('#example2_wrapper').html(templateDetalles);
            $('#divImg').html(templateImagen);
        }
    })
}

function fillLugar() {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/place-list.php',
        type: 'GET',
        success: function (response) {
            let lugares = JSON.parse(response);
            let template = '<option >Lugar...</option>';
            lugares.forEach(lugar => {
                template += `
                    <option>${lugar.lugar}</option>
                `;
            });
            $('#selectLugar').html(template)
        }
    });
}
function fillMarcas() {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/marca-list.php',
        type: 'GET',
        success: function (response) {
            let marcas = JSON.parse(response);
            let template = '<option >Marcas...</option>';
            marcas.forEach(marca => {
                template += `
                    <option>${marca.marca}</option>
                `;
            });
            $('#selectMarca').html(template)
        }
    });
}

function fillClientes() {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/cliente-list.php',
        type: 'GET',
        success: function (response) {
            let clientes = JSON.parse(response);
            let template = '<option >Clientes...</option>';
            clientes.forEach(cliente => {
                template += `
                    <option>${cliente.cliente}</option>
                `;
            });
            $('#selectCliente').html(template)
        }
    });
}

function fillModelos() {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/models-list.php',
        type: 'GET',
        success: function (response) {
            let models = JSON.parse(response);
            let template = '<option >Codigos...</option>';
            models.forEach(mods => {
                template += `
                    <option>${mods.modelo}</option>
                `;
            });
            $('#selectCodigo').html(template)
        }
    });
}
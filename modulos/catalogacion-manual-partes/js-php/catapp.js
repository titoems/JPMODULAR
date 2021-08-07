$(document).ready(function () {

    let filtrado = true;
    let link = true;
    let value = $.trim($('#search').val());
    if (value.length > 0) {
        if ($('#search').val()) {
            let search = $('#search').val();
            buscarDetallesModelo(search);
            buscaDetalles(search);
            buscarPartesEquipo(search);
            link = false;
        }
    }

    $('#search').keyup(function (e) {
        if ($('#search').val()) {
            let search = $('#search').val();
            buscarDetallesModelo(search);
            buscaDetalles(search);
            buscarPartesEquipo(search);
            link = false;
        }else{
            $('#tableArchivos').html(`
            <tr role="row" class="odd">
                <td>No archivos</td>
                <td>Ningun tipo</td>
            </tr>
            `);
            $('#detallesWraper').html('Ningun Elemento Seleccionado');
            $('#partes_equipo_div').html('Ningun Elemento Seleccionado');
            $('#divImg').html('Ningun Elemento Seleccionado');
            $('#divMapps').html('');
            fillLugar();
            fillMarcas();
            fillClientes();
            fillModelos();
        }
    });

    $("div#divImg").on('click', 'area', function(e) {
        let a = $(this).attr('id');
        $(`#${a}`).addClass('show');
        
    })

    $("select").change(function () {
        let selectId = $(this).attr("id");
        $('.collapse').each(function(){
            if ( $(this).hasClass('show') ) {
                $(this).removeClass('show');
            }
        })
        $(`#${selectId} option:selected`).each(function () {
            let elementosS = $(this).val();

            if ($('#detallesWraper').text!=='Ningun Elemento Seleccionado'){
                $(`#${elementosS}`).addClass('show');
            }
            if ($('#search').val() === ''){
                $('#search').val(elementosS);
                buscarDetallesModelo(elementosS);
                buscaDetalles(elementosS);
                buscarPartesEquipo(elementosS);
            }
        })
    });

    if (link&&filtrado) {
        fillLugar();
        fillMarcas();
        fillClientes();
        fillModelos();
    }

});

function buscarDetallesModelo(busqueda) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/machine-search.php',
        type: 'POST',
        data: { search: busqueda },
        success: function (resdata) {
            let equipos = JSON.parse(resdata);
            let template = '';
            let templateL = '';
            let templateMar = '';
            let templateC = '';
            let templateMod = '';
            let temporal = '';

            equipos.forEach(equipo => {
                temporal = equipo.modelo;
                if (template.indexOf(temporal) == -1) {
                    template += `
                    <option value="${equipo.modelo}" />
                    `;
                }

                temporal = equipo.lugar;
                if (templateL.indexOf(temporal) == -1) {
                    templateL += `
                    <option value="${equipo.nombre}">${equipo.lugar}</option>
                    `;
                }

                temporal = equipo.marca;
                if (templateMar.indexOf(temporal) == -1) {
                    templateMar += `
                    <option value="${equipo.nombre}">${equipo.marca}</option>
                    `;
                }

                temporal = equipo.cliente;
                if (templateC.indexOf(temporal) == -1) {
                    templateC += `
                    <option value="${equipo.nombre}">${equipo.cliente}</option>
                    `;
                }

                temporal = equipo.nombre;
                if (templateMod.indexOf(temporal) == -1) {
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
}

function buscarPartesEquipo(busqueda) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/bPartes.php',
        type: 'POST',
        data: { search: busqueda },
        success: function (resdata) {
            let partes = JSON.parse(resdata);
            let template = '';

            

            partes.forEach(parte => {

                let datos_ft = JSON.parse(parte.ficha_tecnica_parte);
                let templateFtParte = '';

                for (let key in datos_ft) {
                    templateFtParte += `
                        <tr role="row" class="odd">
                            <th>${key}</th>
                            <td>${datos_ft[key]}</td>
                        </tr>
                    `;
                }
                

                template += `
                    <div id="part_accordion">
                        <div class="card">
                            <div class="card-header" id="heading_part${parte.codigo_parte}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#${parte.codigo_parte}" aria-expanded="true" aria-controls="${parte.codigo_parte}">
                                        ${parte.codigo_parte}
                                    </button>
                                </h5>
                            </div>
                            <div id="${parte.codigo_parte}" class="collapse" aria-labelledby="heading_part${parte.codigo_parte}" data-parent="#part_accordion">
                                <div class="card-body">
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
                                                        <th>Codigo Parte</th>
                                                        <td>${parte.codigo_parte}</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <th>Nombre Parte</th>
                                                        <td>${parte.nombre_parte}</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <th>Titulo Parte</th>
                                                        <td>${parte.titulo_parte}</td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <th>Codigo Equipo</th>
                                                        <td>${parte.codigo_equipo}</td>
                                                    </tr>
                                                    <!-- parte.ficha_tecnica_parte -->
                                                    ${templateFtParte}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            })
            $('#partes_equipo_div').html(template);
        }
    })
}

function buscaDetalles(busqueda) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/informacion.php',
        type: 'POST',
        data: { search: busqueda },
        success: function (resdata) {
          
            let detalles = JSON.parse(resdata);
            let template = '';
            let templateImagen = '';
            let templateDetalles = '';
            let temporal = '';
            

            detalles.forEach(detalle => {

                temporal = detalle.archivo;
                if (template.indexOf(temporal) == -1) {
                    template += `
                    <tr role="row" class="odd">
                        <td>${detalle.archivo}</td>
                        <td>${detalle.tipoArchivo}</td>
                    </tr>
                    `;
                }

                if (detalle.mapImg == null){
                    temporal = detalle.archivo;
                    if (templateImagen.indexOf(temporal) == -1) {
                        templateImagen += `
                        <img src="http://localhost/JPMODULAR/dist/img/equipos/${detalle.archivo}">
                        `;
                    }
                }else{
                    temporal = detalle.mapImg;
                    if (templateImagen.indexOf(temporal) == -1) {
                        templateImagen += `${detalle.mapImg}`;
                    }
                }

                temporal = detalle.nombre;
                if (templateDetalles.indexOf(temporal) == -1) {
                    templateDetalles += `
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="heading${detalle.nombre}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#${detalle.nombre}" aria-expanded="true" aria-controls="${detalle.nombre}">
                                        ${detalle.nombre}
                                    </button>
                                </h5>
                            </div>
                            <div id="${detalle.nombre}" class="collapse" aria-labelledby="heading${detalle.nombre}" data-parent="#accordion">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                }
            })
            $('#tableArchivos').html(template);
            $('#detallesWraper').html(templateDetalles);
            $('#divImg').html(templateImagen);
            if ($('#detallesWraper').text() == ''){
                if ( $('#divImg').text() == '' ){
                    buscarDetallesOImg(busqueda);
                }
            }
        }
    })
}


function buscarDetallesOImg(busqueda){
    $.ajax({
        type: "POST",
        url: "http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/detalles_out_imagen.php",
        data: { search: busqueda },
        success: function (resdata) {
            let detalles = JSON.parse(resdata);
            let templateDetalles = '';
            let temporal = '';

            detalles.forEach(detalle => {

                temporal = detalle.nombre;
                if (templateDetalles.indexOf(temporal) == -1) {
                    templateDetalles += `
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="heading${detalle.nombre}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#${detalle.nombre}" aria-expanded="true" aria-controls="${detalle.nombre}">
                                        ${detalle.nombre}
                                    </button>
                                </h5>
                            </div>
                            <div id="${detalle.nombre}" class="collapse" aria-labelledby="heading${detalle.nombre}" data-parent="#accordion">
                                <div class="card-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                }
            })
            $('#detallesWraper').html(templateDetalles);
        }
    });
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
                        <option value="${lugar.modelo}" >${lugar.lugar}</option>
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
                        <option value="${marca.modelo}" >${marca.marca}</option>
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
                        <option value="${cliente.modelo}" >${cliente.cliente}</option>
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
                    <option value="${mods.modelo}" >${mods.codigo}</option>
                `;
            });
            $('#selectCodigo').html(template)
        }
    });
}
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
                    let templateL = '<option >Selecciona Lugar...</option>';
                    let templateMar = '<option >Selecciona Marca...</option>';
                    let templateC = '<option >Selecciona Categoria...</option>';
                    let templateMod = '<option >Selecciona Codigo...</option>';
                    
                    equipos.forEach(equipo => {
                        template += `
                        <option value="${equipo.modelo}" />
                        `;
                        templateL += `
                        <option value="${equipo.lugar}">${equipo.lugar}</option>
                        `;
                        templateMar += `
                        <option value="${equipo.marca}">${equipo.marca}</option>
                        `;
                        templateC += `
                        <option value="${equipo.cliente}">${equipo.cliente}</option>
                        `;
                        templateMod += `
                        <option value="${equipo.nombre}">${equipo.nombre}</option>
                        `;
                    });
                    $('#languageList').html(template);
                    $('#selectLugar').html(templateL);
                    $('#selectMarca').html(templateMar);
                    $('#selectCliente').html(templateC);
                    $('#selectCodigo').html(templateMod);
                }
            })

            $.ajax({
                url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/informacion.php',
                type: 'POST',
                data: { search },
                success: function(resdata) {
                    
                }
            })
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
                    let templateL = '<option >Selecciona Lugar...</option>';
                    let templateMar = '<option >Selecciona Marca...</option>';
                    let templateC = '<option >Selecciona Categoria...</option>';
                    let templateMod = '<option >Selecciona Codigo...</option>';
                    
                    equipos.forEach(equipo => {
                        template += `
                        <option value="${equipo.modelo}" />
                        `;
                        templateL += `
                        <option value="${equipo.lugar}">${equipo.lugar}</option>
                        `;
                        templateMar += `
                        <option value="${equipo.marca}">${equipo.marca}</option>
                        `;
                        templateC += `
                        <option value="${equipo.cliente}">${equipo.cliente}</option>
                        `;
                        templateMod += `
                        <option value="${equipo.nombre}">${equipo.nombre}</option>
                        `;
                    });
                    $('#languageList').html(template);
                    $('#selectLugar').html(templateL);
                    $('#selectMarca').html(templateMar);
                    $('#selectCliente').html(templateC);
                    $('#selectCodigo').html(templateMod);
                }
            })
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

});
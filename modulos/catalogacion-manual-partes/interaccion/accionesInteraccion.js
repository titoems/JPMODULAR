$(document).ready(function () {

    let datos = {
        'equipos': [],
        'mapeos': []
    };


    $('#modeloequipos').keyup(function (e) {
        if ($('#modeloequipos').val()) {
            let mod = $('#modeloequipos').val();
            obtenerDataModelo(mod);
        }
    });


    $('#image-mapper-upload').click(function (e) {
        $('#image-mapper-file').click();
    });

    $('#image-mapper-file').change(function (e) {
        imagenTemporal();
    });

    $("#listFiles").on('click', 'button', function (e) {
        let elemento = $(this).text();
        let template = `http://localhost/JPMODULAR/dist/img/equipos/tmp/${elemento}`;
        $("img").attr("src", template);
        $("svg").attr("style", "width:100%;")
        $("table[class='table hide']").removeClass("hide");
        $("#image-map").removeClass("hide");
        $("#cardEquipo").not(".hide").addClass("hide");
        $('svg').html("");
    });

    //<circle cx="90" cy="263" r="5" class="image-mapper-point" data-area-index="0" data-coord-index="0" style="fill: rgb(255, 255, 255); stroke: rgb(51, 51, 51); stroke-width: 1; opacity: 0.6; cursor: pointer;"></circle>
    //<polygon points="${coords}"style="fill: rgb(102, 102, 102); stroke: rgb(51, 51, 51); stroke-width: 1; opacity: 0.6; cursor: pointer;"></polygon>
    let coordIndex = 0;
    let coordenadas = '';
    let areaIndex = 0;
    let cantidadPoligonos = 0;

    $('svg').click(function (e) {
        var offset = $(this).offset();
        var x = Math.round(e.pageX - offset.left);
        var y = Math.round(e.pageY - offset.top);
        let coords = "";
        coordenadas += '' + x + ',' + y + ',';
        if (coordenadas[coordenadas.length - 1] === ',') {
            coords = coordenadas.slice(0, -1);
        }
        let templatepolygon = `
        <polygon points="${coords}" class="image-mapper-shape" data-area-index="${areaIndex}" style="fill: rgb(102, 102, 102); stroke: rgb(51, 51, 51); stroke-width: 1; opacity: 0.6; cursor: pointer;"></polygon>
        `;
        let templatecircle = `
        <circle cx="${x}" cy="${y}" r="5" class="image-mapper-point" data-area-index="${areaIndex}" data-coord-index="${coordIndex}" style="z-index: 1000; fill: rgb(255, 255, 255); stroke: rgb(51, 51, 51); stroke-width: 1; opacity: 0.6; cursor: pointer;" />
        `;

        const elementoSvg = document.querySelector("svg");
        if ($('polygon[data-area-index="' + areaIndex + '"]').length > 0) {
            $("polygon[data-area-index='" + areaIndex + "']").attr("points", coords)
        } else {
            elementoSvg.insertAdjacentHTML("afterbegin", templatepolygon);
        }
        elementoSvg.insertAdjacentHTML("beforeend", templatecircle);
        coordIndex++;
    });



    $("#addformabtn").click(function (e) {
        cantidadPoligonos++;
        let formabasica = `
        <tr id="${cantidadPoligonos}cont">
        <td style="width: 65px">
            <div class="control-label input-sm"><input id="${cantidadPoligonos}" type="radio" name="im[active]" value="1" ></div>
        </td>
        <td><select name="im[${cantidadPoligonos}][shape]" class="form-control input-sm">
            <option value="rect">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Rect</font>
                </font>
            </option>
            <option value="poly" selected>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Poly</font>
                </font>
            </option>
            <option value="circle">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Circulo</font>
                </font>
            </option>
            </select></td>
        <td><input type="text" name="im[${cantidadPoligonos}][href]" value="" placeholder="Enlace" class="form-control input-sm"></td>
        <td><input type="text" name="im[${cantidadPoligonos}][title]" value="" placeholder="Título" class="form-control input-sm"></td>
        <td><select name="im[${cantidadPoligonos}][target]" class="form-control input-sm">
            <option value="">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">---</font>
                </font>
            </option>
            <option value="_blank">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">_blanco</font>
                </font>
            </option>
            <option value="_parent">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">_padre</font>
                </font>
            </option>
            <option value="_self">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">_uno mismo</font>
                </font>
            </option>
            <option value="_top">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">_cima</font>
                </font>
            </option>
            </select></td>
        <td name="btn"><button class="btn btn-default btn-sm remove-row" name="im[${cantidadPoligonos}][remove]" value=""><span class="glyphicon glyphicon-remove"></span></button></td>
        </tr>
        `;
        document.querySelector("tbody").insertAdjacentHTML("beforeend", formabasica)
    })

    $("tbody").on("click", "button[name^='im']", function (e) {
        let nombreid = $(this).attr("name");
        let identificador = nombreid.slice(3, -9);
        let as = "#" + identificador + "cont";
        $(as).remove();
        $("circle[data-area-index='" + identificador + "']").remove()
        $("polygon[data-area-index='" + identificador + "']").remove()
    })

    $("tbody").on("click", "input:radio[name='im[active]']", function (e) {
        let a = $('input:radio[name="im[active]"]:checked').attr('id');
        areaIndex = a;
        if ($("circle[data-area-index='" + areaIndex + "']").length > 0) {
            let n = $("circle[data-area-index='" + areaIndex + "']").length;
            coordIndex = n;
        } else {
            coordIndex = 0;
        }
        if ($("polygon[data-area-index='" + areaIndex + "']").length > 0) {
            let temp = $("polygon[data-area-index='" + areaIndex + "']").attr("points");
            coordenadas = temp + ',';
        } else {
            coordenadas = '';
        }
    });

    $("#mostrarCod").click(function (e) {
        let map = obtenerDataImgMap()
        datos.mapeos.push(map);
        console.log(JSON.stringify(datos))
    });


    $("#modeloequipos").change(function (e) {
        console.log($(this).val());
    });

    $("#createEquipo").click(function (e) {
        e.preventDefault();
        const equipoNuevo = {
            codigo: $("#codigoEquipo").val(),
            marca: $("#marcaEquipo").val(),
            cliente: $("#clienteEquipo").val(),
            estado: $('input:radio[name=estadoRadioB]:checked').val(),
            presionAlta: $('#presionAEquipo').val(),
            presionBaja: $('#presionBEquipo').val(),
            frecuencia: $('#frecuenciaEquipo').val(),
            capacidad: $("#capacidadEquipo").val(),
            refrigerante: $("#refrigeranteEquipo").val(),
            tipo: $("#tipoOnly").val(),
            numeroSerie: $("#numSerieEquipo").val(),
            voltaje: $("#voltajeEquipo").val(),
            amperaje: $("#amperajeEquipo").val(),
            tipoEquipo: $("#tipoEquipo").val()
        }

        datos.equipos.push({codigo: $("#codigoEquipo").val(),
            marca: $("#marcaEquipo").val(),
            cliente: $("#clienteEquipo").val(),
            estado: $('input:radio[name=estadoRadioB]:checked').val(),
            presionAlta: $('#presionAEquipo').val(),
            presionBaja: $('#presionBEquipo').val(),
            frecuencia: $('#frecuenciaEquipo').val(),
            capacidad: $("#capacidadEquipo").val(),
            refrigerante: $("#refrigeranteEquipo").val(),
            tipo: $("#tipoOnly").val(),
            numeroSerie: $("#numSerieEquipo").val(),
            voltaje: $("#voltajeEquipo").val(),
            amperaje: $("#amperajeEquipo").val(),
            tipoEquipo: $("#tipoEquipo").val()
        });

        let template = `
            <button id="${equipoNuevo['codigo']}" type="button" class="btn btn-warning">${equipoNuevo['codigo']}</button>
        `;
        $("#accordionEquipos").append(template);
        console.log(JSON.stringify(datos));
    });
    
    $("#showformAddE").click(function (e) {
       $("div[class='card hide']").removeClass("hide");
       $("#image-mapper-table").not(".hide").addClass("hide");
       $("#image-map").not(".hide").addClass("hide");
   })

});

function obtenerDataModelo(modelo) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/equipoinf.php',
        type: 'POST',
        data: { mod: modelo },
        success: function (resdata) {
            let codMods = JSON.parse(resdata);
            let template = '';
            codMods.forEach(modls => {
                template += `
                <option value="${modls.modelo}" />
                `;
            });
            $('#modelList').html(template);
        }
    })
}

function obtenerDataImgMap() {
    let src = $("img").attr("src");
    let ident = src.substring(src.lastIndexOf('/') + 1)
    let imgdir = 'http://localhost/JPMODULAR/dist/img/equipos/' + ident;
    let cordens = [];
    let titulos = [];
    let hrefs = [];
    let template = "";
    let templateArea = '';
    $("polygon").each(function (index) {
        cordens.push($("polygon").attr('points'));
    });
    $("input[name$='[title]']").each(function (index) {
        titulos.push($("input[name$='[title]']").val());
    });
    $("input[name$='[href]']").each(function (index) {
        hrefs.push($("input[name$='[href]']").val());
    });

    if (cordens.length == titulos.length && titulos.length == hrefs.length) {
        for (let i = 0; i < cordens.length; i++) {
            templateArea += `<area alt="${titulos[i]}" title="${titulos[i]}" href="${hrefs[i]}" coords="${cordens[i]}" shape="poly">`;
        }
    }

    template = `
    <img src="${imgdir}" usemap="#${ident}">
    <map name="${ident}">
        ${templateArea}
    </map>
    `;

    return template;
}


function imagenTemporal() {
    let parametro = new FormData($('#newModuleImage')[0])
    $.ajax({
        data: parametro,
        url: "http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/uploadTemp.php",
        type: "POST",
        contentType: false,
        processData: false,
        beforesend: function () {

        },
        success: function (response) {
            let archivos = JSON.parse(response);
            let template = `<button type="button" class="list-group-item list-group-item-action" >${archivos["nombre"]}  <i class="text-right fa fa-arrow-right"></i></button>`;
            $('#listFiles').append(template);
        }
    });
}

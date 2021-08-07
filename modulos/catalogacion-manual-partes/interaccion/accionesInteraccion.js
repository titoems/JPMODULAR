$(document).ready(function () {

    let datos = {
        'equipos': [],
        'mapeos': []
    };


    $('#modeloEquipos').keyup(function (e) {
        if ($('#modeloEquipos').val()) {
            $("#showformAddE").attr("disabled", false);
            $("#image-mapper-upload").attr("disabled", false);
            let mod = $('#modeloEquipos').val();
            obtenerDataModelo(mod);
            obtenerDataModeloParte(mod);
            obtenerImgModelo(mod);
        } else {
            $("#accordionEquipos > *").remove();
            $('#listFiles > *').remove();
            $("img").removeAttr("src");
            $("svg").removeAttr("style");
            $("#image-mapper-table").addClass("hide");
            $("#cardEquipo").not(".hide").addClass("hide");
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
        $("#listFiles > button").each(function (e) { 
            $(this).removeClass('Selected');
        })
        $(this).addClass('Selected');
        let template = `http://localhost/JPMODULAR/dist/img/equipos/tmp/${elemento}`;
        if (!doesFileExist(template)) {
            template = `http://localhost/JPMODULAR/dist/img/equipos/${elemento}`;
        }
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
        let formabasica = `
        <tr id="${cantidadPoligonos}cont">
        <td style="width: 65px">
            <div class="control-label input-sm"><input id="${cantidadPoligonos}" type="radio" name="im[active]" value="1" Selected ></div>
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
        <td>
            <input type="text" name="im[${cantidadPoligonos}][href]" value="" placeholder="Enlace" class="form-control input-sm" list="codList${cantidadPoligonos}" >
            <datalist id="codList${cantidadPoligonos}"></datalist>
        </td>
        <td><input type="text" name="im[${cantidadPoligonos}][title]" value="" placeholder="Título" class="form-control input-sm"></td>
        <td name="btn"><button class="btn btn-default btn-sm remove-row" name="im[${cantidadPoligonos}][remove]" value=""><span class="glyphicon glyphicon-remove"></span></button></td>
        </tr>
        `;
        cantidadPoligonos++;
        document.querySelector("tbody#tbodygeneraMapp").insertAdjacentHTML("beforeend", formabasica)
    });

    $("#accordionEquipos").on("click", "button", function (e) {
        $("div[class='card hide']").removeClass("hide");
        $("#image-mapper-table").not(".hide").addClass("hide");
        $("#image-map").not(".hide").addClass("hide");
        let cod = $(this).attr("id");
        $("#codParte").val(cod);
        buscarPartesEquipo(cod);
    });

    $("tbody").on("click", "button[name^='im']", function (e) {
        let nombreid = $(this).attr("name");
        let identificador = nombreid.slice(3, -9);
        let as = "#" + identificador + "cont";
        $(as).remove();
        $("circle[data-area-index='" + identificador + "']").remove()
        $("polygon[data-area-index='" + identificador + "']").remove()
    });

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

    $("#addInfParte").click(function (e) {
        let a = $("#nuevoDato > tr").length + 1;
        let template = `
        <tr>
            <td>${a}</td>
            <td>
                <input id="titulo${a}" type="text" class="t form-control">
            </td>
            <td>
                <input id="inform${a}" type="text" class="i form-control">
            </td>
        </tr>
        `;
        $("#nuevoDato").append(template);
    });

    $("#removeInfParte").click(function (e) {
        if ($("#nuevoDato > tr").length > 0) {
            $("#nuevoDato > tr:last").remove();
        }
    })

    /* $("#modeloEquipos").change(function (e) {
        console.log($(this).val());
    }); */

    $("#createEquipo").submit(function (e) {
        e.preventDefault();
        let existe = false;
        if ($("#codParte").val().length > 0 && $("#nombreParte").val().length > 0 && $("#codSap").val().length > 0 && $("#modeloEquipos").val().length > 0) {
            if ($("#accordionEquipos > button").length > 0) {
                $("#accordionEquipos > button").each(function (e) {
                    let i = $(this).attr("id");
                    if (i == $("#codParte").val()) {
                        existe = true;
                    }
                });
            }
            const fichatecnica = {};
            let titulos = [];
            let datosFt = [];

            if ($("#nuevoDato > tr").length > 0) {
                $("#nuevoDato > tr > td:nth-child(2) > input").each(function (e) {
                    let t = $(this).val();
                    titulos.push(t);
                    //console.log(titulos);
                });
                $("#nuevoDato > tr > td:nth-child(3) > input").each(function (e) {
                    let t = $(this).val();
                    datosFt.push(t);
                    //console.log(datos);
                });
                titulos.forEach(function (titulo, index) {
                    Object.defineProperty(fichatecnica, `${titulo}`, {
                        enumerable: true,
                        value: datosFt[index],
                    })
                });
            }

            //Object.defineProperty(ficha_tecnica, t, {value: $(this).val()})
            const parteLote = {
                codigo_parte: $("#codParte").val(),
                nombre_parte: $("#nombreParte").val(),
                titulo_parte: $("#tituloSeg").val(),
                codigo_sap: $("#codSap").val(),
                modelo_lote: $("#modeloEquipos").val()
            }

            let tr = JSON.stringify(fichatecnica);
            if (!existe) {
                $.ajax({
                    url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/addParteLote.php',
                    type: 'POST',
                    data: { parteLote, tr },
                    success: function (resdata) {
                        let template = `
                        <button id="${parteLote['codigo_parte']}" type="button" class="btn btn-warning">${parteLote['nombre_parte']}</button>
                        `;
                        $("#accordionEquipos").append(template);
                        $("#createEquipo").trigger('reset');
                    }
                });

            } else {
                $.ajax({
                    url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/updateParte.php',
                    type: 'POST',
                    data: { parteLote, tr },
                    success: function (resdata) {
                        console.log( resdata );
                    }
                });
            }
        }
    });

    $("#showformAddE").click(function (e) {
        $("div[class='card hide']").removeClass("hide");
        $("#image-mapper-table").not(".hide").addClass("hide");
        $("#image-map").not(".hide").addClass("hide");
        $("#codParte").val("");
        $("#nombreParte").val("");
        $("#tituloSeg").val("");
        $("#codSap").val("");
        if ($("#nuevoDato > tr").length > 0) {
            $("#nuevoDato > tr").remove();
        }
    })

    $("#tbodygeneraMapp").on('keyup', 'input', function(e) {
        let a = $(this);
        if ( a.val() ){
            sugerenciasCodigo(a.val(), $("#modeloEquipos").val(), a)
        }
    });

});

function sugerenciasCodigo(cod, mod, elemento){
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/getCodTitle.php',
        type: 'POST',
        data: { 
            search: cod,
            mod: mod
         },
        success: function (resdata) {
            let codPartes = JSON.parse(resdata);
            let template = '';
            codPartes.forEach(parte => {
                template += `
                <option value="${parte.codigo_parte}" />
                `;
            });
            elemento.next().html(template);
        }
    });
}

function buscarPartesEquipo(codPart) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/getInfoParte.php',
        type: 'POST',
        data: { search: codPart },
        success: function (resdata) {
            let partes = JSON.parse(resdata);
            let template = '';
            $("#nombreParte").val(partes[0].nombre_parte);
            $("#tituloSeg").val(partes[0].titulo_segmento);
            $("#codSap").val(partes[0].cod_sap);
            let ftec = JSON.parse(partes[0].ficha_tecnica);
            let a = 1;

            Object.entries(ftec).forEach(([key, value]) => {
                template += `
                <tr>
                    <td>${a}</td>
                    <td>
                        <input id="titulo${a}" type="text" value="${key}" class="t form-control">
                    </td>
                    <td>
                        <input id="inform${a}" type="text" value="${value}" class="i form-control">
                    </td>
                </tr>
                `;
                a++;
            });
            $("#nuevoDato").html(template);
        }
    });
}

function doesFileExist(urlToFile) {
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', urlToFile, false);
    xhr.send();

    if (xhr.status == "404") {
        //console.log("File doesn't exist");
        return false;
    } else {
        //console.log("File exists");
        return true;
    }
}

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
    });
}

function obtenerDataModeloParte(modelo) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/js-php/bPartes.php',
        type: 'POST',
        data: { search: modelo },
        success: function (resdata) {
            let codMods = JSON.parse(resdata);
            let template = '';
            codMods.forEach(modls => {
                template += `
                    <button id="${modls.codigo_parte}" type="button" class="btn btn-warning">${modls.nombre_parte}</button>
                `;
            });
            $("#accordionEquipos").html(template);
        }
    })
}
function obtenerImgModelo(modelo) {
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/getImgMod.php',
        type: 'POST',
        data: { search: modelo },
        success: function (resdata) {
            let archivs = JSON.parse(resdata);
            let template = '';
            let templatemap = '';
            archivs.forEach(archi => {
                templatemap += archi.mapImg;
                template += `
                <button type="button" class="list-group-item list-group-item-action" >${archi.archivo}  <i class="text-right fa fa-arrow-right"></i></button>
                `;
            });
            $('#listFiles').html(template);
        }
    });
}

function obtenerDataImgMap() {
    let src = $("img").attr("src");
    let ident = $("button.Selected").text();
    console.log( $("button.Selected").text() );
    let imgdir = 'http://localhost/JPMODULAR/dist/img/equipos/' + ident.trim();
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
            templateArea += `<area alt="${titulos[i]}" title="${titulos[i]}" id="${hrefs[i]}" coords="${cordens[i]}" shape="poly">`;
        }
    }
    let templatemap = '';
    $.ajax({
        url: 'http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/getMapImg.php',
        type: 'POST',
        data: { search: ident.trim() },
        success: function (resdata) {
            if (resdata != null && resdata != ''){
                let archivs = JSON.parse(resdata)
                templatemap = '';
                archivs.forEach(archi => {
                    templatemap += archi.mapImg;
                });
                templatemap = templatemap.slice(0,-6);
                templatemap += templateArea + '</map>';
            }else{
                templatemap="esta vacio";
            }
            console.log(templatemap);
            $.post("http://localhost/JPMODULAR/modulos/catalogacion-manual-partes/interaccion/updateMapImg.php", {templatemap,ident},
                function (resdata) {
                    console.log(resdata);
                }
            );
        }
    });

    template = `
    <img src="${imgdir}" usemap="#${ident.trim()}">
    <map name="${ident.trim()}">
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

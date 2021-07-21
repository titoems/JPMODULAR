$(document).ready(function() {

    fillModelos();
    fillCods();

    $('#search').keyup(function(e) {
        if ($('#search').val()){
            let search = $('#search').val();
            console.log(search);
            $.ajax({
                url: '../modulos/catalogacion-manual-partes/js-php/machine-search.php',
                type: 'POST',
                data: { search },
                success: function(response) {
                    let equipos = JSON.parse(response);
                    let template = '';
    
                    equipos.forEach(equipo => {
                        template += `<li>
                            ${equipo.nombre}
                        </li>`
                    });
                    $('#containerequipos').html(template);
                }
            })
        }
    })

    function fillCods() {
        $.ajax({
            url: '../modulos/catalogacion-manual-partes/js-php/cod-list.php',
            type: 'GET',
            success: function (response) {
                let cod = JSON.parse(response);
                let template = '';
                cod.forEach(codi => {
                    template += `
                        <option>${codi.nombre}</option>
                    `;
                });
                $('#selectCodigo').html(template)
            }
        });
    }

    function fillModelos() {
        $.ajax({
            url: '../modulos/catalogacion-manual-partes/js-php/models-list.php',
            type: 'GET',
            success: function (response) {
                let models = JSON.parse(response);
                let template = '';
                models.forEach(mods => {
                    template += `
                        <option>${mods.modelo}</option>
                    `;
                });
                $('#selectModelo').html(template)
            }
        });
    }

});
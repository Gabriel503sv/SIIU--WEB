$(document).ready(function() {
    $('#Principal').DataTable({
        responsive: true,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": '<i class="fas fa-angle-double-left"></i>',
                "sLast": '<i class="fas fa-angle-double-right"></i>',
                "sNext": '<i class="fas fa-angle-right"></i>',
                "sPrevious": '<i class="fas fa-angle-left"></i>'

            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        dom: '<"top"Bf>rt<"bottom"lip><"clear">',

    });
});

$(document).ready(function() {
    $('#restaurar').DataTable({
        responsive: true,
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": '<i class="fas fa-angle-double-left"></i>',
                "sLast": '<i class="fas fa-angle-double-right"></i>',
                "sNext": '<i class="fas fa-angle-right"></i>',
                "sPrevious": '<i class="fas fa-angle-left"></i>'

            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            }
        },
        dom: '<"top"Bf>rt<"bottom"lip><"clear">',

    });
});



$('.formulario-eliminar').submit(function(e) {
    e.preventDefault();

    Swal.fire({
        title: '¿Estas seguro?',
        text: "Este Usuario se eliminara definitivamente",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
});

$('.formulario-restaurar').submit(function(e) {
    e.preventDefault();

    Swal.fire({
        title: '¿Estas seguro?',
        text: "Este usuario se reutaurara",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, restaurar!'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        }
    })
});
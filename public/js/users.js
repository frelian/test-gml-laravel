
$(document).ready(function() {

    function limpiarModal() {
        $('#codigoCliente_create').val('');
        $('#nombreCliente_create').val('');
        $('#cedulaCliente_create').val('');
        $('#logoCliente_create').val('');
    }

    // Eliminar datos
    $(document).on('click', '.btnDelete', function (e) {

        let id = $(this).data("id");

        swal({
            title: "¿ Está seguro de eliminiar ?",
            text: "Los datos no se podrán recuperar...",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax("/users/destroy/"+id, {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "id": id,
                        },
                        type: "POST",
                        error: function error(data) {
                            swal("Error", "Error al eliminar el registro", "error");
                        },
                        success: function success(data) {
                            $(".item-row"+id).remove();
                            swal("Hecho", "El registro fue eliminado...", "success");

                            setTimeout(function () {
                                location.reload();
                            }, 1500);
                        }
                    });
                }
            });
    });
});

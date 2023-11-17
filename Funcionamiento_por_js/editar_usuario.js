$(document).ready(function () {
    $("#btnEditar").click(function () {
        // Mostrar los campos de edición
        $("#nombre, #apellido, #correo, #editNombre, #editApellido, #editCorreo, #editContraseña").toggle();
        // Mostrar el botón de confirmar
        $("#btnConfirmar").show();
        $("#btnCancelar").show();
        $("#btnEliminarCuenta").hide(); // Ocultar el botón de eliminar cuenta
        // Ocultar el botón de editar
        $(this).hide();
    });

    $("#btnConfirmar").click(function () {
        // Mostrar el modal de confirmación de edición
        $("#confirmEditarModal").modal("show");
    });

    $("#btnCancelar").click(function () {
        // Ocultar los campos de edición
        $("#nombre, #apellido, #correo, #editNombre, #editApellido, #editCorreo, #editContraseña").toggle();
        // Ocultar el botón de confirmar y el botón de cancelar
        $("#btnConfirmar").hide();
        $("#btnCancelar").hide();
        $("#btnEliminarCuenta").show(); // Mostrar nuevamente el botón de eliminar cuenta
        // Mostrar nuevamente el botón de editar
        $("#btnEditar").show();
    });

    $("#btnGuardar").click(function () {
        // Aquí puedes implementar la lógica para guardar los cambios
        // Después de guardar los cambios, puedes actualizar la página o realizar otras acciones necesarias.
        // Por ahora, simplemente ocultamos los campos de edición y volvemos a mostrar el botón de editar.
        $("#nombre, #apellido, #correo, #editNombre, #editApellido, #editCorreo, #editContraseña").toggle();
        $("#btnConfirmar").hide();
        $("#btnCancelar").hide();
        $("#btnEditar").show();
        $("#btnEliminarCuenta").show(); // Mostrar nuevamente el botón de eliminar cuenta
        // Cierra el modal de confirmación de edición
        $("#confirmEditarModal").modal("hide");
    });

    // JavaScript para controlar la lógica de eliminación
    $("#btnConfirmarEliminar").click(function () {
        // Aquí puedes implementar la lógica para eliminar la cuenta
        // Después de eliminar la cuenta, puedes redireccionar al usuario a una página de confirmación o cerrar sesión.
        // Por ahora, simplemente ocultamos el modal de confirmación de eliminación.
        $("#confirmEliminarModal").modal("hide");
    });
});
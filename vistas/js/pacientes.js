/*=============================================
EDITAR PACIENTES
=============================================*/

$(".tablas").on("click", ".btnEditarPaciente", function(){
    //alert("ok") 
    var idPaciente = $(this).attr("idPaciente");
    //alert(idPaciente)
    
    var datos = new FormData();
    datos.append("idPaciente", idPaciente);

    $.ajax({
        url: "ajax/pacientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(respuesta){
             $("#IdPaciente").val(respuesta["id"]);
            $("#editarNombre").val(respuesta["nombre"]);
             $("#editarApellidoP").val(respuesta["apellidoP"]);
             $("#editarApellidoM").val(respuesta["apellidoM"]);
             $("#editarDocumentacion").val(respuesta["documento"]);
             $("#editarSexo").val(respuesta["sexo"]);
             $("#editarTelefono").val(respuesta["telefono"]);
             $("#editarEmail").val(respuesta["email"]);
             $("#editarFechaNacimiento").val(respuesta["fecha"]);
             $("#editarDireccion").val(respuesta["direccion"]);

        }

    })

})

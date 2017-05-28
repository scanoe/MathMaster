$("#op_multiple").on('click', function(e){
    $("#contenedorPreguntasIncorrectas").removeClass('hidden')
    $("#parrafo-explicativo").removeClass("hidden")
})

$("#abierta").on('click', function(e){
    $("#contenedorPreguntasIncorrectas").addClass('hidden')
    $("#parrafo-explicativo").addClass("hidden")
})
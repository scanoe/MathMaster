$('.cambiar-pregunta').hover(function(e){
    e.preventDefault();
    $('.cambiar-pregunta-texto').toggleClass('hidden');
});

$('.ver-respuesta').hover(function(e){
    e.preventDefault();
    $('.ver-respuesta-texto').toggleClass('hidden');
});
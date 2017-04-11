var act = false;
$('#ingresar').click(function(e){
    e.preventDefault();
    if(!act){
        $('#login').removeClass('hidden').addClass('block');
        $('#landing').addClass('brightness');
        act = true;
    }else{
        $('#login').removeClass('block').addClass('hidden');
        $('#landing').removeClass('brightness');
        act = false;
    }
});


$('#contenedor').click(function(){
    if(act){
        $('#login').removeClass('block').addClass('hidden');
        $('#landing').removeClass('brightness');
        act = false;
    }
});
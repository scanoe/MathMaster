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

var act2 = false;
$('#settings').click(function(e){
    e.preventDefault();
    if(!act2){
        $('#settings-container').removeClass('hidden').addClass('block');
        act2 = true;
    }else{
        $('#settings-container').removeClass('block').addClass('hidden');
        act2 = false;
    }
});

$('.container').click(function(){
    if(act2){
        $('#settings-container').removeClass('block').addClass('hidden');
        act2 = false;
    }
});
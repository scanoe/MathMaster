$(document).ready(function() {
    Materialize.updateTextFields();
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 200 // Creates a dropdown of 15 years to control year
    });

    $('input#descripcion, input#nombre').characterCounter();
});


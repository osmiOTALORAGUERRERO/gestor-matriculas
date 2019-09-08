$(document).ready(function(){
    $(".datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'yy-mm-dd'
    });	

    $( ".datepicker" ).datepicker( "option", "showAnim", "drop" );
    
})


$(document).ready(function(){

    // set active genre
    $('input[checked="checked"]').parents('.radio').addClass("bx-active");

    // handler click on genre buttons
    $('form input[type="radio"]').on('change', function(){
        $('form input#set_filter').click();
    });

    // reset form
    $('input[checked="checked"]').on('click', function(){
        $('form input#del_filter').click();
    });
    
});
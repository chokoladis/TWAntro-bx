$(document).ready(function(){
    $('input[checked="checked"]').parents('.radio').addClass("bx-active");
    $('form input[type="radio"]').on('change', function(){
        $('form input#set_filter').click();
    });
});
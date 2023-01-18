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
    
    $('.icon').on('click', function(){
    
        let rating = $(this).parent().attr('class');
        let film_id = $(this).parents('.product-item').attr('data-id');
        let film_name = $(this).parents('.product-item').find('.product-item-title a').text();

        let dataSend = {
            'rating': rating,
            'film_id': film_id,
            'film_name': film_name.trim()
        };

        $.ajax({
            url: '/include/ajax_addRating.php',
            method: 'POST',
            data: dataSend, 
            success: function(data){
                let getData = JSON.parse(data);
                console.log(getData);

                if (getData.status == "OK"){
                    $('.alert-success').text(getData.message);
                    $('.alert-success').removeClass('d-none');
                    setInterval( () => {$('.alert-success').addClass('d-none')}, 4000); 
                } else {
                    $('.alert-warning').text(getData.message);
                    $('.alert-warning').removeClass('d-none');
                    setInterval( () => {$('.alert-warning').addClass('d-none')}, 4000); 
                }

            }
        });
    });
    
});
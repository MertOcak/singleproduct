$('document').ready(function(){

    control = 0;
    $('#hamburger').click(function () {
        $('#hamburger-menu').toggle();
        if(control !== 0) {
            $('body').css('overflow','visible');
            control = 0;
        } else {
            $('body').css('overflow','hidden');
            control = 1;
        }
    })

    $('.divider').eq(0).removeClass('regular').addClass('first');
    $('#content img').removeAttr('style').addClass('img-fluid');

})
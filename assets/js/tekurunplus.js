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
})
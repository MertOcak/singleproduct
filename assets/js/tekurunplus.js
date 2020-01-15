$('document').ready(function(){

/*    $('.main-menu').click{
        var a = $(this).attr('data-menu');
        a = "[data-name=\""+ a +"\"]";
        scrollTo(a,100);
    }*/

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

    if ($("#orderForm").length) {
        $("#orderForm").validate({
            rules: {
                FirstName: "required",
                LastName: "required",
                Product: "required",
                PaymentMethodId: "required",
                agreement: "required",
                Mail: {
                    required: true,
                    email: true
                },
                Address: {
                    required: true,
                    minlength: 5
                },
                Phone: {
                    required: true,
                    number: true
                },
            },
            messages: {
                FirstName: "",
                LastName: "",
                Product: "",
                Address: "",
                Agreement: "",
                PaymentMethodId: "",
                Mail: {
                    required: "",
                    email: ""
                },
                Phone: {
                    required: "",
                    number: ""
                }
            },
            errorPlacement: function (error, element) {
                return true;
            }
        });
    }

    var $videoSrc;
    $('#content-4').click(function() {
        $videoSrc = $(this).data( "src" );
    });
    console.log($videoSrc);



// when the modal is opened autoplay it
    $('#myModal').on('shown.bs.modal', function (e) {

// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
    })



// stop playing the youtube video when I close the modal
    $('#myModal').on('hide.bs.modal', function (e) {
        // a poor man's stop video
        $("#video").attr('src',$videoSrc);
    })



})


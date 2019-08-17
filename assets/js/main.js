// $(".b0").addClass('selected');

$(".b0").click(function() {
    $('html, body').animate({
        scrollTop: $('body').offset().top - 50
    }, 1000);


});
$(".b1").click(function() {
    $('html, body').animate({
        scrollTop: $(".b1icerik").offset().top - 50
    }, 1000);

});
$(".b2").click(function() {
    $('html, body').animate({
        scrollTop: $(".b2icerik").offset().top - 50
    }, 1000);

});
$(".b3").click(function() {
    $('html, body').animate({
        scrollTop: $(".b3icerik").offset().top - 50
    }, 1000);

});


$(".b4").click(function() {
    $('html, body').animate({
        scrollTop: $(".b4icerik").offset().top - 50
    }, 1000);

});

$(".b5").click(function() {
    $('html, body').animate({
        scrollTop: $('.b5icerik').offset().top - 50
    }, 1000);
});


// $(".b6").click(function() {
//     $('html, body').animate({
//         scrollTop: $(".b6icerik").offset().top - 50
//     }, 1000);
//          $(this).addClass('selected');
//      $(".b1").removeClass('selected');
//      $(".b2").removeClass('selected');
//      $(".b3").removeClass('selected');
//      $(".b0").removeClass('selected');
//      $(".b4").removeClass('selected');
//      $(".b5").removeClass('selected');
// });



// $(".b5").click(function() {
//     $('html, body').animate({
//         scrollTop: $(".b5icerik").offset().top - 50
//     }, 1000);
//          $(this).addClass('selected');
//      $(".b1").removeClass('selected');
//      $(".b2").removeClass('selected');
//      $(".b3").removeClass('selected');
//      $(".b0").removeClass('selected');
//      $(".b4").removeClass('selected');
//      $(".b6").removeClass('selected');
// });




$('.nav span').on('click', function(){
    $(".navbar-collapse").collapse('hide');

});

$('#telefon').focus(function() {
    $(this).attr('placeholder', 'Başında 0 olmadan yazın')
}).blur(function() {
    $(this).attr('placeholder', '(5XX) XXX XX XX')
})

//

$(document).ready(function() {
    
    $("#telefon").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

   $('#form1-1i').guardian(); 


});


  // function checkForm(form)
  // {
  //   if(!form1-1i.sozlesme.checked) {
  //     alert("Kullanıcı sözleşmesini kabul etmelisiniz.");
  //     form.terms.focus();
  //     return false;
  //   }
  //   return true;
  // }


//   $(window).scroll(function() {
//    var hT = $('.b1icerik').offset().top,
//        hH = $('.b1icerik').outerHeight(),
//        wH = $(window).height(),
//        wS = $(this).scrollTop();
//    if (wS > (hT+hH-wH)){
//      $(".b1").addClass('selected');
//      $(".b0").removeClass('selected');
//      $(".b2").removeClass('selected');
//      $(".b3").removeClass('selected');
//      $(".b4").removeClass('selected');
//    }
// });


//   $(window).scroll(function() {
//    var hT = $('.b2icerik').offset().top,
//        hH = $('.b2icerik').outerHeight(),
//        wH = $(window).height(),
//        wS = $(this).scrollTop();
//    if (wS > (hT+hH-wH)){
//      $(".b2").addClass('selected');
//      $(".b0").removeClass('selected');
//      $(".b1").removeClass('selected');
//      $(".b3").removeClass('selected');
//      $(".b4").removeClass('selected');
//    }
// });


$(document).ready(function(){

  $("#sozlesme").click(function() {
    // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
    if($(this).is(":checked")) // "this" refers to the element that fired the event
    {
  $('#prependedcheckbox').val("Teşekkürler.");


    } else {

          $('#prependedcheckbox').val("");

    }
});







});

$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


function sonKontrol() { 
    if (document.form1-1i.ad.value == "" ){ 
    document.form1-1i.ad.style.backgroundColor = "#fff";
    $.simplyToast('Lütfen adınızı girin.', 'success');
    document.form1-1i.ad.focus(); 
    return false; 
    } 
     if (document.form1-1i.soyad.value == "" ){ 
    document.form1-1i.soyad.style.backgroundColor = "#fff";
    $.simplyToast('Lütfen soyadınızı girin.', 'success');
    document.form1-1i.soyad.focus(); 
    return false; 
}
     if (document.form1-1i.telefon.value == "" ){ 
    document.form1-1i.telefon.style.backgroundColor = "#fff";
    $.simplyToast('Lütfen telefon numaranızı girin.', 'success');
    document.form1-1i.telefon.focus(); 
    return false; 
}
     if (document.form1-1i.mail.value == "" ){ 
    document.form1-1i.mail.style.backgroundColor = "#fff";
    $.simplyToast('Lütfen e-posta adresinizi girin.', 'success');
    document.form1-1i.mail.focus(); 
    return false; 
}
 var mail = document.form1-1i.mail.value 
    if ( (mail.indexOf ('@',0) == -1) || (mail.indexOf('.',0) == -1) || (mail.indexOf(' ',0) != -1) || (mail.length<6) ){ 
                $.simplyToast('Lütfen e-posta adresinizi kontrol edin.', 'success');

        document.form1-1i.mail.style.backgroundColor = "#fff";        document.form1-1i.mail.focus(); 
        return false; 
    } 
    if (document.form1-1i.sehir.value == "Şehir Seçiniz" || document.form1-1i.sehir.value == "" ){ 
        document.form1-1i.sehir.style.backgroundColor = "#fff";
            $.simplyToast('Lütfen Şehir Seçin.', 'success');
        document.form1-1i.sehir.focus(); 
        return false; 
    } 

      if (document.form1-1i.ilce.value == "İlçe Seçiniz" || document.form1-1i.ilce.value == "" ){ 
        document.form1-1i.ilce.style.backgroundColor = "#fff";
        $.simplyToast('Lütfen ilçe seçin.', 'success');
        document.form1-1i.ilce.focus(); 
        return false; 
    } 
         if (document.form1-1i.adres.value == "" ){ 
    document.form1-1i.adres.style.backgroundColor = "#fff";
    $.simplyToast('Lüten açık adresinizi girin.', 'success');
    document.form1-1i.adres.focus(); 
    return false; 
}

 if(!document.form1-1i.sozlesme.checked)
{
  document.form1-1i.sozlesme.style.backgroundColor = "#fff";
    $.simplyToast('Lütfen kullanıcı sözleşmesini okuyun ve kabul edin.', 'success');
    document.form1-1i.sozlesme.focus(); 
    return false; 
}

}

$('textarea').bind('keypress', function(e) {
  if ((e.keyCode || e.which) == 13) {
    return false;
  }
});



// function toplama(){
// // var urun1 = $("#urun1").val();
// var tutar=$("#urun option:selected").text();
// // var urun2adi=$("#urun2 option:selected").text();
// // var urun3adi=$("#urun3 option:selected").text();
// // var urun1adet = $("#urun1adet").val();
// // var urun2 = $("#urun2").val();
// // var urun2adet = $("#urun2adet").val();
// // var urun3 = $("#urun3").val();
// // var urun3adet = $("#urun3adet").val();
// // var toplam = urun1*urun1adet;
// // var a =urun1*urun1adet;
// // var b=urun2*urun2adet;
// // var c=urun3*urun3adet;
// // var d=$("#ucret2").val();
// // var entoplam=parseInt(a)+parseInt(d);
// // $("#fiyat").val(toplam);
// // $("#fiyat2").val(toplam);
// // $("#toplam").val(entoplam);
// // $("#toplam2").val(entoplam);
// // $("#urun1ad").val(urun1ad);
// // $("#urun2ad").val(urun2adi);
// $("#urunad").val = "mert";
// }

 // window.setInterval(toplama, 1000);

// $(document).ready( function () {
// var form1-1iCalc = function() { 
// var urunismi=$("#urun option:selected").text();
// var urunfiyat=$("#urun option:selected").val();
// var urunadet=$("#adet").val();
// var urunkargo="10";
// var tutar=parseInt(urunadet)*parseInt(urunfiyat)+parseInt(urunkargo);
// $("#urunad").val(urunismi);
// $("#urunfiyat").val(urunfiyat);
// $("#urunadet").val(urunadet);
// $("#kargo_tutar").val(urunkargo);
// $("#tutar").val(tutar);
// return false;
// }
// form1-1iCalc();
// $('select').on('change', function (e) {
// form1-1iCalc();
// return ;
// });
// $('#adet').on('change', function (e) {
// form1-1iCalc();
// return true;
// });

// });
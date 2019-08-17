function siparisKontrol() { 
    if (document.getElementById("siparisNo").value == "" ){ 
        document.getElementById("siparisNo").style.backgroundColor = "#fff";
        $.simplyToast('Sipariş numaranızı girin.', 'success');
        document.getElementById("siparisNo").focus(); 
    } else {
        $.ajax({
            url: "assets/order/js/siparisKontrol.php",
            data: "siparisNo="+$("#siparisNo").val(),
            type: "POST",
            success: function(data){
                document.getElementById("siparisSonucu").innerHTML = data;
            }
        });
    }

}


function sonKontrol() { 
    if (document.form1.ad.value == "" ){ 
        document.form1.ad.style.backgroundColor = "#fff";
        $.simplyToast('Lütfen adınızı girin.', 'success');
        document.form1.ad.focus(); 
        return false; 
    } 
    if (document.form1.email.value == "" ){ 
        document.form1.email.style.backgroundColor = "#fff";
        $.simplyToast('Email adresinizi girin.', 'success');
        document.form1.email.focus(); 
        return false; 
    }
    var mail = document.form1.email.value
    if ( (mail.indexOf ('@',0) == -1) || (mail.indexOf('.',0) == -1) || (mail.indexOf(' ',0) != -1) || (mail.length<6) ){ 
        $.simplyToast('Email adresinizi kontrol edin.', 'success');

        document.form1.email.style.backgroundColor = "#fff";       

        document.form1.email.focus(); 
        return false; 
    } 

    if (document.form1.telefon.value == ""  ){ 
        document.form1.telefon.style.backgroundColor = "#fff";
        $.simplyToast('Lütfen telefon numaranızı girin.', 'success');
        document.form1.telefon.focus(); 
        return false; 
    }

    if (document.form1.telefon.value.length < 10  ){ 
        document.form1.telefon.style.backgroundColor = "#fff";
        $.simplyToast('Telefon numaranızı kontrol edin.', 'success');
        document.form1.telefon.focus(); 
        return false; 
    }

    if (document.form1.adres.value == "" ){ 
        document.form1.adres.style.backgroundColor = "#fff";
        $.simplyToast('Lüten açık adresinizi girin.', 'success');
        document.form1.adres.focus(); 
        return false; 
    }

    if(!document.form1.sozlesme.checked)
    {
      document.form1.sozlesme.style.backgroundColor = "#fff";
      $.simplyToast('Sözleşmeyi kabul etmelisin', 'success');
      document.form1.sozlesme.focus(); 
      return false; 
  }

}

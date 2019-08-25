</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright <?php echo date("Y"); ?> &copy; <b>Tek Ürün 2</b>  </span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="/admin/layouts/login.html">Logout</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="/admin/layouts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Vue JS -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>


<!-- Core plugin JavaScript-->
<script src="/admin/layouts/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/admin/layouts/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/admin/layouts/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/layouts/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script src="/admin/layouts/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Page level plugins -->
<!--<script src="/admin/layouts/vendor/chart.js/Chart.min.js"></script>
-->
<!-- Page level custom scripts -->
<!--<script src="/admin/layouts/js/demo/chart-area-demo.js"></script>
<script src="/admin/layouts/js/demo/chart-pie-demo.js"></script>-->
<script src="/admin/layouts/js/dropzone.js"></script>
<script src="/node_modules/@ckeditor/ckeditor/ckeditor.js"></script>

<script>

    $(document).ready(function () {


        function activateTab(tab) {
            $('.nav-tabs a[href="#' + tab + '"]').tab('show');
        };


        $('#orders').show();

        $('.card').css('visibility', 'visible');

        <?php if (isset($_GET['upload'])) {

        echo '$(\'#product-images-tab\').click();';

        echo ' $(\'.tab-pane\').removeClass(\'show active\');';
        echo '$(\'#product-images\').addClass(\'show active\');';


    } ?>

        setTimeout(function () {
            $('#uploadImage').dropzone();
        }, 1000)

        $('#sidebarToggle').click(function () {
            if (Cookies.get('menu-state') === 'open') {
                Cookies.set('menu-state', 'close');
            } else if (Cookies.get('menu-state') === 'close') {
                Cookies.set('menu-state', 'open');
            } else {
                Cookies.set('menu-state', 'open');
            }
        });


        $('#statistics-toggle').click(function () {
            if (Cookies.get('statistics-state') === 'visible') {
                Cookies.set('statistics-state', 'hidden');
            } else if (Cookies.get('statistics-state') === 'hidden') {
                Cookies.set('statistics-state', 'visible');
            } else {
                Cookies.set('statistics-state', 'visible');
            }
            $('.statistics').toggle('50');

            if ($(this).html() == "İstatistikleri Göster" || $(this).html() == "\n" +
                "            İstatistikleri Göster") {
                $(this).html("İstatistikleri Gizle")
            } else {
                $(this).html("İstatistikleri Göster")
            }
        });

        $('<script/>', {type: 'text/javascript', src: '/admin/layouts/js/jscolor.js'}).appendTo('head');

        if ($("#addProducts").length) {
            $("#addProducts").validate({
                rules: {
                    Name: "required",
                    Price: {
                        required: true,
                        number: true
                    },
                    Stock: {
                        required: true,
                        number: true
                    },
                },
                messages: {
                    Name: "",
                    Price: {
                        required: "",
                        number: ""
                    },
                    Stock: {
                        required: "",
                        number: ""
                    }
                },
                errorPlacement: function (error, element) {
                    return true;
                }
            });
        }


        if ($('#orders').length) {
            if (typeof order != 'undefined') {

                var orders = new Vue({
                    el: '#orders',
                    data: order,
                    methods: {
                        fullName: function () {
                            return order.FirstName + " " + order.LastName;
                        }
                    },
                    mounted() {

                        /* $.validator.setDefaults({
                             submitHandler: function () {
                                 $(this).submit();
                             }
                         });*/
                        // validate signup form on keyup and submit

                        if ($("#addBankAccounts").length) {
                            $("#addBankAccounts").validate({
                                rules: {
                                    Name: "required",
                                    Account: "required"
                                },
                                messages: {
                                    Name: "",
                                    Account: ""
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }
                        if ($("#addExtras").length) {
                            $("#addExtras").validate({
                                rules: {
                                    Name: "required",
                                    Price: {
                                        required: true,
                                        number: true,
                                    }
                                },
                                messages: {
                                    Name: "",
                                    Price: {
                                        required: "",
                                        number: "",
                                    }
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }
                        if ($("#editExtras").length) {
                            $("#editExtras").validate({
                                rules: {
                                    Name: "required",
                                    Price: {
                                        required: true,
                                        number: true,
                                    }
                                },
                                messages: {
                                    Name: "",
                                    Price: {
                                        required: "",
                                        number: ""
                                    }
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }
                        if ($("#editBankAccounts").length) {
                            $("#editBankAccounts").validate({
                                rules: {
                                    Name: "required",
                                    Account: "required"
                                },
                                messages: {
                                    Name: "",
                                    Account: ""
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }


                        if ($("#addPaymentMethods").length) {
                            $("#addPaymentMethods").validate({
                                rules: {
                                    PaymentMethodName: "required"
                                },
                                messages: {
                                    Name: ""
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }


                        if ($("#editPaymentMethods").length) {
                            $("#editPaymentMethods").validate({
                                rules: {
                                    PaymentMethodName: "required"
                                },
                                messages: {
                                    Name: ""
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }


                        if ($("#ordersEdit").length) {
                            $("#ordersEdit").validate({
                                rules: {
                                    FirstName: "required",
                                    LastName: "required",
                                    Mail: {
                                        required: true,
                                        email: true
                                    },
                                    Phone: "required",
                                    Address: "required",
                                    Amount: "required",
                                    /* username: {
                                         required: true,
                                         minlength: 2
                                     },
                                     password: {
                                         required: true,
                                         minlength: 5
                                     },
                                     confirm_password: {
                                         required: true,
                                         minlength: 5,
                                         equalTo: "#password"
                                     },
                                     email: {
                                         required: true,
                                         email: true
                                     },
                                     topic: {
                                         required: "#newsletter:checked",
                                         minlength: 2
                                     },
                                     agree: "required"*/
                                },
                                messages: {
                                    FirstName: "Ad zorunludur",
                                    LastName: "Soyad zorunludur",
                                    Mail: {
                                        required: "",
                                        email: ""
                                    },
                                    Phone: "Telefon zorunludur",
                                    Address: "Adres zorunludur",
                                    Amount: "Adet zorunludur",
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }

                        if ($("#customersEdit").length) {
                            $("#customersEdit").validate({
                                rules: {
                                    FirstName: "required",
                                    LastName: "required",
                                    Mail: {
                                        required: true,
                                        email: true
                                    },
                                    Phone: "required",
                                    Address: "required",
                                },
                                messages: {
                                    FirstName: "",
                                    LastName: "",
                                    Mail: {
                                        required: "",
                                        email: ""
                                    },
                                    Phone: "",
                                    Address: "",
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }

                        if ($("#editProducts").length) {
                            $("#editProducts").validate({
                                rules: {
                                    Name: "required",
                                    Price: {
                                        required: true,
                                        number: true
                                    },
                                    Stock: {
                                        required: true,
                                        number: true
                                    },
                                },
                                messages: {
                                    Name: "",
                                    Price: {
                                        required: "",
                                        number: ""
                                    },
                                    Stock: {
                                        required: "",
                                        number: ""
                                    }
                                },
                                errorPlacement: function (error, element) {
                                    return true;
                                }
                            });
                        }

                        if ($('#ckeditor').length) {

                            CKEDITOR.replace('ckeditor', {
                                language: 'tr'
                            });

                        }

                        if ($('#ckeditor2').length) {

                            CKEDITOR.replace('ckeditor2', {
                                language: 'tr'
                            });

                        }

                        if ($('#ckeditor3').length) {

                            CKEDITOR.replace('ckeditor3', {
                                language: 'tr'
                            });

                        }
                    }
                });
            }
        }

        $(".checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $('#raporAl').click(function () {
            $('.buttons-print').click();
        });

        $('#pdf').click(function () {
            $('.buttons-pdf').click();
        });

        $('#csv').click(function () {
            $('.buttons-csv').click();
        });

        $('#excel').click(function () {
            $('.buttons-excel').click();
        });

        $('#copy').click(function () {
            $('.buttons-copy').click();
            alert('Başarıyla Kopyalandı.')
        });

        $('#raporAl').click(function () {
            $('.buttons-print').click();
        });


        $('#dataTable').DataTable({
            dom: 'Blfrtip',

            buttons: [
                {
                    extend: 'copy',
                    title: 'Rapor',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    }
                },
                {
                    extend: 'csv',
                    title: 'Rapor',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    }
                },
                {
                    extend: 'excel',
                    title: 'Rapor',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Rapor',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    }
                },
                {
                    extend: 'print',
                    title: 'Rapor',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    },
                    customize: function (win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    }
                },
                'colvis'

            ],

            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false,
                },
            ],

            /* buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ],*/

            "order": [[1, "desc"]],
            "language": {
                "decimal": "",
                "emptyTable": "Kayıt bulunamadı.",
                "info": "_TOTAL_ kayıt görüntüleniyor",
                "infoEmpty": "0 ile 0 arasında 0 sonuç",
                "infoFiltered": "(toplam _MAX_ kayıt içerisinde arandı)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Bir Sayfada _MENU_ Sipariş ",
                "loadingRecords": "Yükleniyor...",
                "processing": "İşleniyor...",
                "search": "Arama:",
                "zeroRecords": "Arama kriterlerinizle eşleşen kayıt bulunamadı.",
                "paginate": {
                    "first": "İlk",
                    "last": "Son",
                    "next": "Sonraki",
                    "previous": "Önceki"
                },
                "aria": {
                    "sortAscending": ": Artan Düzen",
                    "sortDescending": ": Azalan Düzen"
                }
            }


        });
        /*$('#dataTable_length label').insertBefore('<a class="multipleDelete d-inline-block text-white mr-2 btn btn-danger">Toplu Sil</a> ');*/
        $('<a class="multipleDelete d-inline-block text-white mr-2 btn btn-primary checkAllText">Tümünü Seç</a><a class="multipleDelete deleteAll d-inline-block text-white mr-2 btn btn-danger">Toplu Sil</a>').insertBefore('#dataTable_length label');

        $(".checkAllText").click(function () {
            $(".checkAll").click();
        });

        $('.deleteAll').click(function () {

            if (confirm("İşleminizden emin misiniz? Bu işlem geri alınamaz")) {
                var allVals = [];
                $('.deleteRecords:checked').each(function () {
                    allVals.push($(this).val());
                });
                var data = {
                    action: "delete",
                    tableName: _page,
                    id: allVals
                    /*id : [ 42,40]*/
                };

                if (allVals == "") {
                    alert('Silinecek siparişleri seçmelisiniz');
                    return 0;
                }
                $.ajax({
                    url: '/admin/core/mcore.php',
                    method: 'post',
                    data: data,
                    success: function (data) {
                        alert("Başarılı");
                        location.reload();
                    }
                })
            }
        });

        $('.deleteThis').click(function () {

            if (confirm("İşleminizden emin misiniz? Bu işlem geri alınamaz")) {
                var allVals = [];

                allVals.push($(this).attr('data-id'));

                var data = {
                    action: "delete",
                    tableName: _page,
                    id: allVals
                    /*id : [ 42,40]*/
                };

                if (allVals == "") {
                    alert('Silinecek siparişleri seçmelisiniz');
                    return 0;
                }
                $.ajax({
                    url: '/admin/core/mcore.php',
                    method: 'post',
                    data: data,
                    success: function (data) {
                        alert("Başarılı");
                        location.reload();
                    }
                })
            }
        });

        if ($('#orderStatus').length > 0) {
            $('#orderStatus option[value="' + order.statusId + '"]').attr("selected", "selected");
            $('#allProducts option[value="' + order.Product + '"]').attr("selected", "selected");
        }


        <?php

        if (isset($_GET['upload'])) {
            switch ($_GET['upload']) {
                case "GoogleAnalytics";
                    echo "activateTab('google-analytics');";
                    break;

                case "SeoSettings";
                    echo "activateTab('seo-settings');";
                    break;

                case "LiveChat";
                    echo "activateTab('live-chat');";
                    break;

                case "Whatsapp";
                    echo "activateTab('whatsapp');";
                    break;

                case "JsCode";
                    echo "activateTab('js-codes');";
                    break;

                case "Maintenance";
                    echo "activateTab('maintenance-mode');";
                    break;

                case "Failed";
                    echo "activateTab('admin-password');";
                    echo "alert('Eski şifrenizi hatalı girdiniz.');";
                    break;

                case "Success";
                    echo "activateTab('admin-password');";
                    echo "alert('Kullanıcı adı ve şifreniz başarıyla değiştirildi.');";
                    break;

                case "Password";
                    echo "activateTab('admin-password');";
                    break;

                case "Banners";
                    echo "activateTab('banner-resim');";
                    break;


                case "Gizlilik";
                    echo "activateTab('gizlilik-sozlesmesi');";
                    break;

                case "Iptal";
                    echo "activateTab('iade-sozlesmesi');";
                    break;

                case "Videos";
                    echo "activateTab('video-thumb');";
                    break;

            }
        }
        ?>

        function checkPasswordMatch() {
            var password = $("input[name=NewPassword]").val();
            var confirmPassword = $("input[name=NewPasswordRepeat]").val();

            if (password != confirmPassword || (password == "") || (confirmPassword == "")) {
                $("input[name=NewPassword], input[name=NewPasswordRepeat]").attr('style', 'background:red; color: white');
                return 0;
            } else {
                $("input[name=NewPassword], input[name=NewPasswordRepeat]").attr('style', 'background:green; color: white');
                return 1;
            }
        }

        $('#show-password').click(function () {
            $(this).is(':checked') ? $('input[name=NewPassword],input[name=NewPasswordRepeat]').attr('type', 'text') : $('input[name=NewPassword],input[name=NewPasswordRepeat]').attr('type', 'password');
        });

        check = 0;
        if ($('input[name=NewPassword]').length) {
            $("input[name=NewPasswordRepeat]").keyup(checkPasswordMatch);
            $('#editPassword').submit(function () {
                check = checkPasswordMatch();
                if (check !== 1) {
                    alert('Yeni şifreleriniz eşleşmiyor!');
                    return false;
                }
            })
        }


    });
</script>

</body>

</html>

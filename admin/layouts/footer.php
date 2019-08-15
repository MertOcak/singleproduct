</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright 2019 &copy; Tek Ürün 2  </span>
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


<!-- Page level plugins -->
<script src="/admin/layouts/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/admin/layouts/js/demo/chart-area-demo.js"></script>
<script src="/admin/layouts/js/demo/chart-pie-demo.js"></script>


<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function () {


        $('#sidebarToggle').click(function() {
            if(Cookies.get('menu-state') === 'open') {
                Cookies.set('menu-state', 'close');
            } else  if(Cookies.get('menu-state') === 'close') {
                Cookies.set('menu-state', 'open');
            } else {
                Cookies.set('menu-state', 'open');
            }

        });




        $('<script/>',{type:'text/javascript', src:'/admin/layouts/js/jscolor.js'}).appendTo('head');

        if (typeof order != 'undefined') {

            var orders = new Vue({
                el: '#orders',
                data: order,
                methods: {
                    fullName: function () {
                        return order.FirstName + " " + order.LastName;
                    }
                }
            });
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

        $('.card').css('visibility', 'visible');

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
                    customize: function(win)
                    {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet)
                        {
                            style.styleSheet.cssText = css;
                        }
                        else
                        {
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

        $('#orders').show();

        if ($('#orderStatus').length > 0) {
            $('#orderStatus option[value="' + order.statusId + '"]').attr("selected", "selected");
            $('#allProducts option[value="' + order.Product + '"]').attr("selected", "selected");
        }
    });
</script>


</body>

</html>

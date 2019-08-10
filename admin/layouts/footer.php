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
                <a class="btn btn-primary" href="../../layouts/login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../layouts/vendor/jquery/jquery.min.js"></script>
<script src="../../layouts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../layouts/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../layouts/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../layouts/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../layouts/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>


<!-- Page level plugins -->
<script src="../../layouts/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../layouts/js/demo/chart-area-demo.js"></script>
<script src="../../layouts/js/demo/chart-pie-demo.js"></script>


<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function () {

        $('#raporAl').click(function(){
            $('.buttons-print').click();
        });

        $('#pdf').click(function(){
            $('.buttons-pdf').click();
        });

        $('#csv').click(function(){
            $('.buttons-csv').click();
        });

        $('#excel').click(function(){
            $('.buttons-excel').click();
        });

        $('#copy').click(function(){
            $('.buttons-copy').click();
            alert('Başarıyla Kopyalandı.')
        });

        $('#raporAl').click(function(){
            $('.buttons-print').click();
        });

        $('.card').css('visibility','visible');

        $('#dataTable').DataTable({
            dom: 'Blfrtip',

            buttons: [
                {
                    extend: 'copy',
                    title:'Rapor',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5 ]
                    }
                },
                {
                    extend: 'csv',
                    title:'Rapor',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5 ]
                    }
                },
                {
                    extend: 'excel',
                    title:'Rapor',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5 ]
                    }
                },
                {
                    extend: 'pdf',
                    title:'Rapor',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5 ]
                    }
                },
                {
                    extend: 'print',
                    title:'Rapor',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5 ]
                    }
                },
                'colvis'

            ],

           /* buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],*/

            "order": [[1, "desc"]],
            "language": {
                "decimal": "",
                "emptyTable": "Sipariş bulunamadı.",
                "info": "_TOTAL_ sipariş görüntüleniyor",
                "infoEmpty": "0 ile 0 arasında 0 sonuç",
                "infoFiltered": "(toplam _MAX_ sipariş içerisinde arandı)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Bir Sayfada _MENU_ Sipariş ",
                "loadingRecords": "Yükleniyor...",
                "processing": "İşleniyor...",
                "search": "Arama:",
                "zeroRecords": "Arama kriterlerinizle eşleşen sipariş bulunamadı.",
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

    });
</script>


</body>

</html>

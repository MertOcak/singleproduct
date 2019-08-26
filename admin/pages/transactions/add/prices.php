<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->



    <script>
        var order = <?php  echo json_encode($row) ?>
    </script>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card bg-transparent border-0">
                <div class="card-body p-0 ">
                    <table class="table text-center">
                        <tr>
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Fiyatlar Modülü Ekle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Fiyatlar Modüllerinizi Bu Bölümden Ekleyebilirsiniz</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Fiyat Modülü Ekle
                        </div>


                        <div class="card-body">
                            <form id="addPrice" action="" method="post">
                                <input name="action" value="add" type="hidden">
                                <table class="table">
                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Modül Başlığı</td>
                                        <td>
                                            <input
                                                    name="Title"
                                                    type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Fiyat (₺)</td>
                                        <td>
                                            <input
                                                    name="Price"
                                                    type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="border border-bottom-light">
                                        <td>Aktiflik Durumu</td>
                                        <td><select name="Status"/>
                                            <option value="1" >Aktif</option>
                                            <option value="0" >Pasif</option>
                                            <select> <small class="ml-2"> <span style="color: green;">Aktif</span> = Sipariş formunda listelenir, <span style="color: red;">Pasif</span> = Sipariş formunda listelenmez</small>
                                        </td>
                                    </tr>
                                    <tr class="text-right">
                                        <input type="submit" value="Kaydet">
                                    </tr>
                                </table>
                            </form>

                        </div>




                    </div>
            </div>

        </div>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
<div id="orders" class="container-fluid">
    <script>
        var order = <?php  echo json_encode($row) ?>
    </script>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card bg-transparent border-0">
                <div class="card-body p-0 ">
                    <table class="table text-center">
                        <tr>
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Ekstra Ücret Ekle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Bu Bölümden Ekstra Ücret Ekleyebilirsiniz</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form id="addExtras" action="" method="post">
        <input name="action" value="add" type="hidden">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Ekstra Ücret Bilgileri
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Ekstra Ücret Adı</td>
                                    <td>
                                        <input
                                               name="Name"
                                               type="text"
                                               class="form-control w-40 d-inline-block">
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Ekstra Ücret Fiyatı (₺)</td>
                                    <td>
                                        <input
                                                name="Price"
                                                v-model="order.Price" type="text"
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


                        </div>
                    </div>


            </div>

        </div>
    </form>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
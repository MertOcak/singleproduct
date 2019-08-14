<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM products  WHERE id =' . $_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }*/

    ?>

    <script>
        var order = <?php  echo json_encode($row) ?>
    </script>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td class="bg-gradient-dark text-white dividerBorder">Ürün Numarası: <b> {{ order.Id
                                    }}</b></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            Ürün Bilgileri
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Ürün Adı</td>
                                    <td>
                                        <input name="Name"
                                               v-model="order.Name"
                                               type="text"
                                               class="form-control w-40 d-inline-block"
                                               >
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Ürün Birim Fiyatı ( ₺ = Türk Lirası)</td>
                                    <td>
                                        <input
                                               name="Price"
                                               v-model="order.Price" type="text"
                                               class="form-control w-40 d-inline-block">
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light">
                                    <td>Ürün Aktiflik Durumu</td>
                                    <td><select name="Active" v-model="order.Active"/>
                                        <option v-for = "code in activeList" :value="code.id" >{{code.name}}</option>
                                        <select> <small class="ml-2"> <span style="color: green;">Aktif</span> = Sipariş formunda listelenir, <span style="color: red;">Pasif</span> = Sipariş formunda listelenmez</small>
                                 </td>
                                </tr>
                                <tr class="border border-bottom-light">
                                    <td>Stok Miktarı</td>
                                    <td><input name="Stock" v-model="order.Stock" type="text" class="form-control"></td>
                                </tr>
                                <tr class="text-right">
                                    <input type="submit" value="Kaydet">
                                </tr>
                            </table>


                        </div>
                    </div>

                </form>

            </div>

        </div>
    </form>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
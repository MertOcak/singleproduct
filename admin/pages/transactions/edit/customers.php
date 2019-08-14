<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM customers  WHERE id =' . $_GET['id'];


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
            <div class="card bg-transparent border-0">
                <div class="card-body p-0 ">
                    <table class="table text-center">
                        <tr>
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Müşteri Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Müşteri Numarası: <b> {{ order.id
                                    }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post">
        <input v-model="order.customerId" type="hidden" name="customerId">
        <input v-model="order.productId" type="hidden" name="productId">


        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            Müşteri Bilgileri
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Ad Soyad</td>
                                    <td>
                                        <input style="width: calc(50% - 5px);float:left; margin-right: 10px;"
                                               name="FirstName"
                                               v-model="order.FirstName" type="text"
                                               class="form-control w-40 d-inline-block">
                                        <input name="LastName"
                                               v-model="order.LastName"
                                               type="text"
                                               class="form-control w-40 d-inline-block"
                                               style="width: calc(50% - 5px);float:left;">
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light">
                                    <td>Mail</td>
                                    <td><input name="Mail" v-model="order.Mail" type="text" class="form-control"></td>
                                </tr>
                                <tr class="border border-bottom-light">
                                    <td>Telefon</td>
                                    <td><input name="Phone" v-model="order.Phone" type="text" class="form-control"></td>
                                </tr>
                                <tr class="border border-bottom-light">
                                    <td>Adres</td>
                                    <td><textarea name="Address" class="form-control">{{ order.Address}}</textarea></td>
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
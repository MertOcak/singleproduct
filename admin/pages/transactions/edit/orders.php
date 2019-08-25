<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT *, o.id AS orderId, c.id AS customerId, p.id AS productId, s.id AS statusId, n.Note AS currentNote FROM orders o INNER JOIN products p ON p.id = o.Product INNER JOIN customers c ON o.CustomerId = c.Id INNER JOIN paymentmethod pm ON o.PaymentId = pm.id INNER JOIN status s ON o.Status = s.id INNER JOIN notes n ON o.id = n.Id WHERE o.id =' . $_GET['id'];


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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Sipariş Detayları</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Sipariş Numarası: <b> {{ order.orderId
                                    }}</b></td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Sipariş Tarihi: <b> {{ order.CreatedAt
                                    }}</b></td>
                            <td class="bg-gradient-dark-2 text-white ">Sipariş Durumu: <b> {{ order.StatusName }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form id="ordersEdit" action="" method="post">
        <input  v-model="order.customerId" type="hidden" name="customerId">
        <input  v-model="order.productId" type="hidden" name="productId">


    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    Müşteri Bilgileri
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="border border-bottom-light border-right-light">
                            <td>Ad Soyad</td>
                            <td><input style="width: calc(50% - 5px);float:left; margin-right: 10px;" name="FirstName"
                                       v-model="order.FirstName" type="text"
                                       class="form-control w-40 d-inline-block"><input name="LastName"
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
                            <td>Sipariş Adresi</td>
                            <td><textarea name="Address" class="form-control">{{ order.Address}}</textarea></td>
                        </tr>
                        <tr>
                            <input type="submit" value="kaydet">

                        </tr>
                    </table>


                </div>
            </div>


        </div>
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-header">
                    Sipariş Bilgileri
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="border border-bottom-light border-right-light">
                            <td>Durumu</td>
                            <td><select id="orderStatus" name="Status" class="form-control">
                                    <option value="1">Yeni</option>
                                    <option value="2">İncelendi</option>
                                    <option value="3">Hazırlanıyor</option>
                                    <option value="4">Kargolandı</option>
                                    <option value="5">İptal Edildi</option>
                                    <option value="6">Tamamlandı</option>
                                </select></td>
                        </tr>
                        <tr class="border border-bottom-light border-right-light">
                            <td>Ürün</td>
                            <td><select id="allProducts" name="Product" class="form-control">
                                    <?php

                                    $products = $pdo->query("SELECT * FROM products WHERE Active = 1");
                                    while ($row = $products->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='" . $row['Id'] . "'>" . $row['Name'] . "</option>";
                                    }

                                    ?>
                                </select></td>
                        </tr>
                        <tr class="border border-bottom-light">
                            <td>Adet</td>
                            <td><input name="Amount" min="1" v-model="order.Amount" class="form-control" type="number">
                            </td>
                        </tr>
                        <tr class="border border-bottom-light">
                            <td>Eklediğiniz Notlar</td>
                            <td><textarea name="Note" class="form-control">{{ order.Note }}</textarea></td>
                        </tr>
                        <tr>
                        <tr>
                            <input type="submit" value="kaydet">

                        </tr>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
        <div class="col-12 col-xl-12 mt-4 mb-4">
            <div class="card">
                <div class="card-header">
                    Ödeme Bilgileri
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="border border-bottom-light  bg-gradient-primary text-white">
                            <td class="dividerBorder">Ödeme Şekli</td>
                            <td class="text-center"><b> {{ order.PaymentMethodName }}</b></td>
                        </tr>
                        <tr class="border border-bottom-light border-right-light bg-gradient-primary text-white">
                            <td class="dividerBorder">Ürün Fiyatı</td>
                            <td class="text-center"><b> {{ order.ProductPrice }} ₺ </b></td>
                        </tr>
                        <tr class="border border-bottom-light bg-gradient-primary text-white">
                            <td class="dividerBorder">Kargo Ücreti</td>
                            <td class="text-center"><b> {{ order.ShippingFee }} ₺</b></td>
                        </tr>
                        <tr class="border border-bottom-light bg-gradient-danger text-white">
                            <td class="dividerBorder">Toplam Ödenecek</td>
                            <td class="text-center"><b> {{ order.TotalPrice }} ₺</b></td>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>
    </form>

    <?php

    /* if($row) {
         foreach ($row as $column => $value) {
             echo "<div class='card shadow mb-2'>";
             echo "<div class='card-header'><label>" . $column . "</label></div>";
             echo "<div class='card-body'>".$value."</div>";
             echo "</div>";
         }
     } else {
         echo "Kayıt Bulunamadı";
     }*/

    ?>

</div>


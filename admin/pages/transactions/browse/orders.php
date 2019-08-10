<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT *, o.id AS orderId FROM orders o INNER JOIN products p ON p.id = o.Product INNER JOIN customers c ON o.CustomerId = c.Id INNER JOIN paymentmethod pm ON o.PaymentId = pm.id INNER JOIN status s ON o.Status = s.id WHERE o.id =' . $_GET['id'];


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
                            <td class="bg-gradient-dark text-white dividerBorder">Sipariş Numarası: <b> {{ order.orderId
                                    }}</b></td>
                            <td class="bg-gradient-dark text-white dividerBorder">Sipariş Tarihi: <b> {{ order.CreatedAt
                                    }}</b></td>
                            <td class="bg-gradient-dark text-white ">Sipariş Durumu: <b> {{ order.Status }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Müşteri Bilgileri
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="border border-bottom-light border-right-light">
                            <td>Ad Soyad</td>
                            <td><b> {{ order.FirstName }} {{order.LastName }}</b></td>
                        </tr>
                        <tr class="border border-bottom-light">
                            <td>Mail</td>
                            <td><b> {{order.Mail }}</b></td>
                        </tr>
                        <tr class="border border-bottom-light">
                            <td>Telefon</td>
                            <td><b> {{order.Phone }}</b></td>
                        </tr>
                        <tr class="border border-bottom-light">
                            <td>Sipariş Adresi</td>
                            <td><b> {{ order.Address }}</b></td>
                        </tr>
                    </table>


                </div>
            </div>


        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Sipariş Bilgileri
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr class="border border-bottom-light border-right-light">
                            <td>Durumu</td>
                            <td><b> {{ order.StatusName }} </b></td>
                        </tr>
                        <tr class="border border-bottom-light border-right-light">
                            <td>Ürün</td>
                            <td><b> {{ order.Name }} </b></td>
                        </tr>
                        <tr class="border border-bottom-light">
                            <td>Adet</td>
                            <td><b> {{ order.Amount }}</b></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
        <div class="col-md-4">
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

                    <div class="col-md-12">
                        <a :href="'/admin/pages/transactions/orders/edit/' + order.orderId" class="btn btn-warning w-100 text-center text-white">Siparişi Düzenle</a>

                    </div>

                    <div class="col-md-12">
                        <button onclick="window.history.go(-1); return false;" class="btn btn-success w-100 text-center">Geri
                            Dön
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>


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
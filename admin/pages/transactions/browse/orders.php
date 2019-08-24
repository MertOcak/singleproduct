<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT *, o.id AS orderId FROM orders o INNER JOIN products p ON p.id = o.Product INNER JOIN customers c ON o.CustomerId = c.Id INNER JOIN paymentmethod pm ON o.PaymentId = pm.id INNER JOIN status s ON o.Status = s.id INNER JOIN notes n ON o.id = n.Id  WHERE o.id =' . $_GET['id'];


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


 <!--   <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-header bg-white text-primary">
                    <b> SİPARİŞ NUMARASI: {{ order.orderId }}</b>
                </div>
            </div>
        </div>
    </div>-->

    <form id="editOrder">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div style="background: #4e73df;" class="card-header text-white">
                        Sipariş Detayları
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr class="border">
                                <td class="dividerBorder">Durumu</td>
                                <td><b> {{ order.StatusName }} </b></td>
                            </tr>
                            <tr class="border">
                                <td class="dividerBorder">Referans Site</td>
                                <td><b> {{ order.ReferenceUrl }} </b></td>
                            </tr>
                            <tr class="border">
                                <td class="dividerBorder">Ürün</td>
                                <td><b> {{ order.Name }} </b></td>
                            </tr>
                            <tr class="border">
                                <td class="dividerBorder">Adet</td>
                                <td><b> {{ order.Amount }}</b></td>
                            </tr>

                            <tr class="border ">
                                <td class="dividerBorder">Tarih</td>
                                <td><b> {{ order.CreatedAt }}</b></td>
                            </tr>
                            <tr class="border ">
                                <td class="dividerBorder">Ödeme Şekli</td>
                                <td><b> {{ order.PaymentMethodName }}</b></td>
                            </tr>
                            <tr class="border ">
                                <td class="dividerBorder">Ürün Fiyatı</td>
                                <td><b> {{ order.ProductPrice }} ₺ </b></td>
                            </tr>
                            <tr class="border">
                                <td class="dividerBorder">Kargo Ücreti</td>
                                <td><b> {{ order.ShippingFee }} ₺</b></td>
                            </tr>
                            <tr class="border border-bottom-light text-dark">
                                <td class="dividerBorder font-weight-bold">Toplam Ödenecek</td>
                                <td><b> {{ order.TotalPrice }} ₺</b></td>
                            </tr>
                            <tr>
                                <a :href="'/admin/pages/transactions/orders/edit/' + order.orderId">
                                    <input type="button" value="Düzenle">
                                </a>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card">
                    <div style="background: #4e73df;" class="card-header text-white">
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
                            <tr class="border">
                                <td class="dividerBorder">Eklediğiniz Notlar</td>
                                <td style="background: lightyellow; color: black;"><b> {{ order.Note }}</b></td>
                            </tr>
                            <tr>
                                <a :href="'/admin/pages/transactions/orders/edit/' + order.orderId">
                                    <input type="button" value="Düzenle">
                                </a>
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
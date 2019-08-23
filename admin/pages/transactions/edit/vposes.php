<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM vposes  WHERE id ='.$_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }*/

    ?>

    <script>
        var order = <?php  echo json_encode($row);?>
    </script>

    <div class="row">
        <div class="col-md-12 mb-2">
            <div class="card bg-transparent border-0">
                <div class="card-body p-0 ">
                    <table class="table text-center">
                        <tr>
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Iyzico Sanal Pos Ekle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Bu Bölümden Iyzico Sanal Pos Ayarlarınızı Yapabilirsiniz</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($_GET['id']) && $_GET['id'] == 1) { ?>
        <form id="editIyzico" action="" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Iyzico Entegrasyon Bilgileri
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Api Key</td>
                                    <td>
                                        <input
                                                name="ApiKey"
                                                v-model="order.ApiKey" type="text"
                                                class="form-control w-40 d-inline-block">
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Secret Key</td>
                                    <td>
                                        <input
                                                name="SecretKey"
                                                v-model="order.SecretKey" type="text"
                                                class="form-control w-40 d-inline-block">
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Base Url</td>
                                    <td>
                                        <input
                                                name="BaseUrl"
                                                v-model="order.BaseUrl" type="text"
                                                class="form-control w-40 d-inline-block">
                                    </td>
                                </tr>

                                <tr class="border border-bottom-light">
                                    <td>Aktiflik Durumu</td>
                                    <td><select name="Status" v-model="order.Status"/>
                                        <option v-for = "code in activeList" :value="code.id" >{{code.name}}</option>
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
    <?php } ?>

   <?php if(isset($_GET['id']) && $_GET['id'] == 2) { ?>

    <form id="editPaytr" action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        PayTR Entegrasyon Bilgileri
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr class="border border-bottom-light border-right-light">
                                <td>Merchant Id</td>
                                <td>
                                    <input
                                            name="MerchantId"
                                            v-model="order.MerchantId" type="text"
                                            class="form-control w-40 d-inline-block">
                                </td>
                            </tr>
                            <tr class="border border-bottom-light border-right-light">
                                <td>Merchant Key</td>
                                <td>
                                    <input
                                            name="MerchantKey"
                                            v-model="order.MerchantKey" type="text"
                                            class="form-control w-40 d-inline-block">
                                </td>
                            </tr>
                            <tr class="border border-bottom-light border-right-light">
                                <td>Merchant Salt</td>
                                <td>
                                    <input
                                            name="MerchantSalt"
                                            v-model="order.MerchantSalt" type="text"
                                            class="form-control w-40 d-inline-block">
                                </td>
                            </tr>

                            <tr class="border border-bottom-light">
                                <td>Aktiflik Durumu</td>
                                <td><select name="Status" v-model="order.Status"/>
                                    <option v-for = "code in activeList" :value="code.id" >{{code.name}}</option>
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

    <?php } ?>

</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
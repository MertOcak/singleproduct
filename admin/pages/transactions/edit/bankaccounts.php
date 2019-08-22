<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM bankaccounts  WHERE id =' . $_GET['id'];


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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Bank Hesabı Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">ID: <b> {{ order.id
                                    }}</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form id="editBankAccounts" action="" method="post">
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Bank Hesabı Bilgileri
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Banka Adı</td>
                                    <td>
                                        <input
                                               name="Name"
                                               v-model="order.Name" type="text"
                                               class="form-control w-40 d-inline-block">
                                    </td>
                                </tr>
                                <tr class="border border-bottom-light border-right-light">
                                    <td>Banka Hesap Bilgileri</td>
                                    <td>
                                        <textarea rows="3"
                                                name="Account"
                                                class="form-control w-40 d-inline-block" placeholder="IBAN / Hesap Numaraları">{{ order.Account }}</textarea>
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
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
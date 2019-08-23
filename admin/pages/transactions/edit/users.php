<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM users  WHERE id =' . $_GET['id'];


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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Yönetici Profili
                                Düzenle
                            </td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Bu Bölümden Yönetici Bilgilerinizi
                                Düzenleyebilirsiniz</b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['id']) && $_GET['id'] == 1) { ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Yönetici Bilgileri
                    </div>


                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <!--Profile-->
                            <!--İlk Tab-->
                            <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab"
                               href="#admin-profile" role="tab" aria-controls="admin-profile" aria-selected="true">Profil</a>
                            <!--Password-->
                            <a class="nav-item nav-link" id="password-tab" data-toggle="tab"
                               href="#admin-password" role="tab" aria-controls="admin-password"
                               aria-selected="false">Şifre Değiştir</a>
                        </div>
                    </nav>


                    <div class="tab-content mt-2" id="nav-tabContent">

                        <!--Profile-->
                        <div class="tab-pane fade show active" id="admin-profile" role="tabpanel"
                             aria-labelledby="admin-profile-tab">
                            <!--Content-->
                            <form id="editProfile" action="" method="post">
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
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>E-Posta Adresi</td>
                                            <td>
                                                <input
                                                        name="Mail"
                                                        v-model="order.Mail" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Telefon Numarası</td>
                                            <td>
                                                <input
                                                        name="Phone"
                                                        v-model="order.Phone" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet"></tr>
                                    </table>


                                </div>
                            </form>
                        </div>

                        <!--Password-->
                        <div class="tab-pane fade" id="admin-password" role="tabpanel"
                             aria-labelledby="admin-password-tab">
                            <!--Content-->
                            <form id="editPassword" action="" method="post">
                                <input name="changePassword" type="hidden" value="true">
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Kullanıcı Adı</td>
                                            <td>
                                                <input
                                                        name="UserName"
                                                        v-model="order.UserName" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Eski Şifre</td>
                                            <td>
                                                <input
                                                        name="OldPassword"
                                                        type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Yeni Şifre</td>
                                            <td>
                                                <input
                                                        name="NewPassword"
                                                        type="password"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Yeni Şifre (Tekrar)</td>
                                            <td>
                                                <input
                                                        name="NewPasswordRepeat"
                                                        type="password"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td></td>
                                            <td>
                                                <input id="show-password" type="checkbox"> <label style="top:2px;cursor:pointer" class="disableSelection" for="show-password">Şifreleri Göster</label>
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>


                                </div>
                            </form>

                        </div>


                    </div>


                </div>
            </div>

        </div>

    <?php } ?>

    <?php if (isset($_GET['id']) && $_GET['id'] == 2) { ?>

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
                                        <option v-for="code in activeList" :value="code.id">{{code.name}}</option>
                                        <select> <small class="ml-2"> <span style="color: green;">Aktif</span> = Sipariş
                                                formunda listelenir, <span style="color: red;">Pasif</span> = Sipariş
                                                formunda listelenmez</small>
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
    activeList = [{"id": "1", "name": "Aktif"}, {"id": "0", "name": "Pasif"}];
</script>
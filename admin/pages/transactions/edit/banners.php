<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM banners  WHERE id =' . $_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }*/


    $image = $pdo->query("SELECT Path FROM photos WHERE Family = 'banners'")->fetch();
    $imagePath = $image['Path'];

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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Banner Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Banner Ayarlarınızı Bu Bölümden Yapabilirsiniz</td>
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
                            Banner Ayarları
                        </div>


                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <!--Profile-->
                                <!--İlk Tab-->
                                <a class="nav-item nav-link active" id="profile-tab" data-toggle="tab"
                                   href="#banner-yazilar" role="tab" aria-controls="banner-yazilar" aria-selected="true">Banner Yazılar</a>
                                <!--Password-->
                                <a class="nav-item nav-link" id="password-tab" data-toggle="tab"
                                   href="#banner-resim" role="tab" aria-controls="banner-resim"
                                   aria-selected="false">Banner Resimler</a>
                            </div>
                        </nav>


                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!--Banner Yazılar-->
                            <div class="tab-pane fade show active" id="banner-yazilar" role="tabpanel"
                                 aria-labelledby="banner-yazilar-tab">
                                <!--Content-->
                                <div class="card-body">
                                    <form action="" method="post">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Marka Adı Logo</td>
                                            <td>
                                                <input
                                                        name="LogoText1"
                                                        v-model="order.LogoText1" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Marka Slogan Logo</td>
                                            <td>
                                                <input
                                                        name="LogoText2"
                                                        v-model="order.LogoText2" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Marka Adı Banner</td>
                                            <td>
                                                <input
                                                        name="SloganText1"
                                                        v-model="order.SloganText1" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Slogan 1 Banner</td>
                                            <td>
                                                <input
                                                        name="SloganText2"
                                                        v-model="order.SloganText2" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Slogan 2 Banner</td>
                                            <td>
                                                <input
                                                        name="SloganText3"
                                                        v-model="order.SloganText3" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>
                                    </form>

                                </div>


                            </div>

                            <!--Banner Resim-->
                            <div class="tab-pane fade" id="banner-resim" role="tabpanel"
                                 aria-labelledby="banner-resim-tab">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Banner Resmi</td>
                                            <td>
                                                <img width="100" src="<?php echo $imagePath; ?>" alt="">
                                            </td>
                                            <td>
                                                <form id="Image" enctype="multipart/form-data" method="post" action="/admin/pages/upload/upload.php">
                                                    <input name="photoCatName" type="hidden" value="banners">
                                                    <input type="file" name="file" accept="image/x-png,image/gif,image/jpeg">
                                                    <input type="submit" onclick="document.getElementById('Image').submit();" value="Resim Yükle">
                                                </form>
                                            </td>
                                        </tr>
                                    </table>


                                </div>


                            </div>


                        </div>




                    </div>
            </div>

        </div>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
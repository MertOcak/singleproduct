<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM prices  WHERE id =' . $_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }*/


    $image = $pdo->query("SELECT Path FROM photos WHERE Family = ".$_GET['id'])->fetch();
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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Fiyatlar Modülü Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Fiyatlar Modüllerinizi Bu Bölümden Düzenleyebilirsiniz</td>
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
                            Fiyat Modülü Ayarları
                        </div>


                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <!--Profile-->
                                <!--İlk Tab-->
                                <a class="nav-item nav-link active" id="yazilar-tab" data-toggle="tab"
                                   href="#fiyatlar-yazilar" role="tab" aria-controls="fiyatlar-yazilar" aria-selected="true">Modül İçeriği</a>
                                <!--Password-->
                                <a class="nav-item nav-link" id="resim-tab" data-toggle="tab"
                                   href="#fiyatlar-resim" role="tab" aria-controls="fiyatlar-resim"
                                   aria-selected="false">Modül Resimler</a>
                            </div>
                        </nav>


                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!--Banner Yazılar-->
                            <div class="tab-pane fade show active" id="fiyatlar-yazilar" role="tabpanel"
                                 aria-labelledby="fiyatlar-yazilar-tab">
                                <!--Content-->
                                <div class="card-body">
                                    <form action="" method="post">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Modül Başlığı</td>
                                            <td>
                                                <input
                                                        name="Title"
                                                        v-model="order.Title" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Fiyat (₺)</td>
                                            <td>
                                                <input
                                                        name="Price"
                                                        v-model="order.Price" type="text"
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
                                    </form>

                                </div>


                            </div>

                            <!--Banner Resim-->
                            <div class="tab-pane fade" id="fiyatlar-resim" role="tabpanel"
                                 aria-labelledby="fiyatlar-resim-tab">
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
                                                    <input name="photoPrice" type="hidden" value="<?=$_GET['id']?>">
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
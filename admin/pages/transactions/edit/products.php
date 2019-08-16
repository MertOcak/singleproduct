<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM products WHERE id =' . $_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }*/

    $sql = 'SELECT * FROM photos WHERE id =' . $_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $photos = $pdo->query($sql);

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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Ürün Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Ürün Numarası: <b> {{ order.Id
                                    }}</b></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <!------->
                    <div class="card">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <!--Tema Rengi-->
                                <!--İlk Tab-->
                                <!--Google Analytics-->
                                <a class="nav-item nav-link active" id="product-info-tab" data-toggle="tab" href="#product-info" role="tab" aria-controls="product-info" aria-selected="true">Ürün Bilgileri</a>
                                <a class="nav-item nav-link" id="product-images-tab" data-toggle="tab" href="#product-images" role="tab" aria-controls="product-images" aria-selected="false">Ürün Fotoğrafları</a>

                            </div>
                        </nav>
                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!--Ürün Bilgileri-->
                            <div class="tab-pane fade show active" id="product-info" role="tabpanel" aria-labelledby="product-info-tab">
                                <!--Content-->
                                <form action="" method="post">
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
                                </form>
                            </div>


                            <!--Ürün Fotoğrafları-->
                            <div class="tab-pane fade" id="product-images" role="tabpanel" aria-labelledby="product-images-tab">
                                <!--Content-->

                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">

                                            <td>
                                                <form method="post" action="/admin/pages/upload/upload.php"
                                                      class="dropzone"
                                                      id="uploadImage">
                                                    <input name="productPhotoId" v-model="order.Id" type="hidden" >
                                                </form>
                                            </td>
                                        </tr>
                                    </table>

                                    <tr class="border border-bottom-light border-right-light">


                                        <?php
                                        foreach ($photos as $photo) {
                                            print "<img width='100' style='margin-right:20px' src='".$photo["Path"]."'>";
                                        }
                                        ?>


                                    </tr>
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
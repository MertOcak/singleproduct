<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM agreements  WHERE id = 1';


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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Sözleşme
                                Düzenle
                            </td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Sözleşme Ayarlarınızı Bu Bölümden
                                Yapabilirsiniz
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 d-none">
        <div class="col-4">
            <a href="/admin/pages/transactions/agreements/edit/1" class="btn btn-primary text-white"> Mesafeli Satış Sözleşmesi</a>
            <a href="/admin/pages/transactions/agreements/edit/1/Gizlilik" class="btn btn-primary text-white"> Gizlilik Sözleşmesi</a>
            <a href="/admin/pages/transactions/agreements/edit/1/Iptal" class="btn btn-primary text-white"> İptal ve İade Koşulları</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
            <div class="card">
<!--                <div class="card-header">
                    Sözleşme Ayarları
                </div>-->

                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <!--Mesafeli Satış Sözleşmesi-->
                        <!--İlk Tab-->
                        <?php // if(!isset($_GET['upload'])) { ?>


                        <a class="nav-item nav-link active" id="mesafeli-tab" data-toggle="tab"
                           href="#mesafeli" role="tab" aria-controls="mesafeli"
                           aria-selected="true">Mesafeli Satış Sözleşmesi</a>

                        <?php // } ?>


                        <?php // if(isset($_GET['upload']) && $_GET['upload'] === 'Gizlilik') { ?>

                        <!--Gizlilik Sözleşmesi-->
                        <a class="nav-item nav-link" id="gizlilik-tab" data-toggle="tab"
                           href="#gizlilik-sozlesmesi" role="tab" aria-controls="gizlilik-sozlesmesi"
                           aria-selected="false">Gizlilik Sözleşmesi</a>

                        <?php // } ?>


                        <?php // if(isset($_GET['upload']) && $_GET['upload'] === 'Iptal') { ?>

                        <!--İptal ve İade Koşulları-->
                        <a class="nav-item nav-link" id="iade-tab" data-toggle="tab"
                           href="#iade-sozlesmesi" role="tab" aria-controls="iade-sozlesmesi"
                           aria-selected="false">İptal ve İade Koşulları</a>

                        <?php // } ?>

                    </div>
                </nav>


                <div class="tab-content mt-2" id="nav-tabContent">

                <?php // if(!isset($_GET['upload'])) { ?>
                    <!-- Mesafeli Satış Sözleşmesi-->
                    <div class="tab-pane fade show active" id="mesafeli" role="tabpanel"
                         aria-labelledby="mesafeli-tab">
                        <!--Content-->
                        <div class="card-body">
                           <!-- <form action="" method="post">-->
                                <table class="table">
                                    <tr class="text-right">
                                        <input type="submit" value="Kaydet">
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                            <textarea id="ckeditor"
                                                      name="Mss"
                                                      v-model="order.Mss"
                                                      class="form-control w-40 d-none"></textarea>
                                    </tr>

                                </table>
                  <!--          </form>-->

                        </div>


                    </div>

                <?php // } ?>

                    <?php // if(isset($_GET['upload']) && $_GET['upload'] === 'Gizlilik') { ?>

                    <!-- Gizlilik Sözleşmesi -->
                    <div class="tab-pane fade" id="gizlilik-sozlesmesi" role="tabpanel"
                         aria-labelledby="gizlilik-sozlesmesi-tab">
                        <!--Content-->
                        <div class="card-body">
<!--                            <form action="" method="post">
-->                                <table class="table">
                                    <tr class="text-right">
                                        <input type="submit" value="Kaydet">
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                         <textarea id="ckeditor2"
                                                   name="Gs"
                                                   v-model="order.Gs"
                                                   class="form-control w-40 d-none"></textarea>
                                    </tr>

                                </table>
                         <!--   </form>-->

                        </div>


                    </div>
                    <?php // } ?>

                    <?php // if(isset($_GET['upload']) && $_GET['upload'] === 'Iptal') { ?>

                    <!-- İptal ve İade Koşulları -->
                    <div class="tab-pane fade" id="iade-sozlesmesi" role="tabpanel"
                         aria-labelledby="iade-tab">
                        <!--Content-->
                        <div class="card-body">
                            <!--<form action="" method="post">-->
                                <table class="table">
                                    <tr class="text-right">
                                        <input type="submit" value="Kaydet">
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                        <textarea id="ckeditor3"
                                               name="Iade"
                                               v-model="order.Iade"
                                                  class="form-control w-40 d-none"></textarea>
                                    </tr>

                                </table>
                          <!--  </form>-->

                        </div>


                    </div>
                    <?php // } ?>
                </div>


            </div>
            </form>
        </div>

    </div>
</div>

<script>
    activeList = [{"id": "1", "name": "Aktif"}, {"id": "0", "name": "Pasif"}];
</script>
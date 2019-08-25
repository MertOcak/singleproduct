<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM videos  WHERE id =' . $_GET['id'];


    /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
    $stmt = $pdo->query($sql);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
    }*/


    $image = $pdo->query("SELECT Path FROM photos WHERE Family = 'videos'")->fetch();
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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Video Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Video Ayarlarınızı Bu Bölümden Yapabilirsiniz</td>
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
                            Video Ayarları
                        </div>


                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <!--Url-->
                                <!--İlk Tab-->
                                <a class="nav-item nav-link active" id="url-tab" data-toggle="tab"
                                   href="#video-url" role="tab" aria-controls="video-url" aria-selected="true">Video Link</a>
                                <!--Thumb-->
                                <a class="nav-item nav-link" id="thumb-tab" data-toggle="tab"
                                   href="#video-thumb" role="tab" aria-controls="video-thumb"
                                   aria-selected="false">Video Kapak Resmi</a>
                            </div>
                        </nav>


                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!--Banner Yazılar-->
                            <div class="tab-pane fade show active" id="video-url" role="tabpanel"
                                 aria-labelledby="video-url-tab">
                                <!--Content-->
                                <div class="card-body">
                                    <form action="" method="post">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Youtube Linki | <small> https://www.youtube.com/watch?v=</small><code class="small">zvBkgsY9xkc</code> |</td>
                                            <td>
                                                <input
                                                        name="Url"
                                                        v-model="order.Url" type="text"
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
                            <div class="tab-pane fade" id="video-thumb" role="tabpanel"
                                 aria-labelledby="video-thumb-tab">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Video Kapak Resmi</td>
                                            <td>
                                                <img width="100" src="<?php echo $imagePath; ?>" alt="">
                                            </td>
                                            <td>
                                                <form id="Image" enctype="multipart/form-data" method="post" action="/admin/pages/upload/upload.php">
                                                    <input name="photoCatName" type="hidden" value="videos">
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
<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM pages  WHERE id =' . $_GET['id'];


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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Sayfa Düzenle</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder">Sayfa Düzenlemelerinizi Bu Bölümden Yapabilirsiniz</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                    <div class="card mb-4">

 <?php if(isset($_GET['id']) && $_GET['id'] == 1) { ?>
     <div class="card-header">
         Şerit Slogan Ayarları
     </div>

     <div class="card-body">
                            <form action="" method="post">
                                <table class="table">

                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Şerit Slogan Başlık</td>
                                        <td>
                                            <input
                                                    name="Title"
                                                    v-model="order.Title" type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Şerit Slogan Alt Başlık</td>
                                        <td>
                                            <input
                                                    name="Subtitle"
                                                    v-model="order.Subtitle" type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="text-right">
                                        <input type="submit" value="Kaydet">
                                    </tr>
                                </table>
                            </form>

                        </div>
 <?php } else { ?>
     <div class="card-header">
         Sayfa Ayarları
     </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <table class="table mb-0">
                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Sayfa Adı</td>
                                        <td>
                                            <input
                                                    name="Name"
                                                    v-model="order.Name" type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Sayfa Başlık</td>
                                        <td>
                                            <input
                                                    name="Title"
                                                    v-model="order.Title" type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="border border-bottom-light border-right-light">
                                        <td>Sayfa Alt Başlık</td>
                                        <td>
                                            <input
                                                    name="Subtitle"
                                                    v-model="order.Subtitle" type="text"
                                                    class="form-control w-40 d-inline-block">
                                        </td>
                                    </tr>
                                    <tr class="border border-bottom-light">
                                        <td>Aktiflik Durumu</td>
                                        <td><select name="Status" v-model="order.Status"/>
                                            <option v-for = "code in activeList" :value="code.id" >{{code.name}}</option>
                                            <select> <small class="ml-2"> <span style="color: green;">Aktif</span> = Sitede görünür, <span style="color: red;">Pasif</span> = Sitede görünmez</small>
                                        </td>
                                    </tr>
                                    <tr class="text-right">
                                        <input type="submit" value="Kaydet">
                                    </tr>
                                </table>
                                <div>
                                            <textarea id="ckeditor"
                                                      name="Content"
                                                      v-model="order.Content"
                                                      class="form-control w-40 d-none"></textarea>
                                </div>
                            </form>

                        </div>
<?php } ?>

                    </div>
            </div>

        </div>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
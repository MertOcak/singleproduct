<div id="orders" class="container-fluid">

    <!--   <div class="col-md-1">
            <h1><?php /*echo $_GET['id'] */ ?></h1>
        </div>-->


    <?php

    $sql = 'SELECT * FROM settings';


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
                            <td style="background: rgb(78, 115, 223);" class="text-white dividerBorder">Genel Ayarları</td>
                            <td class="bg-gradient-dark-2 text-white dividerBorder"><small>Genel Ayarlarınızı Bu Bölümden Yapabilirsiniz</small></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    <div class="card">
                     <!--   <div class="card-header">
                            Genel Ayarlar
                        </div>
-->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <!--Tema Rengi-->
                                <!--İlk Tab-->

                                <a class="nav-item nav-link active" id="theme-color-tab" data-toggle="tab" href="#theme-color" role="tab" aria-controls="theme-color" aria-selected="true">Tema Rengi</a>

                                <!--Google Analytics-->
                                <a class="nav-item nav-link" id="gogole-analytics-tab" data-toggle="tab" href="#gogole-analytics" role="tab" aria-controls="gogole-analytics" aria-selected="false">Google Analytics</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                            </div>
                        </nav>
                        <div class="tab-content mt-2" id="nav-tabContent">

                            <!--Tema Rengi-->

                            <div class="tab-pane fade show active" id="theme-color" role="tabpanel" aria-labelledby="theme-color-tab">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Tema Rengi</td>
                                            <td>
                                                <input
                                                        name="ThemeColor"
                                                        v-model="order.ThemeColor" type="text"
                                                        class="form-control w-40 d-inline-block jscolor">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Yazı Rengi</td>
                                            <td>
                                                <input
                                                        name="TextColor"
                                                        v-model="order.TextColor" type="text"
                                                        class="form-control w-40 d-inline-block jscolor">
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>


                                </div>

                            </div>

                            <!--Google Analytics-->
                            <div class="tab-pane fade" id="gogole-analytics" role="tabpanel" aria-labelledby="gogole-analytics-tab">
                                <!--Content-->

                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Google Analytics Kodu</td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>
                                                <textarea rows="5"
                                                        name="GoogleAnalytics"

                                                        class="form-control w-40 d-inline-block">{{ order.GoogleAnalytics }}</textarea>
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>


                                </div>


                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                        </div>



                    </div>

                </form>

            </div>

        </div>
    </form>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
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
                                <a class="nav-item nav-link" id="google-analytics-tab" data-toggle="tab" href="#google-analytics" role="tab" aria-controls="google-analytics" aria-selected="false">Google Analytics</a>
                                <a class="nav-item nav-link" id="seo-settings-tab" data-toggle="tab" href="#seo-settings" role="tab" aria-controls="seo-settings" aria-selected="false">SEO Ayarları</a>
                                <a class="nav-item nav-link" id="live-chat-tab" data-toggle="tab" href="#live-chat" role="tab" aria-controls="live-chat" aria-selected="false">Canlı Destek</a>
                                <a class="nav-item nav-link" id="js-codes-tab" data-toggle="tab" href="#js-codes" role="tab" aria-controls="js-codes" aria-selected="false">JavaScript Kodları</a>
                                <a class="nav-item nav-link" id="maintenance-mode-tab" data-toggle="tab" href="#maintenance-mode" role="tab" aria-controls="maintenance-mode" aria-selected="false">Bakım Modu</a>
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
                            <div class="tab-pane fade" id="google-analytics" role="tabpanel" aria-labelledby="google-analytics-tab">
                                <!--Content-->

                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Google Analytics Kodu</td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>
                                                <textarea rows="15"
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

                            <!--Seo Ayarları-->
                            <div class="tab-pane fade" id="seo-settings" role="tabpanel" aria-labelledby="seo-settings">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Site Başlığı <code class="small">meta-title</code></td>
                                            <td>
                                                <input
                                                        name="Title"
                                                        v-model="order.Title" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Site Açıklaması <code class="small">meta-description</code></td>
                                            <td>
                                                <input
                                                        name="Description"
                                                        v-model="order.Description" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Anahtar Kelimeler <code class="small"ll>meta-keywords</code></td>
                                            <td>
                                                <input
                                                        name="Keywords"
                                                        v-model="order.Keywords" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Site Yazarı <code class="small">meta-author</code></td>
                                            <td>
                                                <input
                                                        name="Author"
                                                        v-model="order.Author" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Site Sahibi <code class="small">meta-owner</code></td>
                                            <td>
                                                <input
                                                        name="Owner"
                                                        v-model="order.Owner" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Telif Hakları <code class="small">meta-copyright</code></td>
                                            <td>
                                                <input
                                                        name="Copyright"
                                                        v-model="order.Copyright" type="text"
                                                        class="form-control w-40 d-inline-block">
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>


                                </div>

                            </div>

                            <!--Canlı Destek-->
                            <div class="tab-pane fade" id="live-chat" role="tabpanel" aria-labelledby="live-chat">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Canlı Destek Kodu</td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>
                                                <textarea
                                                        name="LiveChat" rows="15"
                                                        class="form-control w-40 d-inline-block">{{ order.LiveChat }}</textarea>
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>


                                </div>

                            </div>

                            <!-- JavaScript Kodları -->
                            <div class="tab-pane fade" id="js-codes" role="tabpanel" aria-labelledby="js-codes">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>Ekstra JavaScript Kodları</td>
                                        </tr>
                                        <tr class="border border-bottom-light border-right-light">
                                            <td>
                                                <textarea
                                                        name="Js" rows="15"
                                                        class="form-control w-40 d-inline-block">{{ order.Js }}</textarea>
                                            </td>
                                        </tr>
                                        <tr class="text-right">
                                            <input type="submit" value="Kaydet">
                                        </tr>
                                    </table>


                                </div>

                            </div>

                            <!-- Bakım Modu -->
                            <div class="tab-pane fade" id="maintenance-mode" role="tabpanel" aria-labelledby="maintenance-mode">
                                <!--Content-->
                                <div class="card-body">
                                    <table class="table">
                                        <tr class="border border-bottom-light">
                                            <td>Bakım Modu <small>Siteyi bakım moduna alır</small></td>
                                            <td><select name="Maintenance" v-model="order.Maintenance"/>
                                                <option v-for = "code in activeList" :value="code.id" >{{code.name}}</option>
                                                <select> <small class="ml-2"> <span style="color: green;">Aktif</span> = Site kapalı, <span style="color: red;">Pasif</span> = Site açık</small>
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

        </div>
</div>

<script>
    activeList = [{ "id": "1", "name": "Aktif"},{ "id": "0", "name": "Pasif"}];
</script>
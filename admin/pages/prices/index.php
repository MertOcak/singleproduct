<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../../core/mcore.php");
include "../../layouts/header.php";
?>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!--Statistics-->
    <div class="row col-12">
        <button id="statistics-toggle" class="btn btn-primary text-white mb-2">
            İstatistikleri <?php if (isset($_COOKIE['statistics-state']) && $_COOKIE['statistics-state'] === "hidden") {
                echo 'Göster';
            } else {
                echo 'Gizle';
            } ?></button>

    </div>
    <!-- Content Row -->
    <div class="row statistics" <?php if (isset($_COOKIE['statistics-state']) && $_COOKIE['statistics-state'] === "hidden") {
        echo 'style="display:none;"';
    } ?>>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">BUGÜN ALINAN
                                SİPARİŞLER
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $todaysOrders = $pdo->query('select COUNT(id) AS Count from orders where CreatedAt  >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)');
                                $row = $todaysOrders->fetch(PDO::FETCH_ASSOC);
                                echo $row['Count'] . " Sipariş";
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TÜM SİPARİŞLER</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                        $todaysOrders = $pdo->query('select COUNT(id) AS Count from orders where Active = 1');
                                        $row = $todaysOrders->fetch(PDO::FETCH_ASSOC);
                                        echo $row['Count'] . " Sipariş";
                                        ?>
                                    </div>
                                </div>
                                <!--             <div class="col">
                                                 <div class="progress progress-sm mr-2">
                                                     <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                          aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                 </div>
                                             </div>-->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weighborder-left-success text-uppercase mb-1">GELİRLER (Aylık)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                $monthlyIncomes = $pdo->query('select SUM(TotalPrice) AS TotalIncome from orders where CreatedAt  >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)');
                                $row = $monthlyIncomes->fetch(PDO::FETCH_ASSOC);
                                echo $row['TotalIncome'] . ' ₺';
                                ?>


                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weighborder-left-success text-uppercase mb-1">GELİRLER (Yıllık)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $yearlyIncomes = $pdo->query('select SUM(TotalPrice) AS TotalIncome from orders where CreatedAt  >= DATE_SUB(CURDATE(), INTERVAL 365 DAY)');
                                $row = $yearlyIncomes->fetch(PDO::FETCH_ASSOC);
                                echo $row['TotalIncome'] . ' ₺';
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /Statistics-->
    <!-- Content Row -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><!--Siparişler--></h1>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Fiyat Modülleri <a
                        href="/admin/pages/transactions/prices/add"><input type="button" value="Yeni Ekle"></a>
            </h6>
            <div style="position: absolute; top:10px; right: 10px;" class="float-right">
                <a id="raporAl" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Rapor Al</a>
                <a id="pdf" href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i
                            class="fas fa-file-pdf fa-sm text-white-50"></i> Pdf</a>
                <a id="csv" href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i
                            class="fas fa-file-csv fa-sm text-white-50"></i> Csv</a>
                <a id="excel" href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                            class="fas fa-file-excel fa-sm text-white-50"></i> Excel</a>
                <a id="copy" href="#" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                            class="fas fa-copy fa-sm text-white-50"></i> Panoya Kopyala</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="selectColumn"><input class="checkAll" name="checkbox[]" type="checkbox"></th>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Fiyat</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    // Shorthand If / Else tanımlaması
                    $stmt = $pdo->query('SELECT * FROM prices WHERE Active= 1');
                    while ($row = $stmt->fetch()) {
                         $activeStatus = ($row['Status'] === 1) ? 'Aktif' : 'Pasif';
                            echo "<tr style='font-size: 13px' class='text-center'><th class='selectColumn'><input class='deleteRecords' name=\"checkbox[]\" type=\"checkbox\" value=\"" . $row['id'] . "\"></th><th>" . $row['id'] . "</th><th class='text-center'>" . $row['Title'] . "</th><th>" . $row['Price'] . " ₺</th><th><a href='/admin/pages/transactions/prices/edit/" . $row['id'] . "'><button class='btn btn-circle btn-warning'><i class='fa fa-edit'></i></button></a><button data-id='" . $row['id'] . "' class='btn btn-circle btn-danger ml-1 deleteThis'><i class='fa fa-trash'></i></button></th></tr>";

                    }

                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Content Row -->

    <div class="row d-none">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                        <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                        <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row d-none">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

            <!-- Color System -->
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <!--  <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                               src="../../layouts/img/undraw_posting_photo.svg" alt="">-->
                    </div>
                    <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow"
                                                                                          href="https://undraw.co/">unDraw</a>,
                        a constantly updated collection of beautiful svg images that you can use completely free and
                        without attribution!</p>
                    <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw
                        &rarr;</a>
                </div>
            </div>

            <!-- Approach -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                </div>
                <div class="card-body">
                    <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and
                        poor page performance. Custom CSS classes are used to create custom components and custom
                        utility classes.</p>
                    <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap
                        framework, especially the utility classes.</p>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    _page = "prices";
</script>

<?php
include "../../layouts/footer.php";
?>


<h1>Sipariş Düzenle</h1>
<div class="row">

    <div class="col-md-3">
        <h1><?php echo $_GET['id'] ?></h1>
    </div>

    <div class="col-md-9">
        <?php

        $sql ='SELECT o.Id AS Id, o.Status AS Status, o.CreatedAt AS date, c.FirstName AS FirstName, c.LastName AS LastName, p.Name AS pName FROM orders o INNER JOIN products p ON p.id = o.Product INNER JOIN customers c ON o.CustomerId = c.Id WHERE o.id ='.$_GET['id'];

        /*        $sql = "SELECT * FROM " . $_GET['module'] . " WHERE Id = " . $_GET['id'];*/
        $stmt = $pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        /*while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            print_r($row);
        }*/
        if($row) {
            foreach ($row as $column => $value) {
                echo "<div><label>" . $column . "</label></div>";
                echo "<div class='form-group'><input class='form-control' type='text' value='" . $value . "'></div>";
            }
        } else {
            echo "Kayıt Bulunamadı";
        }

        ?>
        <button class="btn btn-primary w-100 mb-5">Kaydet</button>

    </div>
</div>
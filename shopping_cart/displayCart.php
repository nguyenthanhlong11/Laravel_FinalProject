<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ThanhLongFashion</title>
    <link rel="stylesheet" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./code/sport.css">
</head>
<style type="text/css">
    .wrapper {
        width: 900px;
        margin: 0 auto;
    }

    .page-header h2 {
        margin-top: 0;
    }

    table tr td:last-child a {
        margin-right: 15px;
    }
</style>

<!-- ------------------------------------------------------------------------------------------------------------ -->

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h1 class="pull-left">Giỏ Hàng</h1>
                        <a href="../code/thanhtoan.php" class="btn btn-danger pull-right">Thanh Toán<br></a>
                        <a href="../index.php" class="btn btn-primary pull-right">Quay lại</a>

                    </div>
                    <?php
                    require('../connect.php');
                    $id_cus = $_SESSION["id"];

                    $sql = "SELECT products.name, products.price ,products.Images, orders_details.quantity, products.price* orders_details.quantity as total FROM products,orders_details,orders WHERE products.id = orders_details.prod_id and orders_details.ord_id = orders.id and orders.cus_id = " . $id_cus;

                    $linkImage = '../Image/';
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";

                            echo "<tr>";
                            echo "<th>Images</th>";
                            echo "<th>Name</th>";
                            echo "<th>Price</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Total</th>";
                            echo "<th>Action</th>";




                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                    ?>
                                <td><img src=" <?php echo $linkImage . $row['Images'] ?>" width=50px></td>
                    <?php
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['total'] . "</td>";
                                echo "<td width='10px'>";
                                echo "<a href='deleteCart.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";

                            echo "</table>";

                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em> Không tìm thấy sản phẩm.</em></p>";
                        }
                    } else {
                        echo "Lỗi! Vui lòng thử lại sau $sql. " . mysqli_error($link);
                    }

                    mysqli_close($link);
                    ?>

                </div>
            </div>

        </div>

    </div>
    </div>
</body>

</html>
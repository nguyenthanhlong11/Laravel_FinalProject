<?php

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    require_once("../connect.php");

    $sql = "DELETE products.name, products.price ,products.Images, orders_details.quantity, products.price* orders_details.quantity as total FROM products,orders_details,orders WHERE products.id = orders_details.prod_id and orders_details.ord_id = orders.id and orders.cus_id = " . $id_cus;

    if ($stmt = mysqli_prepare($link, $sql)) {

        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {

            header("location: displayCart.php");
            exit();
        } else {
            echo "Lỗi! Vui lòng thử lại sau.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
} else {

    if (empty(trim($_GET["id"]))) {

        header("location: ../error.php");
        exit();
    }
}
?>

<!-- ------------------------------------------------------------------------------------------------------------ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ThanhLongFashion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Xóa sản phẩm</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Bạn có chắc chắn xóa ?</p><br>
                            <p>
                                <input type="submit" value="Sai" class="btn btn-danger">
                                <a href="displayCart.php" class="btn btn-default">Đúng</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
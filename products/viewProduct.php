<?php

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

    require_once("../connect.php");

    $sql = "SELECT * FROM products WHERE id = ?";
    $linkImage = '../Image/';
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        $param_id = trim($_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {

                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $name = $row["name"];
                $price = $row["price"];
                $quantity = $row["quantity"];
                $Category = $row["category_id"];
                $comment = $row["comments"];
                $image = $row["Images"];
            } else {
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
} else {

    header("location: error.php");
    exit();
}
?>
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

<!-- ------------------------------------------------------------------------------------------------------------ -->

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Xem Sản Phẩm</h1>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label>Ảnh</label>
                                <p class="form-control-static"><img src=" <?php echo $linkImage . $row['Images'] ?>" width=150px></p>
                            </div>
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <p class="form-control-static"><?php echo $row["name"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <p class="form-control-static"><?php echo $row["price"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Số Lượng</label>
                                <p class="form-control-static"><?php echo $row["quantity"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <p class="form-control-static"><?php echo $row["category_id"]; ?></p>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <p class="form-control-static"><?php echo $row["comments"]; ?></p>
                            </div>

                        </div>
                    </div>

                    <p><a href="selectAllProduct.php" class="btn btn-primary">Quay lại</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
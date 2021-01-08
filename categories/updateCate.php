<?php
require("../connect.php");
// xác định biến và khởi tạo giá trị
$name = $price = $quantity = $category_id = $comments = $image = "";
$name_err = $price_err = $quantity_err = $category_id_err = $comments_err =  "";

// xử lý
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // nhận giá trị vàoss
    $id = $_POST["id"];
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Vui lòng nhập tên sản phẩm.";
    } else {
        $name = $input_name;
    }


    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Vui lòng nhập giá.";
    } elseif (!ctype_digit($input_price)) {
        $price_err = "Vui lòng nhập giá khác.";
    } else {
        $price = $input_price;
    }


    $input_quantity = trim($_POST["quantity"]);
    if (empty($input_quantity)) {
        $quantity_err = "Vui lòng nhập số lượng.";
    } elseif (!ctype_digit($input_quantity)) {
        $quantity_err = "Vui lòng nhập số khác.";
    } else {
        $quantity = $input_quantity;
    }


    $input_category_id = trim($_POST["category_id"]);
    if (empty($input_price)) {
        $category_id_err = "Vui lòng nhập tên mặt hàng.";
    } elseif (!ctype_digit($input_category_id)) {
        $category_id_err = "Vui lòng chọn mặt hàng khác.";
    } else {
        $category_id = $input_category_id;
    }


    $input_comment = trim($_POST["comment"]);
    if (empty($input_comment)) {
        $comment_err = "Vui lòng nhập ghi chú.";
    } else {
        $comment = $input_comment;
    }


    if (
        empty($name_err) && empty($price_err) && empty($quantity_err)
        && empty($category_id_err) && empty($comment_err)
    ) {

        $sql = "UPDATE products SET name=?, price=?, quantity=?, category_id=?, comments=?,Images WHERE id=?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "siiissi", $param_name, $param_price, $param_quantity, $param_cate_id, $param_comment, $param_Image, $param_id);


            $param_name = $name;
            $param_price = $price;
            $param_quantity = $quantity;
            $param_cate_id = $category_id;
            $param_comment = $comment;
            $param_Image = $image;
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {

                header("location: selectAllProduct.php");
                exit();
            } else {
                echo "Lỗi. Vui lòng thử lại.";
            }
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
} else {

    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM products WHERE id = ?";
        $linkImage = '../Image/';

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["name"];
                    $price = $row["price"];
                    $quantity = $row["quantity"];
                    $category_id = $row["category_id"];
                    $comment = $row["comments"];
                    $Image = $linkImage . $row["Images"];
                } else {
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Lỗi. Vui lòng thử lại.";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    } else {
    }
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
                        <h2>Chỉnh sửa sản phẩm</h2>
                    </div>
                    <p>Vui lòng nhập thông tin sản phẩm.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Giá</label>
                            <input name="price" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($quantity_err)) ? 'has-error' : ''; ?>">
                            <label>Số lượng</label>
                            <textarea name="quantity" class="form-control"><?php echo $quantity; ?></textarea>
                            <span class="help-block"><?php echo $quantity_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label> Loại sản phẩm </label>
                            <select class="form-control" name="category_id">
                                <?php
                                require("../connect.php");
                                $res_cate_id = mysqli_query($link, "SELECT * FROM categories WHERE id = " . $row['category_id']);
                                while ($rowCa = mysqli_fetch_assoc($res_cate_id)) {
                                ?>
                                    <option value="<?php echo $rowCa['id']; ?>"><?php echo $rowCa['name']; ?></option>

                                    <?php
                                }

                                $sqlCate = "SELECT * FROM categories";
                                $resCate = mysqli_query($link, $sqlCate);

                                while ($rowCate = mysqli_fetch_assoc($resCate)) {
                                    if ($rowCate['id'] != $row['category_id']) {

                                    ?>
                                        <option value="<?php echo $rowCate['id']; ?>"><?php echo $rowCate['name']; ?></option>

                                <?php
                                    }
                                }
                                mysqli_close($link);
                                ?>

                            </select>
                            <span class="help-block"><?php echo $category_id_err; ?></span>

                        </div>
                        <div class="form-group <?php echo (!empty($comment_err)) ? 'has-error' : ''; ?>">
                            <label>Ghi chú</label>
                            <input type="text" name="comment" class="form-control" value="<?php echo $comment; ?>">
                            <span class="help-block"><?php echo $comment_err; ?></span>
                        </div>
                        <div class="form-group">

                            <label> Chọn hình ảnh sản phẩm </label>
                            <input type="file" name="FileImage">
                            <span style="color: red"><img src=" <?php echo $linkImage . $row['Images'] ?>" width=150px></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Xong">
                        <a href="../categories/selectAllCategories.php" class="btn btn-default">Đóng</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
// xóa sau khi xác nhận
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // trả về kết quả sau xóa
    require_once("../connect.php");
    $sql = "DELETE FROM categories WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        // đặt tham số
        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            // chuyển đến trang sản phẩm sau khi xóa
            header("location: selectAllCategories.php");
            exit();
        } else {
            echo "Có lỗi, vui lòng thử lại";
        }
    }

    // đóng statement 
    mysqli_stmt_close($stmt);

    // Ngắt kết nối
    mysqli_close($link);
} else {
    // Check sự tồn tại của id
    if (empty(trim($_GET["id"]))) {
        // nếu không tìm được id chuyển đến trang báo lỗi
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
                        <h1>Xóa Sản Phẩm</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Bạn chắn chắn muốn xóa?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="selectAllCategories.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
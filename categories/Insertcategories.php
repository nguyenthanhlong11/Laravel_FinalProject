<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ThanhLongFashion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div class="container-fluid" style="width: 40%">
        <div class="panel panel-info">
            <div class="panel-heading">
                <center>
                    <h3 class="panel-title"> Thêm Loại Sản Phẩm</h3>
                </center>
            </div>
            <div class="panel-body">
                <form action="Insertcategories.php" method="POST" role="form">
                    <div class="form-group">
                        <label for="">Tên Loại Sản Phẩm</label>
                        <input type="text" class="form-control" name="Products_name" id="Products_name" placeholder="nhập loại sản phẩm" value="" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="nhập mô tả" value="" required="required" min="1">
                    </div>

                    <div class="form-group">
                        <label>Icon</label>
                        <input type="file" name="FileImage" required>

                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-left: 20%">
                        <input type="submit" class="btn btn-primary" value="Thêm">

                    </div>
                    <div>
                        <a href="selectAllCategories.php" class="btn btn-default">Đóng</a>
                    </div>
            </div>
        </div>
    </div>
</body>

<!-- ------------------------------------------------------------------------------------------------------------ -->

</html>

<?php
require_once("../connect.php");
$sql = "INSERT INTO categories (name, description, icon ) VALUES ( ?, ?, ?)";
if ($stmt = $link->prepare($sql)) {
    if (isset($_FILES['FileImage'])) {
        $link_foder = "Image/";
        $link_image = $link_foder . basename($_FILES["FileImage"]['name']);
        if (move_uploaded_file($_FILES["FileImage"]["tmp_name"], $link_image)) {
            $_SESSION['image'] = $link_image;
        } else {
            echo "File bạn vừa upload gặp sự cố";
        }
    }
    $stmt->bind_param("sss", $name, $description, $icon);
    mysqli_set_charset($link, "utf8");
    $name = $_POST['Products_name'];
    $description = $_POST['description'];
    $icon = $_POST['FileImage'];
    $stmt->execute();

    echo "<center>Thêm Loại Sản Phẩm Thành Công. </center>";
} else {
    echo "<center> Thêm Không Thành Công. : $sql. </center>" . $link->error;
}
$stmt->close();
?>
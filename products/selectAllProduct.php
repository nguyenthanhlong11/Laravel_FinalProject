<?php
error_reporting(1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./code/sport.css">


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

    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<!-- ------------------------------------------------------------------------------------------------------------ -->

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h1 class="pull-left">Quản lí sản phẩm</h1>
                        <a href="InsertProduct.php" class="btn btn-danger pull-right">Thêm sản phẩm mới<br></a>
                        <a href="../adminQl.php" class="btn btn-primary pull-right">Quay lại</a>

                    </div>
                    <?php
                    require_once("../connect.php");

                    $sql = "SELECT * FROM products";
                    $linkImage = '../Image/';
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Tên Sản Phẩm</th>";
                            echo "<th>Giá</th>";
                            echo "<th>Số Lượng</th>";
                            echo "<th>Loại Sản Phẩm</th>";
                            echo "<th>Ghi Chú</th>";
                            echo "<th>Ảnh</th>";
                            echo "<th>Thao Tác</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['price'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>";
                                $idCategory = $row['category_id'];
                                $sqlCategory = "SELECT * FROM categories WHERE id = 
                                            $idCategory";
                                $resCategory = mysqli_query($link, $sqlCategory);
                                while ($rowCa = mysqli_fetch_assoc($resCategory)) {
                    ?>
                                    <option value="<?php echo $rowCa['id']; ?>"><?php echo
                                                                                    $rowCa['name']; ?></option>

                                <?php
                                }
                                "</td>";
                                echo "<td>" . $row['comments'] . "</td>"; ?>
                                <td><img src=" <?php echo $linkImage . $row['Images'] ?>" width=30px></td>
                    <?php

                                echo "<td>";
                                echo "<a href='viewProduct.php?id=" . $row['id'] . "' title='Xem sản phẩm' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='updateProduct.php?id=" . $row['id'] . "' title='Chỉnh sửa' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='deleteProducts.php?id=" . $row['id'] . "' title='Xóa sản phẩm' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo "<p class='lead'><em>Không tìm thấy sản phẩm.</em></p>";
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
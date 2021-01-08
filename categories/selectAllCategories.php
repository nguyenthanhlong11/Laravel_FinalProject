<?php
error_reporting(1);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ThanhLongFashion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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
                        <h1 class="pull-left">Quản Lý Loại Sản Phẩm</h1>
                        <a href="Insertcategories.php" class="btn btn-danger pull-right">Thêm Sản Phẩm</a>
                        <a href="../adminQL.php" class="btn btn-primary pull-right">Quay Lại</a>
                    </div>
                    <?php
                    require_once("../connect.php");

                    // truy vấn đến bảng sản phẩm
                    $sql = "SELECT * FROM categories";
                    $linkImage = '../Image/';
                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Tên loại sản phẩm</th>";
                            echo "<th>Miêu tả</th>";
                            echo "<th>Hình ảnh</th>";
                            echo "<th>Thao tác</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>"; ?>
                                <td><img src=" <?php echo $linkImage . $row['icon'] ?>" width=30px></td>
                    <?php
                                echo "<td>";
                                echo "<a href='updateCate.php?id=" . $row['id'] . "' title='Chỉnh sửa' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='deleteCate.php?id=" . $row['id'] . "' title='Xóa' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo "<center><p class='lead'><em>Không tìm thấy sản phẩm. </em></p></center>";
                        }
                    } else {
                        echo "<center>Lỗi! Vui lòng thử lại sau.</center> $sql. " . mysqli_error($link);
                    }
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
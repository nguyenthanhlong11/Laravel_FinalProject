<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ThanhLongFashion</title>
    <link rel="stylesheet" href="">

    <!-- ------------------------------------------------------------------------------------------------------------ -->

<body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label style="color: red ;">
            <h1> CÓ THỂ BẠN QUAN TÂM</h1>
        </label>
    </div>

    <div class="">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
            <div class="row">
                <?php

                require_once("../connect.php");
                $sql = "SELECT * FROM products limit 12";
                $linkImage = '../Image/';
                $result = mysqli_query($link, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                    <div class="thumbnail" style="margin-left: 30px">
                                        <div class="image-effect">
                                            </br><a href="DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
                                        </div>
                                        <div>
                                            </br>
                                            <p>
                                                <label><?php echo $row['name']; ?> </label>
                                            </p>

                                            <p>
                                                <label><?php echo $row['price']; ?>.000 vnđ</label>
                                            </p>
                                            <p>
                                                <a" href="DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>

</body>

</html>
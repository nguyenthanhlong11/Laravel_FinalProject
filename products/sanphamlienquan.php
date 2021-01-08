<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../code/gioithieutrang.css">
</head>

<!-- ------------------------------------------------------------------------------------------------------------ -->

<body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <label style="color: red ;">
            <h1> SẢN PHẨM LIÊN QUAN</h1>
        </label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
        <div class="row">
            <?php

            require_once("../connect.php");
            $idcate = $row['category_id'];
            $sql = "SELECT products.name , products.price , products.Images FROM products , categories where
             products.category_id = categories.id and categories.id = " . $idcate;
            $linkImage = '../Image/';
            $result = mysqli_query($link, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                <div class="thumbnail">
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
                                            <a href="DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi
                                                Tiết Sản Phẩm</a>
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

</body>

</html>
<?php session_start(); //bắt đầu session 
?>
<!DOCTYPE html>
<html>

<head>
    <title>ThanhLongFashion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script language="javascript"></script>
    <link rel="stylesheet" type="text/css" href="sport.css">
    <script src="./code/funtion.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<!-- ------------------------------------------------------------------------------------------------------------ -->

<body>
    <div class="page-header">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="text-left">
                Địa chỉ: 101B-Lê Hữu Trác-Sơn Trà-Đà Nẵng
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="text-right">
                <a href="./thanhtoan.php"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng</a>
            </div>
        </div>
    </div>
    <div class="logo">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <a href="../index.php"><img class="polo" src="../Image/logo.PNG" width="230" height="125"></a>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3">
            <img class="picture" src="../Image/uytin.jpg" width="230" height="125">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img class="picture" src="../Image/giaohang.jpg" width="230" height="125">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img class="picture" src="../Image/hotro.png" width="230" height="125">
        </div>
    </div>

    <!-- ------------------------------------------------------------------------------------------------------------ -->

    <div class="container">
        <div class="menu">
            <div class="topnav" id="myTopnav">
                <a href="../index.php"><span class="glyphicon glyphicon-home"></span>TRANG CHỦ</a>
                <a href="../code/gioithieu.php">GIỚI THIỆU</a>
                <a href="../code/Allproducts.php">SẢN PHẨM</a>
                <a href="../code/thanhtoan.php">THANH TOÁN</a>
                <a href="../code/lienhe.php">LIÊN HỆ</a>
                <form action="../products/searchProduct.php" class="navbar-form navbar-left" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="search">
                        <div class="input-group-btn">
                            <button href="../products/searchProduct.php" class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <form class="navbar-form navbar-right">
                    <a class="btn btn-primary" data-toggle="modal" href='#modal-iddangnhap'><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a>
                    <a class="btn btn-primary" data-toggle="modal" href='#modal-iddangky'><span class="glyphicon glyphicon-user"></span> Đăng ký</a>
                </form>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </div>

            <!-- ------------------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label style="color: red ;">
                    <h1>GIÀY NAM</h1>
                </label>
            </div>

            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row">
                        <?php
                        require_once("../connect.php");
                        $sql = "SELECT * FROM products WHERE category_id = 1 limit 4";
                        $linkImage = '../Image/';
                        $result = mysqli_query($link, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="thumbnail" style="margin-left: 30px">
                                                <div class="image-effect">
                                                    </br><a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
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
                                                        <a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
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

            <!-- ------------------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label style="color: red ;">
                    <h1>ÁO KHOÁC NAM</h1>
                </label>
            </div>
            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row">
                        <?php
                        require_once("../connect.php");
                        $sql = "SELECT * FROM products WHERE category_id = 2 limit 4";
                        $linkImage = '../Image/';
                        $result = mysqli_query($link, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="thumbnail" style="margin-left: 30px">
                                                <div class="image-effect">
                                                    </br><a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
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
                                                        <a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
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

            <!-- ------------------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label style="color: red ;">
                    <h1>VÍ NAM</h1>
                </label>
            </div>

            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row">
                        <?php

                        require_once("../connect.php");
                        $sql = "SELECT * FROM products WHERE category_id = 3";
                        $linkImage = '../Image/';
                        $result = mysqli_query($link, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="thumbnail" style="margin-left: 30px">
                                                <div class="image-effect">
                                                    </br><a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
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
                                                        <a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
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

            <!-- ------------------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label style="color: red ;">
                    <h1>ĐỒNG HỒ</h1>
                </label>
            </div>

            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row">
                        <?php
                        require_once("../connect.php");
                        $sql = "SELECT * FROM products WHERE category_id = 4";
                        $linkImage = '../Image/';
                        $result = mysqli_query($link, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="thumbnail" style="margin-left: 30px">
                                                <div class="image-effect">
                                                    </br><a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
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
                                                        <a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
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

            <!-- ------------------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label style="color: red ;">
                    <h1>QUẦN NAM</h1>
                </label>
            </div>
            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row">
                        <?php
                        require_once("../connect.php");
                        $sql = "SELECT * FROM products WHERE category_id = 5";
                        $linkImage = '../Image/';
                        $result = mysqli_query($link, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="thumbnail" style="margin-left: 30px">
                                                <div class="image-effect">
                                                    </br><a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
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
                                                        <a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
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

            <!-- ------------------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label style="color: red ;">
                    <h1>BALO NAM</h1>
                </label>
            </div>
            <div class="">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="row">
                        <?php
                        require_once("../connect.php");
                        $sql = "SELECT * FROM products WHERE category_id = 6";
                        $linkImage = '../Image/';
                        $result = mysqli_query($link, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <div class="thumbnail" style="margin-left: 30px">
                                                <div class="image-effect">
                                                    </br><a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;" src="<?php echo $linkImage . $row['Images']; ?>"></a>
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
                                                        <a href="../products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>
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
        </div>

        <!-- ------------------------------------------------------------------------------------------------------------ -->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="modal-footer">
                <div class="fot">
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <br><strong>VỀ CHÚNG TÔI<br><br></strong>
                        Giới thiệu về chúng tôi<br>
                        Quan điểm kinh doanh<br>
                        Cam kết chất lượng<br>
                        Tuyển dụng<br>
                        Liên hệ
                    </div>
                </div>
                <div class="fot">
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <br><strong>HƯỚNG DẪN HỖ TRỢ<br><br></strong>
                        Hướng dẫn mua hàng<br>
                        Hướng dẫn ký gửi<br>
                        Phương thức đổi trả hàng<br>
                        Hình thức thanh toán<br>
                        Phương thức đặt hàng
                    </div>
                </div>
                <div class="fot">
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <br><strong>CHÍNH SÁCH MUA HÀNG<br><br></strong>
                        Phương thức giao hàng<br>
                        Chính sách bảo hành<br>
                        Dịch vụ sửa chữa<br>
                    </div>
                </div>
                <div class="fot">
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                        <br><strong>KẾT NỐI VỚI CHÚNG TÔI<br><br></strong>
                        <a href="https://www.facebook.com/thanh.long117"><i class="fa fa-facebook-square" style="font-size: 50px"></i></a>
                        <a href="#"><i class="fa fa-google-plus-square" style="font-size: 50px"></i></a>
                        <a href="#"><i class="fa fa-twitter" style="font-size: 50px"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="foot">
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1104354055014!2d108.24145794912455!3d16.059758038832193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xeac35f2960ca74a4!2zOTkgVMO0IEhp4bq_biBUaMOgbmgsIFBoxrDhu5tjIE3hu7ksIFPGoW4gVHLDoCwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1541502751589" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="text">
                        @Web được thiết kế bởi Long
                    </div>
                </div>
            </div>
        </div>

        <!-- ------------------------------------------------------------------------------------------------------------ -->

        <div class="modal fade" id="modal-iddangnhap">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title"><b> ĐĂNG NHẬP TÀI KHOẢN</b></h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><span class="glyphicon glyphicon-user"></span> User
                                        name: </label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="username" id="Username" class="form-control" placeholder="Tên đăng nhập">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><i class="fa fa-briefcase"></i> Password: </label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="password" name="password" id="Password" class="form-control" placeholder="Mật khẩu">
                                    <p></p>
                                    <p style="color: red;">Bạn chưa có tài khoản?</p>
                                    <p style="color: red;">Đăng ký để sử dụng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-foote">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Thoát</button>
                        <button type="submit" onclick="checkLogin()" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-iddangky">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center>
                            <h4 class="modal-title"><b> ĐĂNG KÝ TÀI KHOẢN</b></h4>
                        </center>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><span class="glyphicon glyphicon-pencil"></span>
                                        Tên đầy đủ: </label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="name" id="inputName" class="form-control" placeholder="Họ Tên">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><span class="glyphicon glyphicon-phone-alt"></span>
                                        Số điện thoại: </label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="phone" name="phone" id="inputPhone" class="form-control" placeholder="Số Điện Thoại">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><span class="glyphicon glyphicon-envelope"></span>
                                        Email: </label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><span class="glyphicon glyphicon-user"></span> Tên tài
                                        khoản:</label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Tên Đăng Nhập">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <label style="padding: 15px;"><i class="fa fa-briefcase"></i> Mật khẩu: </label>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <input type="password" name="password" id="inputPass" class="form-control" placeholder="Mật khẩu">
                                </div>
                                <p id="display">
                            </div>
                        </div>
                        <div class="modal-foote">
                            <button type="submit" class="btn btn-default" data-dismiss="modal">Thoát</button>
                            <button type="submit" name="signin" class="btn btn-primary">OK</button>
                            <button type="submit" onclick="display()" class="btn btn-primary">display</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>
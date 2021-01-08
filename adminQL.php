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
    <link rel="stylesheet" type="text/css" href="./code/sport.css">
    <script src="./code/funtion.js"></script>
</head>

<body>
    <div class="page-header">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="text-left">
                Địa chỉ: 101B-Lê Hứu Trác-Sơn Trà-Đà Nẵng
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="text-right">
                <a href="./index.php"></span>Xem với tư cách khách hàng</a>
            </div>
        </div>
    </div>
    <div class="logo">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <a href="./responsive.php"><img class="polo" src="./Image/logo.PNG" width="230" height="125"></a>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3">
            <img class="picture" src="./Image/uytin.jpg" width="230" height="125">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img class="picture" src="./Image/giaohang.jpg" width="230" height="125">
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <img class="picture" src="./Image/hotro.png" width="230" height="125">
        </div>
    </div>
    <div class="container">
        <div class="menu">
            <div class="topnav" id="myTopnav">
                <a href="products/selectAllProduct.php"><span class="glyphicon glyphicon-home"></span>QUẢN LÍ SẢN
                    PHẨM</a>
                <a href="categories/selectAllCategories.php"> QUẢN LÍ LOẠI SẢN PHẨM</a>
                <form class="navbar-form navbar-right">
                    <a href="user/logout.php"><button type="button" class="btn btn-primary">Đăng Xuất</button></a>
                </form>
                </form>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
            </div>

            <!-- ------------------------------------------------------------------------------------------------ -->

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div id="carousel-id" class="carousel slide" data-ride="carousel" style="padding-left: 4%;">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                        <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item" style="width: 500px; height: 400px">
                            <img src="./Image/slide1.jpg" width="500px" height="300px">
                        </div>
                        <div class="item" style="width: 500px; height: 400px">
                            <img src="./Image/slide2.jpeg" width="500px" height="300px">
                        </div>
                        <div class="item active" style="width: 500px; height: 400px">
                            <img src="./Image/slide3.jpg" width="500px" height="300px">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div>
                    <div>
                        <img src="./Image/lienhe1.jpg" width="532px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
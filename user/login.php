<?php
session_start();
require_once "../connect.php";
if(isset($_POST['login'])){
        $name=$_POST['username'];
        $pass=$_POST['password']; 
        $sql = 'SELECT id, username, password FROM customers WHERE username ="'.$name.'" and password="'.$pass.'"';
        $result= $link->query($sql)->fetch_all();
        if($result){
              
             $_SESSION['idUser']=$result[0][0];
             $_SESSION['username']=$result[0][1];
             header("location: ../index.php");
        }
        else{
           $m='SELECT * from admin1 where username="'.$name.'" and password="'.$pass.'"';
           $check=$link->query($m)->fetch_all();
           if($check){
               $_SESSION['idUser']=$check[0][0];
               $_SESSION['username']=$check[0][1];
               header("location: ../adminQL.php");
           }
        }
        if(!isset($_SESSION['idUser'])){
            echo " <center><h2>Không thể đăng nhập. Vui lòng thử lại! </h2></center>";
        }
    }

    mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ThanhLongFashion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
    }
    </style>
</head>

 <!-- ------------------------------------------------------------------------------------------------------------ --> 
 
<body>
    <div class="row" style="margin-left: 35%">
        <div class="wrapper">
            <h2>Đăng Nhập</h2>
            <p>Vui lòng nhập thông tin đăng nhập!</p>
            <form action="" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Tài Khoản</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Mật Khẩu</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary" value="Đăng Nhập">
                    <a href="../index.php" class="btn btn-default">Đóng</a>
                </div>
                <p>Bạn chưa có tài khoản? <a href="signup.php">Đăng Ký Ngay</a>.</p>
                <p>Quên Mật Khẩu? <a href="resetPass.php">Đặt lại Mật Khẩu</a>.</p>
            </form>
        </div>
    </div>

</body>

</html>
<?php

require_once "../connect.php";

$name = $username = $email=  $password = $confirm_password = "";
$name_err = $email_err = $username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["name"]))){
        $name_err = "Vui lòng nhập tên";     
    } else{
        $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["username"]))){
        $username_err = "Vui lòng nhập tên tài khoản";
    } else{

        $sql = "SELECT id FROM customers WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["Tên tài khoản"]);

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Tên tài khoản đã tồn tại";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Lỗi! Vui lòng thử lại sau!";
            }
        }

        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Vui lòng nhập email";     
    } else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["password"]))){
        $password_err = "Vui lòng nhập mật khẩu";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Mật khẩu phải có 6 ký tự.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Nhập lại mật khẩu";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Mật khẩu không trùng";
        }
    }
    if(empty($name_err) && empty($username_err) && empty($email_err)&& empty($password_err) && empty($confirm_password_err)){

        $sql = "INSERT INTO customers (name, email,username, password) VALUES (?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email,$param_username, $param_password);

            $param_name = $name;
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(mysqli_stmt_execute($stmt)){

                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!-- ----------------------------------------------------------------------------------------------------- -->

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

<body>
    <div class="row" style="margin-left: 35%">
        <div class="wrapper">
            <h2>Đăng KÝ Tài Khoản</h2>
            <p>Vui lòng nhập thông tin tài khoản của bạn</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Tên đầy đủ</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    <span class="help-block"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Tên tài khoản</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="confirm_password" class="form-control"
                        value="<?php echo $confirm_password; ?>">
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Xong">
                    <a href="../login.php">
                    <a href="../index.php" class="btn btn-default">Đóng</a>
                </div>
                <p>Bạn đã có tài khoản! <a href="login.php">Đăng nhập ngay</a>.</p>
            </form>
        </div>
    </div>

</body>

</html>
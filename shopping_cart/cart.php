<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

session_start();
require_once("../connect.php");
if (isset($_SESSION["id"])) {
   $sql = "INSERT INTO orders (cus_id,date_sold ) VALUES ( ?, ?)";

   if ($stmt = $link->prepare($sql)) {

      $stmt->bind_param("is", $cus_id, $date_sold);
      mysqli_set_charset($link, "utf8");
      $id_cus = $_SESSION["id"];
      $cus_id = $id_cus;
      $date = date('Y-m-d H:i:s');
      $date_sold = $date;
      $stmt->execute();
   }

   $sql2 = "SELECT max(id) FROM orders";
   $result = mysqli_query($link, $sql2);
   if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
         $arr[] = $row;
      }
   }
   foreach ($arr as $key => $value) {
      $idOder = $value['max(id)'];
   }


   
   $sql1 = "INSERT INTO orders_details (ord_id,prod_id,quantity ) VALUES ( ?,?,?)";

   if ($stmt = $link->prepare($sql1)) {

      $stmt->bind_param("iii", $ord_id, $prod_id, $quantity);
      mysqli_set_charset($link, "utf8");
      $ord_id = $idOder;

      $prod_id = $_POST["id"];
      if (isset($prod_id)) {
         echo "<div class='alert alert-danger'>
                    <script>alert(' Sản phẩm này đã có trong giỏ hàng của bạn!')</script>
                     <meta http-equiv='refresh' content='1;url=../index.php'>
                </div>";
      }



      $quantity = $_POST['quantity'];


      $stmt->execute();

      header('Location: ../index.php');
   } else {
      echo "Lỗi! Vui lòng thử lại: $sql. " . $link->error;
   }

   $stmt->close();
} else
   echo "<div class='alert alert-danger'>
          <script>alert(' Bạn chưa đăng nhập tài khoản!')</script>
           <meta http-equiv='refresh' content='1;url=../user/login.php'>
      </div>";


?>


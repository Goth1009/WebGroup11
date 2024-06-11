<?php
include '../components/connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
  header('location: login.php');
}

if(isset($_POST['delete_order'])){

  $order_id = $_POST['order_id'];
  $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);

  $verify_delete = $conn->prepare("SELECT * FROM `orders` WHERE id = ?");
  $verify_delete->execute([$order_id]);

  if($verify_delete->rowCount() > 0){
    $delete_order = $conn->prepare("DELETE FROM `orders` WHERE id = ?");
    $delete_order->execute([$order_id]);

    $success_msg[] = "order deleted successfully!";

  }else{
    $warning_msg[] = "order not found or could not be deleted.";
  }

}
// update order
if(isset($_POST['update_order'])){

  $order_id = $_POST['order_id'];
  $order_id = filter_var($order_id, FILTER_SANITIZE_STRING);

  $update_payment = $_POST['update_payment'];
  $update_payment = filter_var($update_payment, FILTER_SANITIZE_STRING);

  $update_pay = $conn->prepare("UPDATE `orders` SET `payment_status` = ? WHERE id = ?");
  $update_pay->execute([$update_payment, $order_id]);

    $success_msg[] = "payment status updated successfully!";

  }else{
    $warning_msg[] = "order not found or could not be updated.";
  }




?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- box icon cdn link -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- css file link -->
  <link rel="stylesheet" type="text/css" href="admin_style.css?v=<?php echo time(); ?>">

  <title>Ice-Cream Bar Admin Pannel - order placed Page</title>
</head>
<body>
<?php include '../components/admin_header.php'; ?>

  <div class="main">
    <div class="banner">
      <h1>uorder placed</h1></h1>
    </div>
    <div class="title2">
      <a href="home.php">dashboard</a><span> / order placed</span>
    </div>
    <section class="order-container">
      <h1 class="heading">total order placed</h1>
      <div class="box-container">
       <?php 

        $select_orders = $conn->prepare("SELECT * FROM `orders`");
        $select_orders->execute();

        if($select_orders->rowCount() > 0){
          while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
                  
       ?>
       <div class="box">
            <div class="status" style="color: <?php if($fetch_orders['status'] == 'in progress'){echo "green";}else{echo "red";} ?>"><?= $fetch_orders['status']; ?></div>
            <div class="details">
              <p>user name : <span><?= $fetch_orders['name']; ?></span></p>
              <p>user id : <span><?= $fetch_orders['id']; ?></span></p>
              <p>placed on : <span><?= $fetch_orders['date']; ?></span></p>
              <p>user number : <span><?= $fetch_orders['number']; ?></span></p>
              <p>user email : <span><?= $fetch_orders['email']; ?></span></p>
              <p>total price : <span><?= $fetch_orders['price']; ?></span></p>
              <p>method : <span><?= $fetch_orders['method']; ?></span></p>
              <p>address : <span><?= $fetch_orders['address']; ?></span></p>
            </div>
            <form action="" method="post">
              <input type="hidden" name="order_id" value="<?= $fetch_orders['id']; ?>">
              <select name="update_payment">
                <option disabled selected><?= $fetch_orders['payment_status']; ?></option>
                <option value="pending">pending</option>
                <option value="complete">complete</option>
              </select>
              <div class="flex-btn">
                <button type="submit" name="update_order" class="btn">update payment</button>
                <button type="submit" name="delete_order" class="btn">delete order</button>
              
              </div>
            </form>
       </div>
        <?php
            }
          }else{
          echo '
          <div class="empty">
            <p>no order takes placed yet</p>
          </div>
          ';
          }
          ?>
    
      </div>
    </section>
  </div>




<!-- sweetalert cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"       referrerpolicy="no-referrer"></script>

  <!-- custome js link -->
  <script type="text/javascript" src="script.js"></script>

  <!-- alert -->
  <?php include '../components/alert.php'; ?>
  


  
  
</body>
</html>
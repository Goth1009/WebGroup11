<?php
include '../components/connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
  header('location: login.php');
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

  <title>Ice-Cream Bar Admin Pannel - register user's Page</title>
</head>
<body>
<?php include '../components/admin_header.php'; ?>

  <div class="main">
    <div class="banner">
      <h1>register user's</h1></h1>
    </div>
    <div class="title2">
      <a href="home.php">dashboard</a><span> / register user's</span>
    </div>
    <section class="accounts">
      <h1 class="heading">register user's</h1>
      <div class="box-container">
        <?php
          $select_users = $conn->prepare("SELECT * FROM `users`");
          $select_users->execute();

          if($select_users->rowCount() > 0){
            while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){
              $user_id = $fetch_users['id'];
            
        ?>
        <div class="box">
              <table>
                <tr><td class="table-title">User Id : </td><td class="table-data"><?= $user_id; ?></td></tr>
                <tr><td class="table-title">User Name : </td><td class="table-data"><?= $fetch_users['name']; ?></td></tr>
                <tr><td class="table-title">User Id : </td><td class="table-data"><?= $fetch_users['email']; ?></td></tr>
            </table>
        </div>
        <?php
            }
          }else{
          echo '
          <div class="empty">
            <p>no user registered yet</p>
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
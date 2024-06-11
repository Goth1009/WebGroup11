<?php
include '../components/connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
  header('location: login.php');
}

if(isset($_POST['delete'])){

  $delete_id = $_POST['delete_id'];
  $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

  $verify_delete = $conn->prepare("SELECT * FROM `message` WHERE id = ?");
  $verify_delete->execute([$delete_id]);

  if($verify_delete->rowCount() > 0){
    $delete_message = $conn->prepare("DELETE FROM `message` WHERE id = ?");
    $delete_message->execute([$delete_id]);

    $success_msg[] = "message deleted successfully!";

  }else{
    $warning_msg[] = "message not found or could not be deleted.";
  }

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

  <title>Ice-Cream Bar Admin Pannel - unread message's Page</title>
</head>
<body>
<?php include '../components/admin_header.php'; ?>

  <div class="main">
    <div class="banner">
      <h1>unread message's</h1></h1>
    </div>
    <div class="title2">
      <a href="home.php">dashboard</a><span> / unread message's</span>
    </div>
    <section class="accounts">
      <h1 class="heading">unread message's</h1>
      <div class="box-container">
        <?php
          $select_message = $conn->prepare("SELECT * FROM `message`");
          $select_message->execute();

          if($select_message->rowCount() > 0){
            while($fetch_message = $select_message->fetch(PDO::FETCH_ASSOC)){
             
            
        ?>
        <div class="box">
          <table>
            <tr><td class="table-title">Name :</td><td class="table-data"><?= $fetch_message['name']; ?></td></tr>
            <tr><td class="table-title">Subject :</td><td class="table-data"><?= $fetch_message['subject']; ?></td></tr>
            <tr><td class="table-title">Message :</td><td class="table-data"><?= $fetch_message['message']; ?></td></tr>
            </table>
            <form action="" method="post" class="flex-btn">
              <input type="hidden" name="delete_id" value="<?= $fetch_message['id']; ?>">
              <button type="submit" name="delete" class="btn" onclick="return confirm('delete this message'); ">delete</button>
            </form>
        </div>
        <?php
            }
          }else{
          echo '
          <div class="empty">
            <p>no message send yet</p>
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
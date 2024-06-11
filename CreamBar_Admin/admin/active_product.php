<?php
include '../components/connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
  header('location: login.php');
}

// delete product
if(isset($_POST['delete'])){
  $p_id = $_POST['product_id'];
  $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);

  try {
      $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
      $delete_product->execute([$p_id]);
      
      if ($delete_product->rowCount() > 0) {
          $success_msg[] = "Product deleted successfully!";
      } else {
          $warning_msg[] = "Product not found or could not be deleted.";
      }
  } catch (PDOException $e) {
      // Log the error or display a generic error message
      $error_msg[] = "An error occurred: " . $e->getMessage();
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

  <title>Ice-Cream Bar Admin Pannel - All Active Products Page</title>
</head>
<body>
<?php include '../components/admin_header.php'; ?>

  <div class="main">
    <div class="banner">
      <h1>active products</h1>
    </div>
    <div class="title2">
      <a href="home.php">dashboard</a><span> / active products</span>
    </div>
    <section class="show-post">
      <h1 class="heading">active products</h1>
      <div class="box-container">
        <?php
          $select_product = $conn->prepare("SELECT * FROM `products` where status = 'active' ");
          $select_product->execute();

          if($select_product->rowCount() > 0){
            while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
          
        ?>
        <?php if($fetch_product['image'] != ''){ ?>
  <form action="" method="post" class="box">
    <input type="hidden" name="product_id" value="<?= $fetch_product['id']; ?>">
    <?php if($fetch_product['image'] != ''){ ?>
    <img src="../image/<?= $fetch_product['image']; ?>" alt="product image" class="image"> <?php } ?>
    <div class="status" style="color: <?php if($fetch_product['status']=='active'){echo "green";} else {echo "red";} ?>;"><?= $fetch_product['status']; ?></div>
    <div class="price">$<?= $fetch_product['price']; ?> /-</div>
    <div class="title"><?= $fetch_product['name']; ?></div>
    <div class="flex-btn">
      <a href="edit_product.php?id=<?= $fetch_product['id'] ?>" class="btn">edit</a>
      <button type="submit" name="delete" class="btn" onclick="return confirm('Are you sure you want to delete this product?');">delete</button>
      <a href="read_product.php?post_id=<?= $fetch_product['id'] ?>" class="btn">view</a>
    </div>
  </form>
  <?php } ?>
        <?php
            }
          }else {
            echo '
            <div class="empty">
              <p>no product added yet! <br> <a href="add_products.php" style ="margin-top:1.5rem;" class="btn">add product</a></p>
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
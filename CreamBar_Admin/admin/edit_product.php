<?php
include '../components/connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if (!isset($admin_id)) {
    header('location: login.php');
}

//update product detail 
if(isset($_POST['update'])){
  $post_id = $_GET['id'];

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING); // Fix variable name

  $price = $_POST['price'];
  $price = filter_var($price, FILTER_SANITIZE_STRING);

  $content = $_POST['content'];
  $content = filter_var($content, FILTER_SANITIZE_STRING);

  $status = $_POST['status'];
  $status = filter_var($status, FILTER_SANITIZE_STRING);

  //update product

  $update_product = $conn->prepare("UPDATE `products` SET `name` = ?, `price` = ?, `product_detail` = ?, `status` = ? WHERE id = ?");
  $update_product->execute([$name, $price, $content, $status, $post_id]);

  $success_msg[] = "product updated successfully";

  $old_image = $_POST['old_image'];
  $image = $_FILES['image']['name'];
  $image = filter_var($image, FILTER_SANITIZE_STRING);
  $image_size = $_FILES['image']['size']; // Fix variable name
  $image_tmp_name = $_FILES['image']['tmp_name']; // Fix variable name
  $image_folder = '../image/'.$image;

  $select_image = $conn->prepare("SELECT `image` FROM `products` WHERE id = ?");
  $select_image->execute([$image]);

  if(!empty($image)){
    if($image_size > 2000000){
      $warning_msg[] = "image size is too large";
    } elseif($select_image->rowCount() > 0 AND $image != ''){
      $warning_msg[] = "please rename the image file";
    } else{
      $update_image = $conn->prepare("UPDATE `products` SET `image` = ? WHERE id = ?");
      $update_image->execute([$image, $post_id]);
      move_uploaded_file($image_tmp_name, $image_folder);

      if($old_image != $image AND $old_image != ''){
        unlink('../image/'.$old_image);
      }
      $success_msg[] = "image updated successfully";
    }
  }
}



// delete product
if (isset($_POST['delete'])) {
    $p_id = $_POST['product_id'];
    $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);

    
    $delete_image = $conn->prepare("SELECT `image` FROM `products` WHERE id = ?");
        $delete_image->execute([$p_id]);

     $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);

     if($fetch_delete_image['image'] != ''){
        unlink('../image/'.$fetch_delete_image['image']);
     }

     $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
      $delete_product->execute([$p_id]);

      header('location: view_product.php');
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

  <title>Ice-Cream Bar Admin Pannel - edit products Page</title>
</head>
<body>
<?php include '../components/admin_header.php';?>

  <div class="main">
    <div class="banner">
      <h1>edit products</h1>
    </div>
    <div class="title2">
      <a href="home.php">dashboard</a><span> / edit products</span>
    </div>
    <section class="read-post">
      <h1 class="heading">edit product</h1>
      <?php
        $post_id = $_GET['id'];

        $select_product = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
        $select_product->execute([$post_id]);

        if($select_product->rowCount() > 0){
          while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
      ?>
      <div class="form-container">
        <form action="" method='post'  enctype="multipart/form-data" >
          <input type="hidden" name="old_image" value="<?= $fetch_product['image']; ?>">

          <div class="input-field">
            <label>update status</label>
            <select name="status">
              <option selected disabled value="<?= $fetch_product['status']; ?>"><?= $fetch_product['status'] ?></option>
              <option value="active">active</option>
              <option value="deactive">deactive</option>
            </select>
          </div>
          <div class="input-field">
            <label>product name</label>
            <input type="text" name="name" value="<?= $fetch_product['name']; ?>">
          </div>
          <div class="input-field">
            <label>product price</label>
            <input type="text" name="price" value="<?= $fetch_product['price']; ?>">
          </div>
          <div class="input-field">
            <label>product description</label>
            <textarea name="content"><?= $fetch_product['product_detail']; ?></textarea>
          </div>
          <div class="input-field">
            <label>product image</label>
            <input type="file" name="image" accept="image/*">
            <img src="../image/<?= $fetch_product['image']; ?>" class="image">
          </div>
          <div class="flex-btn">
            <button type="submit" name="update" class="btn">update product</button>
            <a href="view_product.php" class="btn" >go back</a>
            <button type="submit" name="delete" class="btn">delete product</button>
          </div>
        </form>
      </div>
      <?php
          }
        
      } else {
               echo '
                <div class="empty">
                  <p>no product added yet! <br> <a href="add_products.php" style ="margin-top:1.5rem;" class="btn">add product</a></p>
                </div>
                ';

      }
    
      ?>
     

    </section>
  </div>




<!-- sweetalert cdn link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"       referrerpolicy="no-referrer"></script>

  <!-- custome js link -->
  <script type="text/javascript" src="script.js"></script>

  <!-- alert -->
  <?php include '../components/alert.php';?>





</body>
</html>
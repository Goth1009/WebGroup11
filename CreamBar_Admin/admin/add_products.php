<?php
include '../components/connection.php';

session_start();
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
  header('location: login.php');
}

//add product in database
if(isset($_POST['publish'])){ // Change condition to check if 'publish' button is clicked
  $id = unique_id();

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING); // Fix variable name

  $price = $_POST['price'];
  $price = filter_var($price, FILTER_SANITIZE_STRING);

  $content = $_POST['content'];
  $content = filter_var($content, FILTER_SANITIZE_STRING);

  $status = 'active';

  $image = $_FILES['image']['name'];
  $image = filter_var($image, FILTER_SANITIZE_STRING);
  $image_size = $_FILES['image']['size']; // Fix variable name
  $image_tmp_name = $_FILES['image']['tmp_name']; // Fix variable name
  $image_folder = '../image/'.$image;

  $select_image = $conn->prepare("SELECT * FROM products WHERE image = ?"); // Remove single quotes around table name
  $select_image->execute([$image]);

  if($select_image->rowCount() > 0){
    $warning_msg[] = 'Image name repeated';
  } elseif($image_size > 2000000) {
    $warning_msg[] = 'Image size is too large';
  } else {
    move_uploaded_file($image_tmp_name, $image_folder);
  }

  if($select_image->rowCount() > 0 && $image != ''){ // Fix the condition
    $warning_msg[] ='Please rename your image';
  } else {
    $insert_product = $conn->prepare("INSERT INTO products (id, name, price, image, product_detail, status) VALUES (?, ?, ?, ?, ?, ?)"); // Remove single quotes around table name
    $insert_product->execute([$id, $name, $price, $image, $content, $status]);
    $success_msg[] = 'Product inserted successfully';
  }
}

//save product in database as draft

if(isset($_POST['draft'])){ // Change condition to check if 'publish' button is clicked
  $id = unique_id();

  $name = $_POST['name'];
  $name = filter_var($name, FILTER_SANITIZE_STRING); // Fix variable name

  $price = $_POST['price'];
  $price = filter_var($price, FILTER_SANITIZE_STRING);

  $content = $_POST['content'];
  $content = filter_var($content, FILTER_SANITIZE_STRING);

  $status = 'deactive';

  $image = $_FILES['image']['name'];
  $image = filter_var($image, FILTER_SANITIZE_STRING);
  $image_size = $_FILES['image']['size']; // Fix variable name
  $image_tmp_name = $_FILES['image']['tmp_name']; // Fix variable name
  $image_folder = '../image/'.$image;

  $select_image = $conn->prepare("SELECT * FROM products WHERE image = ?"); // Remove single quotes around table name
  $select_image->execute([$image]);

  if($select_image->rowCount() > 0){
    $warning_msg[] = 'Image name repeated';
  } elseif($image_size > 2000000) {
    $warning_msg[] = 'Image size is too large';
  } else {
    move_uploaded_file($image_tmp_name, $image_folder);
  }

  if($select_image->rowCount() > 0 && $image != ''){ // Fix the condition
    $warning_msg[] ='Please rename your image';
  } else {
    $insert_product = $conn->prepare("INSERT INTO products (id, name, price, image, product_detail, status) VALUES (?, ?, ?, ?, ?, ?)"); // Remove single quotes around table name
    $insert_product->execute([$id, $name, $price, $image, $content, $status]);
    $success_msg[] = 'Product saved as draft successfully';
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

  <title>Ice-Cream Bar Admin Panel - Dashboard Page</title>
</head>
<body>
<?php include '../components/admin_header.php'; ?>

  <div class="main">
    <div class="banner">
      <h1>Add Products</h1>
    </div>
    <div class="title2">
      <a href="home.php">Dashboard</a><span> / Add Products</span>
    </div>
    <section class="form-container">
      <h1 class="heading">Add Products</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-field">
          <label>Product Name <sup>*</sup></label>
          <input type="text" name="name" maxlength="100" required placeholder="Add product name">
        </div>
        <div class="input-field">
          <label>Product Price <sup>*</sup></label>
          <input type="number" name="price" maxlength="100" required placeholder="Add product price">
        </div>
        <div class="input-field">
          <label>Product Detail <sup>*</sup></label>
          <textarea name="content" required maxlength="10000" placeholder="Write product description"></textarea>
        </div>
        <div class="input-field">
          <label>Product Image <sup>*</sup></label>
          <input type="file" name="image" accept="image/*" required>
        </div>
        <div class="flex-btn">
          <button type="submit" name="publish" class="btn" >Publish Product</button>
          <button type="submit" name="draft" class="btn" >Save as Draft</button>
        </div>
      </form>
      
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

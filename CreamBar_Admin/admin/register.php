<?php
include '../components/connection.php';

if (isset($_POST['register'])) {
    $id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $pass = sha1($_POST['password']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $cpass = sha1($_POST['cpassword']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../image/' . $image;

    $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE email = ?");
    $select_admin->execute([$email]);

    if ($select_admin->rowCount() > 0) {
        $warning_msg[] = 'User email already exists';
    } else {
        if ($pass != $cpass) {
            $warning_msg[] = 'Confirm password does not match with password';
        } else {
            $insert_admin = $conn->prepare("INSERT INTO `admin` (id, name, email, password, profile) VALUES (?, ?, ?, ?, ?)");
            $insert_admin->execute([$id, $name, $email, $cpass, $image]);
            move_uploaded_file($image_tmp_name, $image_folder);
            $success_msg[] = 'New admin registered';
        }
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

  <title>Ice-Cream Bar Admin Pannel - Register Page</title>
</head>
<body>

  <div class="main-container">
    <section>
      <div class="form-container" id="admin_login">
        <form action="" method="post" enctype="multipart/form-data">
          <h3>Register Now</h3>
          <div class="input-field">
            <label>User name <sup>*</sup></label>
            <input type="text" name="name" maxlength="20" required placeholder=" Enter your username" oninput="this.value.replace(/\s/g,'')">
          </div>
          <div class="input-field">
            <label>User email <sup>*</sup></label>
            <input type="email" name="email" maxlength="20" required placeholder=" Enter your email" oninput="this.value.replace(/\s/g,'')">
          </div>
          <div class="input-field">
            <label>User password <sup>*</sup></label>
            <input type="password" name="password" maxlength="20" required placeholder=" Enter your password" oninput="this.value.replace(/\s/g,'')">
          </div>
          <div class="input-field">
            <label>Confirm password <sup>*</sup></label>
            <input type="password" name="cpassword" maxlength="20" required placeholder=" Confirm password" oninput="this.value.replace(/\s/g,'')">
          </div>
          <div class="input-field">
            <label>Select Profile <sup>*</sup></label>
            <input type="file" name="image" accept="image/*">
          </div>
            <button type="submit" name="register" class="btn" >Register now</button>
            <p>Already have an account ? <a href="login.php">Login now</a></p>
        </form>
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
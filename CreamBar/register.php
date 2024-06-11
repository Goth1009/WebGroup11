<?php
    include 'Components/connection.php';
    session_start();

    if(isset($_SESSION['user_id'])) {
       $user_id = $_SESSION['user_id']; 
    }else{
        $user_id = '';
    }

    //register user
    if(isset($_POST['submit'])) {
       $id = unique_id();
       $name = $_POST['name'];
       $name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $email = $_POST['email'];
       $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $pass = $_POST['pass'];
       $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
       $cpass = $_POST['cpass'];
       $cpass = filter_var($cpass, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 

       $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
       $select_user->execute([$email]);
       $row = $select_user->fetch(PDO::FETCH_ASSOC);
       
       if ($select_user->rowCount() > 0) {
        $message[] = 'email already exist';
        echo 'email already exist';
       }else{
        if($pass != $cpass){
            $message[] = 'confirm your password';
            echo 'confirm your password';
          }else{
            $insert_user = $conn->prepare("INSERT INTO `users`(id,name,email,password) VALUES(?,?,?,?)");
            $insert_user->execute([$id,$name,$email,$pass]);
            header('location: home.php');
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
            $select_user->execute([$email,$pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            if($select_user->rowCount() > 0){
               $_SESSION['user_id'] = $row['id'];
               $_SESSION['user_name'] = $row['name'];
               $_SESSION['user_email'] = $row['email']; 
            }
          }
       }
    }

?>
<style type="text/css">
    <?php include 'Style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cream Bar - register now</title>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
        <div class="title">
    <img src="img/logo.png" alt="">
    <h1>register now</h1>
    <p>Join our ice cream family today! Sign up now to create your account and enjoy exclusive offers, delicious updates, and the sweetest treats. Let’s make your dessert dreams come true!</p>
</div>
            <form action="" method="post">
                <div class="input-field">
                    <p>your name</p>
                    <input type="text" name="name" required placeholder="enter your name" maxlength="50">  
                </div>
                <div class="input-field">
                    <p>your email</p>
                    <input type="text" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">  
                </div>
                <div class="input-field">
                    <p>your password</p>
                    <input type="password" name="pass" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">  
                </div>
                <div class="input-field">
                    <p>confirm password</p>
                    <input type="password" name="cpass" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">  
                </div>
                <input type="submit" name="submit" value="register now" class="btn">
                <p>already have an account? <a href="login.php"><span>login now</span></a></p>
            </form>
        </section>
    </div>
    <script src="Components/sweetalert.js"></script>
    <script src="script.js"></script>
    <?php include 'Components/alert.php'; ?>
</body>
</html>
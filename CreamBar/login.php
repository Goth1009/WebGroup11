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

       $email = $_POST['email'];
       $email = filter_var($email, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
       $pass = $_POST['pass'];
       $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
       
       $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
       $select_user->execute([$email, $pass]);
       $row = $select_user->fetch(PDO::FETCH_ASSOC);
       
       if ($select_user->rowCount() > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        header('location: home.php');
       }else{
        $warning_msg[] = 'incorrect username or password';
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
    <title>Cream Bar - Login Now</title>
</head>
<body>
    <div class="main-container">
        <section class="form-container">
            <div class="title">
                <img src="img/logo.png" alt="">
                <h1>login now</h1>
                <p>Welcome back! Get ready to dive into a world of delightful scoops and sweet treats. Log in now to place your order and enjoy our scrumptious ice creams made just for you. Your next delicious adventure awaits!</p>
                </p>
            </div>
            <form action="" method="post">   
                <div class="input-field">
                    <p>your email</p>
                    <input type="text" name="email" required placeholder="enter your email" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">  
                </div>
                <div class="input-field">
                    <p>your password</p>
                    <input type="password" name="pass" required placeholder="enter your password" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">  
                </div>
                
                <input type="submit" name="submit" value="login now" class="btn">
                <p>don't have an account? <a href="register.php"><span>register now </span></a></p>
            </form>
        </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"       referrerpolicy="no-referrer"></script>

    <script src="script.js"></script>
    <?php include 'Components/alert.php'; ?>
</body>
</html>
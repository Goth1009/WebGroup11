<?php
include 'Components/connection.php';
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("location: login.php");
}
?>
<style type="text/css">
    <?php include 'Style.css';?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Cream bar - about us page</title>
</head>
<body>
    <?php include 'Components/header.php';?>
    <div class="main">
       <div class="banner">
           <h1>about us</h1>
       </div>
       <div class="title2">
           <a href="home.php">home</a><span> / about us</span>
       </div>
       <div class="about-category">
           <div class="box">
               <img src="img/1.png" alt="">
               <div class="detail">
                   <span>coffee</span>
                   <h1>Lemon pink</h1>
                   <a href="view_products.php" class="btn">shop now</a>
               </div>
           </div>
           <div class="box">
               <img src="img/2.png" alt="">
               <div class="detail">
                   <span>coffee</span>
                   <h1>Cream Barname</h1>
                   <a href="view_products.php" class="btn">shop now</a>
               </div>
           </div>
           <div class="box">
               <img src="img/3.png" alt="">
               <div class="detail">
                   <span>coffee</span>
                   <h1>pinkn Teaname</h1>
                   <a href="view_products.php" class="btn">shop now</a>
               </div>
           </div>
           <div class="box">
               <img src="img/4.png" alt="">
               <div class="detail">
                   <span>coffee</span>
                   <h1>Lemon pink</h1>
                   <a href="view_products.php" class="btn">shop now</a>
               </div>
           </div>
       </div>
       <section class="services">
       <div class="title">
    <img src="img/minilogo.png" alt="Mini Logo" class="logo">
    <h1>Why Choose Us</h1>
    <p>Discover the difference with our premium ice cream. </p>
</div>
<div class="box-container">
        <div class="box">
            <img src="img/icon2.png" alt="">
            <div class="detail">
                <h3>great savings</h3>
                <p>Exclusive deals on every order!</p>
            </div>
        </div>
        <div class="box">
            <img src="img/icon1.png" alt="">
            <div class="detail">
                <h3>24/7 support</h3>
                <p>One-on-one support anytime.</p>
            </div>
        </div>
        <div class="box">
            <img src="img/icon0.png" alt="">
            <div class="detail">
                <h3>gift vouchers</h3>
                <p>Special vouchers every festival.</p>
            </div>
        </div>
        <div class="box">
            <img src="img/icon.png" alt="">
            <div class="detail">
                <h3>worldwide delivery</h3>
                <p>Reliable dropshipping globally.</p>
            </div>
        </div>
    </div>
        </section>
        <div class="about">
            <div class="row">
                <div class="img-box">
                    <img src="img/about.png" alt="">
                </div>
                <div class="detail">
    <h1>Visit Our Beautiful Showroom!</h1>
    <p>Explore our creative floral and plant arrangements. Perfect for weddings or adding unique decor to any room, Blossom with Love has you covered.</p>
    <a href="view_products.php" class="btn">shop now</a>
</div>

            </div>
        </div>
        <div class="testimonial-container">
            <div class="title">
                <img src="img/minilogo.png" alt="Mini Logo" class="logo">
                <h1>What People Say About Us</h1>
                <p>Our customers love sharing their experiences with us. See what they have to say about our unique floral and plant arrangements!</p>
            </div>
            <div class="container">
                <div class="testimonial-item active">
                    <img src="img/avatar1.png" alt="Sara Smith">
                    <h1>Sara Smith</h1>
                    <p>"Blossom with Love exceeded my expectations! Their floral arrangements are stunning and unique. Highly recommend!"</p>
                </div>
                <div class="testimonial-item">
                    <img src="img/avatar2.png" alt="John Smith">
                    <h1>John Smith</h1>
                    <p>"Amazing service and beautiful plants. They made my wedding unforgettable with their creative touch."</p>
                </div>
                <div class="testimonial-item">
                    <img src="img/avatar3.png" alt="Selena Ansari">
                    <h1>Selena Ansari</h1>
                    <p>"The best place for unique and vibrant floral decor. Every visit to the showroom is a delight!"</p>
                </div>
                <div class="left-arrow" onclick="prevSlide()"><i class="bx bxs-left-arrow-alt"></i></div>
                <div class="right-arrow" onclick="nextSlide()"><i class="bx bxs-right-arrow-alt"></i></div>
            </div>
        </div>
        <?php include 'Components/footer.php';?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'Components/alert.php';?>
</body>
</html>
<?php
    include 'Components/connection.php';
    session_start();
    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id']; 
     }else{
         $user_id = '';
     }

     if (isset($_POST['logout'])) {
        session_destroy();
        header("location: login.php");
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
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Cream bar - home page</title>
</head>
<body>
    <?php include 'Components/header.php'; ?>
    <div class="main">
        
    <section class="home-section">
    <div class="slider">
        <div class="slider_slider slide1">
            <div class="overlay"></div>
            <div class="slide-detail">
                <h1>Indulge in Sweet Delight</h1>
                <p>Discover our creamy, dreamy ice cream creations.</p>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div>
        <!--slide end-->
        <div class="slider_slider slide2">
            <div class="overlay"></div>
            <div class="slide-detail">
                <h1>A Scoop of Happiness</h1>
                <p>Treat yourself to our delicious flavors today!</p>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div>
        <!--slide end-->
        <div class="slider_slider slide3">
            <div class="overlay"></div>
            <div class="slide-detail">
                <h1>Welcome to Sweet Bliss</h1>
                <p>Experience joy with every spoonful of ice cream.</p>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div>
        <!--slide end-->
        <div class="slider_slider slide4">
            <div class="overlay"></div>
            <div class="slide-detail">
                <h1>Delight in Every Bite</h1>
                <p>Your favorite flavors, made with love and care.</p>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div>
        <!--slide end-->
        <div class="slider_slider slide5">
            <div class="overlay"></div>
            <div class="slide-detail">
                <h1>Heavenly Ice Cream</h1>
                <p>Cool down with our refreshing and tasty treats.</p>
                <a href="view_products.php" class="btn">shop now</a>
            </div>
            <div class="hero-dec-top"></div>
            <div class="hero-dec-bottom"></div>
        </div>
        <!--slide end-->
        <div class="left-arrow"><i class="bx bxs-left-arrow"></i></div>
        <div class="right-arrow"><i class="bx bxs-right-arrow"></i></div>
    </div>
</section>

        <!--home slider end-->
        <section class="thumb">
    <div class="box-container">
        <div class="box">
            <img src="img/10.png" alt="">
            <h3>CHOCOLATE</h3>
            <p>Indulge in the rich and creamy taste of our classic chocolate ice cream. Perfect for chocoholics!</p>
            <!-- <i class="bx bx-chevron-right"></i> -->
        </div>
        <div class="box">
            <img src="img/13.png" alt="">
            <h3>STRAWBERRY</h3>
            <p>Enjoy the refreshing burst of real strawberries in every scoop. A berry lover's delight!</p>
            <!-- <i class="bx bx-chevron-right"></i> -->
        </div>
        <div class="box">
            <img src="img/11.png" alt="">
            <h3>VANILLA</h3>
            <p>Savor the smooth and velvety flavor of our timeless vanilla ice cream. Simple and delicious!</p>
            <!-- <i class="bx bx-chevron-right"></i> -->
        </div>
        <div class="box">
            <img src="img/12.png" alt="">
            <h3>BUTTER TOFFEE</h3>
            <p>Treat yourself to the irresistible blend of buttery toffee and creamy ice cream. A sweet indulgence!</p>
            <!-- <i class="bx bx-chevron-right"></i> -->
        </div>
    </div>
</section>

        <!-- <section class="container">
            <div class="box-container">
                <div class="box">
                    <img src="img/about-us.jpg" alt="">
                </div>
                <div class="box">
                    <img src="img/download.png" alt="">
                    <span>healthy tea</span>
                    <h1>save up to 50% off</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam venenatis suscipit odio.</p>
                </div>
            </div>
        </section> -->
        <section class="shop">
           <div class="title">
              <!-- <img src="img/minilogo.png" alt=""> -->
              <h1>Trending Products</h1>  
           </div> 
           <div class="row">
               <img src="img/banner1.png" alt="">
               <div class="row-detail">
                  <img src="img/banner2.png" alt="">  
                  <div class="top-footer">
    <h1>Enjoy a Scoop of Cream Bar Bliss for a Healthy Treat!</h1>
</div>
               </div> 
           </div>
           <div class="box-container">
                <div class="box">
                    <img src="img/1.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="img/2.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="img/3.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="img/4.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="img/5.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
                <div class="box">
                    <img src="img/6.png" alt="">
                    <a href="view_products.php" class="btn">shop now</a>
                </div>
           </div>
        </section>
        <!-- <section class="shop-category">
            <div class="box-container">
                <div class="box">
                    <img src="img/6.jpg" alt="">
                    <div class="detail">
                        <span>BIG OFFERS</span>
                        <h1>Extra 15% off</h1>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
                <div class="box">
                    <img src="img/7.jpg" alt="">
                    <div class="detail">
                        <span>new in taste</span>
                        <h1>coffee house</h1>
                        <a href="view_products.php" class="btn">shop now</a>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="services">
    <div class="box-container">
        <div class="box">
            <img src="img/icon2.png" alt="">
            <div class="detail">
                <h3>great savings</h3>
                <p>Save big on every order with our exclusive deals!</p>
            </div>
        </div> 
        <div class="box">
            <img src="img/icon1.png" alt="">
            <div class="detail">
                <h3>24/7 support</h3>
                <p>Enjoy one-on-one support any time, any day.</p>
            </div>
        </div>
        <div class="box">
            <img src="img/icon0.png" alt="">
            <div class="detail">
                <h3>gift vouchers</h3>
                <p>Get special vouchers during every festival season.</p>
            </div>
        </div>
        <div class="box">
            <img src="img/icon.png" alt="">
            <div class="detail">
                <h3>worldwide delivery</h3>
                <p>We offer reliable dropshipping worldwide.</p>
            </div>
        </div>
    </div>
</section>

        <section class="brand">
            <div class="box-container">
                <div class="box">
                    <img src="img/brand1.png" alt="">
                </div>
                <div class="box">
                    <img src="img/brand2.png" alt="">
                </div>
                <div class="box">
                    <img src="img/brand3.png" alt="">
                </div>
                <div class="box">
                    <img src="img/brand4.png" alt="">
                </div>
                <div class="box">
                    <img src="img/brand5.png" alt="">
                </div>
            </div>
        </section>
        <?php include 'Components/footer.php'; ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <?php include 'Components/alert.php'; ?>
</body>
</html>
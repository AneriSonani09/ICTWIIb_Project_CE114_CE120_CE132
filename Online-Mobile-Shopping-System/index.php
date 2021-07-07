<?php
$id="";
session_start();
if(isset($_GET['id'])){
  $id=$_GET['id'];
  require_once "config.php";

  $sql = "SELECT * from profile WHERE id=?";
		if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
              $result = mysqli_stmt_get_result($stmt);

              if(mysqli_num_rows($result) == 1){}else{header("location:signin.php");}
              
            }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="page1.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

  <title>Mobile Shopee</title>
</head>

<body>
  <!-- Header -->
  <header id="home" class="header">
    <!-- Navigation -->
    <nav class="nav">
      <div class="navigation container">
        <div class="logo">
          <h1>Mobile  Shopee</h1>
        </div>
        
          <ul class="nav-list">
            <li class="nav-item">
              <a href="#" class="nav-link scroll-link">Home</a>
            </li>
    
            <li class="nav-item">
              <a href="aboutus.php" class="nav-link scroll-link">About</a>
            </li>
            <li class="nav-item">
              <a href="#footer" class="nav-link scroll-link">Contact</a>
            </li>
            <li class="nav-item">
              <a href="account.php?id=<?php echo $id;?>" class="nav-link scroll-link">My Account</a>
            </li>

            <li class="nav-item">
              <a href="logout.php" class="nav-link scroll-link">Log out</a>
            </li>
  
            <li class="nav-item">
              <a href="cart.php?id=<?php echo $id;?>" class="nav-link icon"><i class="fas fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>

        <a href="cart.php?id=<?php echo $id;?>" class="cart-icon">
          <i class="fas fa-shopping-cart"></i>
        </a>

        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
      </div>
    </nav>

    <!-- Hero -->

    <img src="./images/mainimg.jpg" alt="" class="hero-img" />

    <div class="hero-content">
      <h2><span class="discount">10% </span> SALE OFF</h2>
      <h1>
        <span>Summer Vibes</span>
        <span>mode on</span>
      </h1>
      <a class="btn" href="#pros1">shop now</a>
    </div>
  </header>

  <!-- Main -->
  <main>
    <section class="advert section" id="brands">
      <div class="advert-center container">
        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
               iPhone <br />
              </h2>
              <h4>Worlds Best Brands</h4>
            </div>
          </div>
          <img src="./images/apple1.png" alt="">
        </div>

        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
                Samsung <br />
    
              </h2>
              <h4>Worlds Best Brands</h4>
            </div>
          </div>
          <img src="./images/samsung1.png" alt="">
        </div>

        <div class="advert-box">
          <div class="dotted">
            <div class="content">
              <h2>
               One Plus <br />
                
              </h2>
              <h4>Worlds Best Brands</h4>
            </div>
          </div>
          <img src="./images/oneplus.png" alt="">
        </div>
      </div>
    </section>

    <!-- Featured -->
    <section class="section featured" id="pros1">
      <div class="title">
        <h1>Featured Products</h1>
      </div>

      <div class="product-center container">
        <div class="product">
          <div class="product-header">
            <img src="./images/iphone12.jpg" alt="">
            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=1"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="iphone12.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="iphone12.php?id=<?php echo $id;?>">
              <h3>Apple iPhone 12 (64GB)</h3>
            </a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹70,900 <strike> ₹79,900 </strike></h4>
          </div>
        </div>
        <div class="product">
          <div class="product-header">
            <img src="./images/iphone11pro.jpg" alt="">
            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=2"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="iphone11.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="iphone11.php?id=<?php echo $id;?>"><h3>Apple iPhone 11 (64GB)</h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹51,999 <strike> ₹54,900 </strike></h4>
          </div>
        </div>
        <div class="product">
          <div class="product-header">
            <img src="./images/samsung2.jpg">
            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=3"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="galaxyA72.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="galaxyA72.php?id=<?php echo $id;?>"><h3>Samsung Galaxy A72</h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹34,999 <strike> ₹41,999 </strike></h4>
          </div>
        </div>
        <div class="product">
          <div class="product-header">
            <img src="./images/oneplus9pro.jpg" alt="">

            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=4"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="oneplus9.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="oneplus9.php?id=<?php echo $id;?>"><h3>OnePlus 9R 5G</h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹39,999</h4>
          </div>
        </div>
        
      </div>
    </section>

    <!--Latest -->
    <section class="section featured" id="pros2">
      <div class="title">
        <h1>Latest Products</h1>
      </div>

      <div class="product-center container">
        <div class="product">
          <div class="product-header">
            <img src="./images/S21plus.jpg" alt="">
            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=5"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="galaxyS21.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="galaxyS21.php?id=<?php echo $id;?>"><h3>SAMSUNG Galaxy S21 Plus</h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹75,999 <strike>₹1,04,999</strike></h4>
          </div>
        </div>
        <div class="product">
          <div class="product-header">
            <img src="./images/mi10i.jpg" alt="">

            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=6"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="Mi10.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="Mi10.php?id=<?php echo $id;?>"><h3>Mi 10i </h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹21,999 <strike>₹24,999</strike></h4>
          </div>
        </div>
        <div class="product">
          <div class="product-header">
            <img src="./images/mi10Tpro.jpeg" alt="">

            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=7"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="mi10Tpro.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="mi10Tpro.php?id=<?php echo $id;?>"><h3>Mi 10T Pro</h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹36,999 <strike>₹47,999</strike></h4>
          </div>
        </div>
        <div class="product">
          <div class="product-header">
            <img src="./images/mik20.jpeg" alt="">

            <ul class="icons">
              <span><i class="bx bx-heart"></i></span>
              <span><a href="addtocart.php?id=<?php echo $id;?>&id1=8"><i class="bx bx-shopping-bag"></i></a></span>
              <a href="K20.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
            </ul>
          </div>
          <div class="product-footer">
            <a href="K20.php?id=<?php echo $id;?>"><h3>Redmi K20 </h3></a>
            <div class="rating">
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bxs-star"></i>
              <i class="bx bx-star"></i>
            </div>
            <h4 class="price">₹18,479 <strike>₹24,999</strike></h4>
          </div>
        </div>
      </div>
    </section>

    <!-- Product Banner -->
    <section class="section">
      <div class="product-banner">
        <div class="left">
          <img src="./images/banner.jpg" alt="" />
        </div>
        <div class="right">
          <div class="content">
            <h2><span class="discount">10% </span> SALE OFF</h2>
            <h1>
              <span>Choose What you Want</span>
              <span>Get Best Offer</span>
            </h1>
            <a class="btn" href="#pros2">shop now</a>
          </div>
        </div>
      </div>
    </section>

    <div class="promo-area" id="about">
      <div class="title">
        <h1>Something About our Services</h1>
      </div>
      <div class="zigzag-bottom"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="single-promo">
              <i class="fas fa-undo-alt"></i>
              <p>15 Days return</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="single-promo">
              <i class="fa fa-truck"></i>
              <p>Free shipping</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="single-promo">
              <i class="fa fa-lock"></i>
              <p>Secure payments</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="single-promo">
              <i class="fa fa-gift"></i>
              <p>New products</p>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End promo area -->

    <!-- Testimonials -->
    <!-- <section class="section">
      <div class="testimonial-center container">
        <div class="testimonial">
          <span>&ldquo;</span>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis,
            fugiat labore. Veritatis et omnis consequatur.
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/profile1.jpg" alt="" />
          </div>
          <h4>Will Smith</h4>
        </div>
        <div class="testimonial">
          <span>&ldquo;</span>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis,
            fugiat labore. Veritatis et omnis consequatur.
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/profile2.jpg" alt="" />
          </div>
          <h4>Will Smith</h4>
        </div>
        <div class="testimonial">
          <span>&ldquo;</span>
          <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis,
            fugiat labore. Veritatis et omnis consequatur.
          </p>
          <div class="rating">
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bxs-star"></i>
            <i class="bx bx-star"></i>
          </div>
          <div class="img-cover">
            <img src="./images/profile3.jpg" alt="" />
          </div>
          <h4>Will Smith</h4>
        </div>
      </div>
    </section> -->

    <!-- Brands -->
    <!-- <section class="section">
      <div class="brands-center container">
        <div class="brand">
          <img src="./images/brand1.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand2.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand1.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand2.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand1.png" alt="" />
        </div>
        <div class="brand">
          <img src="./images/brand2.png" alt="" />
        </div>
      </div>
    </section> -->
  </main>

  <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>EXTRAS</h3>
          <a href="#brands">Brands</a>
          <a href="#">Gift Certificates</a>
          <a href="#">Affiliate</a>
          <a href="#">Specials</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>INFORMATION</h3>
          <a href="#about">About Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#contact">Contact Us</a>
          <a href="#">Site Map</a>
        </div>
        <div class="footer-center">
          <h3>MY ACCOUNT</h3>
          <a href="account.php?id=<?php echo $id;?>">My Account</a>
          <a href="cart.php?id=<?php echo $id;?>">Order History</a>
          <a href="#">Wish List</a>
          <a href="#">Newsletter</a>
          <a href="#">Returns</a>
        </div>
        <div class="footer-center">
          <h3>CONTACT US</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
            42 Dream House, Dreammy street, 7131 Dreamville, India
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            company@gmail.com
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            456-456-4512
          </div>
          <div>
            <span>
              <i class="far fa-paper-plane"></i>
            </span>
            Dream City, India
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>

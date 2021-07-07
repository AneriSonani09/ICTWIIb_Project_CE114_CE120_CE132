<?php 
session_start();
if($_SESSION['login']){
  if(isset($_GET['id']))
    $id = $_GET['id'];
  else{
    header("location:signin.php");
  }
}else{header("location:signin.php");}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

        <!-- Box icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

        <!-- Glidejs -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
        <!-- Custom StyleSheet -->
        <link rel="stylesheet" href="product.css" />
        <title>Product</title>
    </head>

<body>
    <!-- Navigation -->
    <nav class="nav">
        <div class="navigation container">
            <div class="logo">
                <h1>Mobile Shopee</h1>
            </div>

            <div class="menu">
                <div class="top-nav">
                    <div class="logo">
                        <h1>Mobile Shopee</h1>
                    </div>
                    <div class="close">
                        <i class="bx bx-x"></i>
                    </div>
                </div>

                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php?id=<?php echo $id;?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="aboutus.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account" class="nav-link">Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php?id=<?php echo $id;?>" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
                    </li>
                </ul>
            </div>

            <a href="cart.php?id=<?php echo $id;?>" class="cart-icon">
                <i class="bx bx-shopping-bag"></i>
            </a>

            <div class="hamburger">
                <i class="bx bx-menu"></i>
            </div>
        </div>
    </nav>

    <!-- Product Details -->
    <section class="section product-detail">
        <div class="details container-md">
            <div class="left">
                <div class="main">
                    <img src="./images/samsung2.jpg" alt="">
                </div>

            </div>
            <div class="right">
                <span>Home/Samsung</span>
                <h1>Galaxy A72</h1>
                <div class="price">₹34,999 <strike>₹41,999</strike></div>
                <form>
                    <div>
                        <select>
                            <option value="Select Variant" selected disabled>Select RAM</option>
                            <option value="1">6GB</option>
                            <option value="2">8GB</option>
                        </select>
                        <select>
                            <option value="Select Variant" selected disabled>Select Storage</option>
                            <option value="1">64GB</option>
                        </select>

                    </div>
                </form>

                <form class="form">
                    <a href="addtocart.php?id=<?php echo $id;?>&id1=3" class="addCart">Add To Cart</a>
                </form>
                <h3>Product Details</h3>
                <ul class="detail">
                    <li>8 GB RAM | 128 GB ROM | Expandable Upto 1 TB</li>
                    <li>17.02 cm (6.7 inch) Full HD+ Display</li>
                    <li>64MP + 12MP + 8MP + 5MP | 32MP Front Camera</li>
                    <li>5000 mAh Lithium-ion Battery</li>
                    <li>Qualcomm Snapdragon 720G Processor</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Related -->
    <section class="section featured">
        <div class="top container">
            <h1>Related Products</h1>
            <a href="#" class="view-more">View more</a>
        </div>

        <div class="product-center container">
            <div class="product">
                <div class="product-header">
                    <img src="./images/S21plus.jpg" alt="">
                    <ul class="icons">
                        <span><i class="bx bx-heart"></i></span>
                        <span><i class="bx bx-shopping-bag"></i></span>
                        <a href="galaxyS21.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
                    </ul>
                </div>
                <div class="product-footer">
                    <a href="galaxyS21.php?id=<?php echo $id;?>">
                        <h3>SAMSUNG Galaxy S21 Plus</h3>
                    </a>
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
                        <span><i class="bx bx-shopping-bag"></i></span>
                        <a href="Mi10.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
                    </ul>
                </div>
                <div class="product-footer">
                    <a href="Mi10.php?id=<?php echo $id;?>">
                        <h3>Mi 10i </h3>
                    </a>
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
                    <img src="./images/iphone11pro.jpg" alt="">
                    <ul class="icons">
                        <span><i class="bx bx-heart"></i></span>
                        <span><i class="bx bx-shopping-bag"></i></span>
                        <a href="iphone11.php?id=<?php echo $id;?>"><span><i class="bx bx-search"></i></span></a>
                    </ul>
                </div>
                <div class="product-footer">
                    <a href="iphone11.php?id=<?php echo $id;?>">
                        <h3>Apple iPhone 11 (64GB)</h3>
                    </a>
                    <div class="rating">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bx-star"></i>
                    </div>
                    <h4 class="price">₹51,999 <strike>₹54,900</strike></h4>
                </div>
            </div>
            <div class="product">
                <div class="product-header">
                  <img src="./images/mik20.jpeg" alt="">
      
                  <ul class="icons">
                    <span><i class="bx bx-heart"></i></span>
                    <span><i class="bx bx-shopping-bag"></i></span>
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

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                    <h3>EXTRAS</h3>
                    <a href="#">Brands</a>
                    <a href="#">Gift Certificates</a>
                    <a href="#">Affiliate</a>
                    <a href="#">Specials</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-center">
                    <h3>INFORMATION</h3>
                    <a href="#">About Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-center">
                    <h3>MY ACCOUNT</h3>
                    <a href="#">My Account</a>
                    <a href="#">Order History</a>
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
                        42 Dream House, Dreammy street, 7131 Dreamville, USA
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
                        Dream City, USA
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
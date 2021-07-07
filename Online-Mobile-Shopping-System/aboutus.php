<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile-shopee</title>
     <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="product.css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

</head>
<style>
    .about{
	cursor: pointer;
	background-color: white;
	color: black;
	padding-top: 20px;
	padding-bottom: 30px;
}
.about h1 {
	padding: 10px 0;
	margin-bottom: 20px;
  font-size:3.2rem;
}
.about h2 {
	opacity: .8;
}
.about span {
	display: block;
	width: 100px;
	height: 100px;
	line-height: 100px;
	margin:auto;
	border-radius:50%;  
	font-size: 40px;
	color: white;
	opacity: 0.7;
	background-color: #0f373f;
	border: 2px solid #0f373f;

	webkit-transition:all .5s ease;
 	moz-transition:all .5s ease;
 	os-transition:all .5s ease;
 	transition:all .5s ease;

}
.about-item:hover span{
	opacity: 1;	
	border: 2px solid #CC0039;
	font-size: 42px;
	-webkit-transform: scale(1.1,1.1) rotate(360deg) ;
	-moz-transform: scale(1.1,1.1) rotate(360deg) ;
	-o-transform: scale(1.1,1.1) rotate(360deg) ;
	transform: scale(1.1,1.1) rotate(360deg) ;
}
.about-item:hover h2{
	opacity: 1;
	-webkit-transform: scale(1.1,1.1)  ;
	-moz-transform: scale(1.1,1.1)  ;
	-o-transform: scale(1.1,1.1)  ;
	transform: scale(1.1,1.1) ;
}
.about .lead{
	color: black;
	font-size: 14px;
	font-weight: bold;
}

</style>
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
              <a href="index.php" class="nav-link scroll-link">Home</a>
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
    <section class="text-center about">
        <h1>About US</h1>
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200" >
              <span class="fas fa-users"></span>
              <h2>Services</h2>
              <p class="lead">At Mobile Shopee, we passionately believe in keeping our customer's interest on top of everything else. Our day begins and ends with the aim of keeping our customers happy and with that goal in mind we promise you our Band of Trust.</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200">
              <span class="fa fa-info"></span>
              <h2>Our Aim</h2>
              <p class="lead">Our aim is to provide you with a wide selection of products across categories. Band of Trust comprises of our values with which we aim to consistently deliver a trusted shopping experience to all our customers:</p>
            </div>
            <div class="col-lg-4 col-sm-6 col-ex-12 about-item wow lightSpeedIn" data-wow-offset="200">
              <span class="fa fa-file"></span>
              <h2>Services</h2>
              <p class="lead">We together with our courier partners try to ensure that your products are delivered on time & in good quality packaging with you being informed at every stage of your order through proper communication channels.</p>
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



</body>
</html>
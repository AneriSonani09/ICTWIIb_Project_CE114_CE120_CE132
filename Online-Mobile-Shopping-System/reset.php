<?php

require_once 'config.php';
if(isset($_POST['submit'])){
  
  $email=$_POST['email'];

  $emailquery=" SELECT * from profile where email='$email'";
  
  $query=mysqli_query($link,$emailquery);
  
  $emailcount=mysqli_num_rows($query);

  if($emailcount){
    $userdata= mysqli_fetch_array($query, MYSQLI_ASSOC);
    $username=$userdata['name'];
    $id=$userdata['id'];
    $subject="Password Reset";
    $body="Hi, $username. Click here to reset password 
    http://localhost/ce132/Online-Mobile-Shopping-System/reset_password.php?id=$id";
    $sender_email="From : smitpadaliya5@gmail.com\r\n";

    if(mail($email,$subject,$body,$sender_email)){
      header('location:signin.php');
    }
  }else{
    echo"No email found";
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

        <!-- Glidejs -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
        <!-- Custom StyleSheet -->
        <link rel="stylesheet" href="product.css" />
        <title>Account</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');
            .profile{
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 40px;
                margin: 7rem 8rem;
                font-size: 2rem;
                width: 60%;
                margin-left:340px;

            }
            .container{
                padding:5px;
            }

.profile h3 {
    font-size:1.8rem;
    font-family:times new roman;
}
.profile h1{
    font-family:times new roman;
    text-align:center;
                margin-bottom:20px;
}
.an{
padding:20px;
}
 
input[type=email], select, textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=submit], select{
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color:#0f373f;
  color:white;
  font-size:1.8rem;
}
#submit:hover{
    background-color:transparent;
    color:black;
    font-size:1.5rem;
    border-color:black;
    /*border-size:3px;*/
}

        </style>
    </head>
<body>
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
                        <a href="aboutus.php" class="nav-link">About us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="profile">
        <div class="container">
        <h1>Reset Password</h1>
        <FORM METHOD ="POST" ACTION ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div>
      <div class="an">
		<label>Email Id: </label>
        </div>
		<input type="email" name="email" required>
	</div>

	
<div class ="an">
<INPUT TYPE = "Submit" Name = "submit" id="submit" VALUE = "SEND">
<!-- <INPUT TYPE = "reset" Name = "Reset1"  VALUE = "Reset"> -->
</div>


</FORM>

        </div>

    </div>



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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
</body>
</html>
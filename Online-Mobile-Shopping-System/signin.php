<?php
// Include config file
require_once "config.php";
session_start();
$_SESSION['login']=0;
// Define variables and initialize with empty values
$error = "";
$error_msg = "";
$message = "";

if(isset($_SESSION['message']))
    $message = $_SESSION['message'];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        $mailid = $_POST['emailid'];
		$pass = $_POST['pwd'];

        $sql = "SELECT * from profile WHERE email=?";
		if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $mailid;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    if ($row['password'] == $pass) {
                        
                        $_SESSION['login'] = 1;
                        $_SESSION['id'] = $row["id"];
                        $userid = $row["id"];
		                $usermail = $row["email"];

                        if($_POST["keepmesigned"] == 1)
                            setcookie('useremail', $useremail, time() + (10 * 365 * 24 * 60 * 60));
                        else
                            setcookie('useremail', $useremail, time() - 2);
                        
                        header ("Location:index.php?id=$userid");
                    }else{
                        $error_msg = "Wrong password";
                    }
            }
            else{
                $error_msg = "You do not have <strong><i>Mobile Shopee</i></strong> account. Please sign up for creating an account.";
            }

            $result -> free_result();
  }}
    mysqli_close($link);
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
            body{
                text-aligh:center;
            }
            .profile{
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 40px;
                margin: 7rem 8rem;
                font-size: 2rem;
                width: 55%;
                margin-left:350px;
                
            }
            .container{
                padding:5px;
            }

            .an{
              padding:9px;
              }
            .profile .left{
                padding: 2rem;
                width: 25%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .profile .left img{
                height: 250px;
                width: 250px;
                border: 2px solid grey;
                border-radius: 50%;
            }
            .profile .right{
                padding: 5rem 10rem;
                width: 75%;
            }
            .profile .right ul{
                font-family: 'Lato', sans-serif;
            }
            .profile .right li{
                font-weight: 700;
                margin: 2rem;
            }
            .profile .right span{
                color: black;
                font-weight: 200;
                margin-left: 1rem;
            }


h1{
    padding:8px;
}
 input[type=email], select, textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password], select, textarea {
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
}
#submit:hover{
    background-color:transparent;
    color:black;
    font-size:1.5rem;
    border-color:black;
    border-size:3px;
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
        <div class="login-heading">
        <span><?php echo $message; ?></span>
            <h1><center>Login</center></h1>
            <p>Get full access to your account, every product and your wishlist by signing in...</p>
        </div>
        <div class="login-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="an"><label for="emailid">Email ID:</label></div>
            <div class="an"><input type="email" name="emailid"  value="<?php
            if(isset($_COOKIE["useremail"]))
                echo $_COOKIE["useremail"];
            else{
                echo "";
            }
            ?>" required><br> </div>

<div class="an">
            <label for="pwd">Password:</label>
            </div>
            <input type="password" name="pwd"  required><br>
            <a href="reset.php"><p>Forget Password?</p></a>
      <div class="an">
            <!-- <input type="checkbox" name="keepsigned" value="1"> Remember Me in this browser! <br> -->
            </div>

            <input type="submit" value="Login" id="submit">
            <!-- <input type="reset" value="Reset"> -->
        </form>
        </div>
        <!-- <div class="login-heading">
            <h1 style="text-decoration: underline overline; padding: 20px 0px;">OR</h1> -->
            <div class="an">
            <a href="signup.php"><p>New User!, Create Account Here...</p></a>
            </div>
        <!-- </div> -->
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
<?php
require_once "config.php";

if(isset($_POST['id']) && !empty($_POST['id'])){
  $id = $_POST['id'];

  if($_POST['pword']===$_POST['cpword']){
    $pword = $_POST['pword'];

      $sql = "UPDATE profile SET password=? WHERE id=?";

      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "si", $param_pass, $param_id);
        $param_pass = $pword;
        $param_id = $id;

        if(mysqli_stmt_execute($stmt)){
          // Records updated successfully. Redirect to landing page
          header("location: signin.php");
      } else{
          echo "Something went wrong. Please try again later.";
      }
      }

      mysqli_stmt_close($stmt);
    }
    else{
      echo "Paswords are not matched";
    }
}else{
  if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    $id1 =  trim($_GET["id"]);
    $sql = "SELECT * FROM profile WHERE id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id1;
      
            if(mysqli_stmt_execute($stmt)){
              $result = mysqli_stmt_get_result($stmt);
  
              if(mysqli_num_rows($result) == 1){
                  /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  
                  $id = $row["id"];
                  // Retrieve individual field value
              }}else{
                echo "Oops! Something went wrong. Please try again later.";
            }
    }

    mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
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
                width: 57%;
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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div>
	<center><h2>Reset your Password</h2>
	<input type="text" name="pword" placeholder="New Password"><br>
	<input type="text" name="cpword" placeholder="Confirm New Password"><br>
	<input type="hidden" name="id" value="<?php echo $id1; ?>"/><br>
  <input type="submit" name="submit">
	</center>
	</div>
	</form>

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
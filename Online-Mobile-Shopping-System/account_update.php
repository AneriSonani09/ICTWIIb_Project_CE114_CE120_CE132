<?php 
session_start();
if($_SESSION['login']){
  if(isset($_GET['id']))
    $id = $_GET['id'];
  else{
    header("location:signin.php");
  }
  require_once "config.php";

  $name = $email = $address = $mobile = $gender = $bdate = "";
  $name_err = $email_err = $address_err = $mobile_err = $gender_err = $bdate_err = "";

  if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];

    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

    $input_mail = trim($_POST["email"]);
    if(empty($input_mail)){
        $email_err = "Please enter an email address.";     
    } else{
		filter_var($email, FILTER_VALIDATE_EMAIL);
        $email = $input_mail;
    }

    $input_mobile = $_POST["mobile"];
    if(empty($input_mobile)){
        $mobile_err = "Please enter a mobile number.";     
    } else{
        $mobile = $input_mobile;
    }

    $selected_radio = $_POST['gender'];
	if ($selected_radio == 0) {
		$gender = 0;
	}
	else if ($selected_radio == 1) {
		$gender = 1;
	}
    else{
        $gender_err = "Please select a gender first";
    }

    $input_bdate = $_POST["bdate"];
    if(empty($input_bdate)){
        $bdate_err = "Please select a birth date";     
    }
	else{
       $bdate = $input_bdate;
	}

  if(empty($name_err) && empty($email_err) && empty($address_err) && empty($mobile_err) && empty($gender_err) && empty($bdate_err)){
    $sql = "UPDATE profile SET name=?, email=?, address=?, mobile=?, gender=?, bdate=? WHERE id=?";

    if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "sssiisi", $param_name, $param_email, $param_address, $param_mobile, $param_gender, $param_bdate, $param_id);
      
      // Set parameters
      $param_name = $name;
      $param_email = $email;
      $param_address = $address;
      $param_mobile = $mobile;
      $param_gender = $gender;
      $param_bdate = $bdate;
      $param_id = $id;
      
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
          // Records updated successfully. Redirect to landing page
          header("location: account.php?id=$id");
          exit();
      } else{
          echo "Something went wrong. Please try again later.";
      }
  }
   
  // Close statement
  mysqli_stmt_close($stmt);
  }

  }else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM profile WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $email = $row["email"];
                    $address = $row["address"];
                    $mobile = $row["mobile"];
                    $gender = $row["gender"];
                    $bdate = $row["bdate"];
                }                 
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
}else{header("location:signin.php");}

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
                width: 70%;
                margin-left:15%;

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
padding:5px;
}
 input[type=text], select, textarea {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
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

button{
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color:#0f373f;
  color:white;

}
button:hover{
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
                        <a href="index.php?id=<?php echo $id;?>" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link">About</a>
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

    <div class="profile">
        
        <div class="right" >
             
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
            <div class="an"><h2><center>Update Details</center></h2></div>
            
            <div <?php echo (!empty($name_err)); ?>">
            <div class="an">
            Name: 
            </div>
            <div class="an">
                <input type="text" name="name" value="<?php echo $name;?>">
                <span><?php echo $name_err; ?></span>
            </div>
            </div>
            
            <div <?php echo (!empty($email_err)); ?>">
            <div class="an">
            Email: 
            </div>
            <div class="an">
                <input type="text" name="email" value="<?php echo $email;?>">
            </div>
                <span><?php echo $email_err; ?></span>
              </div>
              <div <?php echo (!empty($address_err)); ?>">
              <div class="an">
            Address: 
            </div>
            <div class="an">
                <textarea name="address" rows="6" cols="40"><?php echo $address;?></textarea>

                </div>
                <span><?php echo $address_err; ?></span>
              </div>
              <div <?php echo (!empty($mobile_err)); ?>">
           <div class="an"> Mobile No.: </div>
           <div class="an">
                <input type="text" name="mobile" value="<?php echo $mobile;?>">
                <span><?php echo $mobile_err; ?></span>
                </div>
              </div>
              <div <?php echo (!empty($gender_err)); ?>">
            <div class="an">Gender: </div>
            <div class="an">
                <input type="radio" name="gender" <?php if($gender==0){echo "checked";} ?> value="0"> Male 
                <input type="radio" name="gender" <?php if($gender==1){echo "checked";} ?> value="1"> Female
                <span><?php echo $gender_err; ?></span>
              </div>
              </div>
              <div <?php echo (!empty($bdate_err)); ?>">
            <div class="an"> Date of Birth: 
                <input type="date" name="bdate" value="<?php echo $bdate;?>">
                <span><?php echo $bdate_err; ?></span>
            </div>
            </div>
            
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
               <div class="an"> <input type="submit" id="submit" value="Update">
		            <button><a href="account.php?id=<?php echo $id;?>">Cancel</a></button>
                </div>
</form>
            </ul>
           
        </div>
    </div>



    <footer id="footer" class="section footer">
        <div class="container">
          <div class="footer-container">
            <div class="footer-center">
              <h3>EXTRAS</h3>
              <a href="index.php?id=<?php echo $id;?>">Brands</a>
              <a href="#">Gift Certificates</a>
              <a href="#">Affiliate</a>
              <a href="#">Specials</a>
              <a href="#">Site Map</a>
            </div>
            <div class="footer-center">
              <h3>INFORMATION</h3>
              <a href="index.php?id=<?php echo $id;?>">About Us</a>
              <a href="#">Privacy Policy</a>
              <a href="#">Terms & Conditions</a>
              <a href="index.php?id=<?php echo $id;?>">Contact Us</a>
              <a href="#">Site Map</a>
            </div>
            <div class="footer-center">
              <h3>MY ACCOUNT</h3>
              <a href="#">My Account</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
</body>
</html>
<?PHP
require_once "config.php";

$name = $email = $pword = $cpword = $address = $mobile = $gender = $bdate =  $profile_image = "";
$errorMessage = $name_err = $email_err = $pword_err = $cpword_err = $address_err = $mobile_err = $gender_err = $bdate_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }

	$input_mail = trim($_POST["mailid"]);
    if(empty($input_mail)){
        $email_err = "Please enter an email address.";     
    } else{
		filter_var($email, FILTER_VALIDATE_EMAIL);
        $email = $input_mail;
    }

	$input_pwd = trim($_POST["pwd"]);
    if(empty($input_pwd)){
        $pword_err = "Please enter a password";     
    } else{
        $pword = $input_pwd;
    }

	$input_cpwd = trim($_POST["cpwd"]);
    if(empty($input_cpwd)){
        $cpword_err = "Please enter a confirm password also!";     
    } else{
        $cpword = $input_cpwd;
    }

	$input_address = $_POST["address"];
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

	$input_mobile = trim($_POST["mobile"]);
    if(empty($input_mobile)){
        $mobile_err = "Please enter a mobile number";     
    }
	else{
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

	if(empty($name_err) && empty($email_err) && empty($pword_err) && empty($cpword_err) && empty($address_err) && empty($mobile_err) && empty($gender_err) && empty($bdate_err)){
		if($pword === $cpword){
			if(strlen($pword) < 15){	
                $sql1 = "SELECT * from profile WHERE email=?";
                if ($stmt1 = mysqli_prepare($link, $sql1)) {
                    mysqli_stmt_bind_param($stmt1, "s", $param_email);
                    $param_email = $email;
        
                    if(mysqli_stmt_execute($stmt1)){
                        $result1 = mysqli_stmt_get_result($stmt1);
        
                        if(mysqli_num_rows($result1) == 1){
                            $_SESSION['message'] = "You previously have account, sign using that mail id";  
                            header("location:signin.php");
                        }else{
                            $sql = "INSERT INTO profile (name, email, password, address, mobile, gender, bdate, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?, NULL)";
			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt, "ssssiis", $param_name, $param_email, $param_pword, $param_address, $param_mobile, $param_gender, $param_bdate);

				$param_name = $name;
				$param_email = $email;
				$param_pword = $pword;
				$param_address = $address;
				$param_mobile = $mobile;
				$param_gender = $gender;
				$param_bdate = $bdate;

			}

			if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: signin.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
                        }
                    }
                }
	}else{
		$pword_err = "Length of Password must be less than 15";
	}
	}else{
		$errorMessage = "Password and confirm password must be same.";
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
padding:12px;
}
 input[type=text], select, textarea {
  width: 80%;
  padding: 11px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=email], select, textarea {
  width: 80%;
  padding: 11px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password], select, textarea {
  width: 80%;
  padding: 11px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=submit], select{
  width: 80%;
  padding: 11px;
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
        <h1>Sign up</h1>
        <FORM METHOD ="POST" ACTION ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div <?php echo (!empty($name_err)); ?>">
    <div class="an">
		<label>Name: </label>
        </div>
		<input type="text" name="name" value="<?php echo $name; ?>" required>
		<span><?php echo $name_err;?></span>
	</div>

	<div <?php echo (!empty($email_err)); ?>">
    <div class="an">
		<label>Email: </label>
        </div>
		<input type="email" name="mailid" value="<?php echo $email; ?>" required>
		<span><?php echo $email_err;?></span>
	</div>

	<div <?php echo (!empty($name_err)); ?>">
    <div class="an">
		<label>Password: </label>
        </div>
		<input type="password" name="pwd" value="<?php echo $pword; ?>" required>
		<span><?php echo $pword_err;?></span>
	</div>

	<div <?php echo (!empty($cpword_err)); ?>">
    <div class="an">
		<label>Confirm Password: </label>
        </div>
		<input type="text" name="cpwd" value="<?php echo $cpword; ?>" required>
		<span><?php echo $cpword_err;?></span>
	</div>

	<div <?php echo (!empty($address_err)); ?>">
    <div class="an">
		<label>Shipping Address: </label>      
</div>
		<textarea name="address" value="<?php echo $address; ?>"  cols="50" rows="7"required></textarea>
		<span><?php echo $address_err;?></span>
	</div>

	<div <?php echo (!empty($mobile_err)); ?>">
    <div class="an">
		<label>Mobile No.: </label>
        </div>
		<input type="text" name="mobile" value="<?php echo $mobile; ?>" required>
		<span><br><?php echo $mobile_err;?></span>
	</div>

<!-- <INPUT TYPE = "reset" Name = "Reset1"  VALUE = "Reset"> -->

<div <?php echo (!empty($gender_err)); ?>">
<div class="an">
		<label>Gender: </label>
        
		<input type="radio" name="gender" value="0"> Male
		<input type="radio" name="gender" value="1"> Female
		<span><br><?php echo $gender_err;?></span>
        </div>
	</div>

    <div <?php echo (!empty($bdate_err)); ?>">
    <div class="an">
		<label>Date of Birth: </label>
        
		<input type="date" name="bdate" value="<?php echo $bdate; ?>" required>
		<span><br><?php echo $bdate_err;?></span>
        </div>
	</div>


</FORM>

<span><?PHP print $errorMessage;?></span>
        </div>
        <div class="an">
        <INPUT TYPE = "Submit" Name = "Submit1" id="submit" VALUE = "Register">
     </div>
        <h3><a href="signin.php"><center><h3>Do you have "Mobile Shopee" account already?</h3> <h2>Login here!</h2></center></a></h3>
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
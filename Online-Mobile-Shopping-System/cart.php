<?php 
session_start();
if($_SESSION['login']==1){
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  else{
    header("location:signin.php");
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
                display: flex;
                margin: 2rem 8rem;
                font-size: 2.5rem;
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


            table{
              /* background-color:#f2f2f2; */
              width:100%;
              font-size:2rem;
              border-collapse: collapse;
            }

            th, td {
  text-align: left;
  padding: 12px;
  height: 40px;
}
h2{
  padding:15px;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #0f373f;
  color: white;
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

    <div class="profile">
        <div class="left">
            <img src="
            <?php
        if($_GET['id'] != ""){
            require_once "config.php";
          $id = $_GET['id'];
          $query = "SELECT * FROM `profile` WHERE id ='$id'";
          $query_run = mysqli_query($link,$query);
          $row = mysqli_fetch_array($query_run);
                if($row['profile_image']==NULL)
                    echo "images/demoprofile.png";
                else{
                    echo "profile_pics/" . $row['profile_image'];
                }
        }
            ?>
            " alt="">
        </div>
        <div class="right" >
        <?php
        if($_GET['id'] != ""){
            require_once "config.php";
          $id = $_GET['id'];
          $query = "SELECT * FROM `profile` WHERE id ='$id'";
          $query_run = mysqli_query($link,$query);
          while($row = mysqli_fetch_array($query_run)){
            
            ?>
             <ul>
                <li> Name :<span> <?php echo $row['name'];?></span></li>
                <li> Email :<span> <?php echo $row['email'];?></span></li>
            </ul>
            <h2><center>Purchase History</center></h2>

            <table>
                <?php
                    $sql = "SELECT phoneid FROM user_purchases where userid=$id";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $i=0;
                            $total = 0;
                            echo "<table border='2'>";
			                echo "<thead>";
				            echo "<tr>";
					        echo "<th>#</th>";
					        echo "<th>Phone Name</th>";
					        echo "<th>Price Paid</th>";
                            echo "</tr>";
                            echo "<thead>";
                            echo "<tbody>";

                            while($row = mysqli_fetch_array($result)){
                                $i++;
                                $id1 = $row['phoneid'];

                                $sql1 = "SELECT * from phone WHERE id=?";
		                        if ($stmt1 = mysqli_prepare($link, $sql1)) {
                                    mysqli_stmt_bind_param($stmt1, "i", $param_id1);
                                    $param_id1 = $id1;

                                    if(mysqli_stmt_execute($stmt1)){
                                        $result1 = mysqli_stmt_get_result($stmt1);

                                        if(mysqli_num_rows($result1) == 1){
                                            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                                            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                                            $total += $row1['price'];
                                            echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo "<td>" . $row1['name'] . "</td>";
                                            echo "<td>₹" . $row1['price'] . "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                }
                            }

                            echo "<tr>";
					        echo "<th colspan='2'>Total</th>";
					        echo "<th>₹" . $total . "</th>";
                            echo "</tr>";

                            echo "</tbody>";
                            echo "</table>";
                        }else{
                            echo "<p><em>No previous purchases.</em></p>";
                        }
                    }
                ?>
            </table>
          <?php  
          }
        }else{
          header("location:signin.php");
        }
?>
           
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
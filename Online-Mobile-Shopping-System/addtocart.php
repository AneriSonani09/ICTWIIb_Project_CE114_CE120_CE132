<?php 
session_start();
if($_SESSION['login']){
  if(isset($_GET['id']) && isset($_GET['id1'])){
    $id = $_GET['id'];
    $id1 = $_GET['id1'];
  }else{
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

            h2{
              padding:10px;
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


button{
  width: 35%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  background-color:#0f373f;
  color:white;
  font-size:1.6rem;

}
button:hover{
    background-color:transparent;
    color:black;
    font-size:1.5rem;
    border-color:black;
    border-size:3px;
}
.an{
padding:30px;
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
                    $sql = "SELECT * FROM phone where id=$id1";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            $i=0;
                            $total = 0;
                            echo "<table border='2'>";
			                      echo "<thead>";
				                    echo "<tr>";
					                  echo "<th>No.</th>";
					                  echo "<th>Phone Name</th>";
					                  echo "<th>Price</th>";
                            echo "</tr>";
                            echo "<thead>";
                            echo "<tbody>";

                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $i++;
                                $total += $row['price'];
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>₹" . $row['price'] . "</td>";
                                echo "</tr>";
                            }
                            echo "<tr>";
					        echo "<th colspan='2'><center>Total</center></th>";
					        echo "<th>₹" . $total . "</th>";
                            echo "</tr>";

                            echo "</tbody>";
                            echo "</table>";
                        }else{
                            echo "<p><em>No phone selected for purchase.</em></p>";
                        }
          }
        }else{
          header("location:signin.php");
        }
?>
         <div class="an">          
        <button><a href="confirm.php?id=<?php echo $id;?>&id1=<?php echo $id1;?>">Confirm Order</a></button>
        <button><a href="index.php?id=<?php echo $id;?>">Cancel Order</a></button>
        </div> 
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
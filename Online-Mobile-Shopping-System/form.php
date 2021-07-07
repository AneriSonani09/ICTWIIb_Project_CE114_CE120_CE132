<?php 
    include_once('processForm.php'); 
    if($_SESSION['login']){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }else{header("location:signin.php");}
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
              .button{
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
                          <a href="account.php?id=<?php echo $id;?>" class="nav-link">Account</a>
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
                      echo "profile_pics/demoprofile.png";
                  else{
                      echo "profile_pics/" . $row['profile_image'];
                  }
          }
              ?>
              " alt="">

              
          </div>
          <div class="right" >
          <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype='multipart/form-data'>
            <div <?php echo  (!empty($msg));?>">
            <label for="update">Update Profile Picture</label>
            <input type="file" class="button" name="profileImage">
            <span><?php echo $msg;?></span>
            </div>
            <br><br>
	        <input type='submit' name='submit' class="button" value='Upload'>
            <button><a href="account.php?id=<?php echo $id;?>">Go to Account Page</a></button>
          </form>
          <button><a href="account.php?id=<?php echo $id;?>">Cancel</a></button>
      </div>


  </body>
  </html>
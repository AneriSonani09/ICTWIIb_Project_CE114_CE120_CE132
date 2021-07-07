<?php 
  if(isset($_GET['id']) && isset($_GET['id1'])){
    $id = $_GET['id'];
    $id1 = $_GET['id1'];
        require_once "config.php";
        $sql = "INSERT INTO user_purchases (userid, phoneid) VALUES (?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ii", $param_id, $param_id1);
                    $param_id = $id;
                    $param_id1 = $id1;

            if(mysqli_stmt_execute($stmt)){
                $query = "SELECT * FROM profile WHERE id ='$id'";
                $query_run = mysqli_query($link,$query);
                $row = mysqli_fetch_array($query_run, MYSQLI_ASSOC);
                $name = $row['name'];
                
                $query1 = "SELECT * FROM phone WHERE id ='$id1'";
                $query_run1 = mysqli_query($link,$query1);
                $row1 = mysqli_fetch_array($query_run1, MYSQLI_ASSOC);

                $email = $row['email'];
                $subject = "Purchase Notification";
                $body = "Hii $name,\n\tThanks for using our online mobile shopping service and purchasing \"" . $row1['name'] . "\" from our site 'Mobile Shopee'. \n\tWe are very glad to have you as our responsible member. Keep shpping from our site and get least price and maximum discounts.\nThank you from,\n'Mobile Shopee' Team.";
                $sender_mail = "From : vadgamasiddharth9@gmail.com\r\n";

                if(mail($email,$subject,$body,$sender_mail)){
                    header("location:index.php?id=$id");
                  }else{
                      echo "Something went wrong. Please try again later.";
                  }
                }
            }
  }
  else{
    header("location:signin.php");
  }
?>
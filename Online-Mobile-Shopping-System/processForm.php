<?php
    session_start();
  $msg = "";
  $msg_class = "";
  $id = $_SESSION['id'];
  $conn = mysqli_connect("localhost", "root", "", "mobile_shopee");
  if (isset($_POST['submit'])) {
    // for the database
    if(isset($_FILES['profileImage'])){
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    
    $target_dir = "profile_pics/";
    $target_file = $target_dir . basename($profileImageName);
    
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    
    // Upload image only if no errors
    if (empty($msg)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE profile SET profile_image='$profileImageName' where id='$id'";
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded";
          $msg_class = "alert-success";
          header("account.php?id=$id");
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an error uploading the file";
        $msg = "No files selected";
      }
    }
  }else{$msg = "No files selected";}
}
?>
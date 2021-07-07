<?php
session_start();
if($_SESSION['login'] == 1){
    $_SESSION['login'] = 0;
    header("location:signin.php");
}else{header("location:signin.php");}

?>
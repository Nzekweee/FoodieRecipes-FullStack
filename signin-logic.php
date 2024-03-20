<?php
require 'config/database.php';

//get signin form if signup button was clicked
if(isset($_POST['submit'])){
//form data
$username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

//validation
if (!$username) {
    $_SESSION['sign-in'] = "Username required";
  } elseif (!$email) {
    $_SESSION['sign-in'] = "Email required";
  } elseif (!$password) {
    $_SESSION['sign-in'] = "Password required";
  } else{
    //fetch user from database
    $fetch_user_query = "SELECT * FROM user WHERE username='$username' AND email='$email'";
    $fetch_user_result = mysqli_query($connection,$fetch_user_query);
    if(mysqli_num_rows($fetch_user_result) == 1){
        //get record array
          $user_record = mysqli_fetch_assoc($fetch_user_result);
          $db_password = $user_record['password'];
          if(password_verify($password, $db_password)){
              //grant access and set session
              $_SESSION['user-id'] = $user_record['id'];
              //check is_admin
              if($user_record['is_admin'] == 1){
                $_SESSION['user_is_admin'] = true;
              }
              //log user in. NB: change route back emma
              header('location: '. ROOT_URL . 'dashboard/');
          } else {
            $_SESSION['sign-in'] = "Wrong Password!";
          }
    } else {
        $_SESSION['sign-in'] = "User not found";
    }
  }

  if(isset($_SESSION['sign-in'])){
    $_SESSION['signin-data'] = $_POST;
    header('location: '. ROOT_URL . 'sign-in.php');
    die();
  }

} else {
    //go back to sign up
    header('location: '. ROOT_URL . 'sign-in.php');
    die();
}
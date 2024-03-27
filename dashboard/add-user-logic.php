<?php
require 'config/database.php';

//get user form if signup button was clicked
if(isset($_POST['submit'])){
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createPassword = filter_var($_POST['createPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmPassword = filter_var($_POST['confirmPassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);

    //validating input values
  if (!$fullname) {
    $_SESSION['add-user'] = "Please enter your name";
  } elseif (!$username) {
    $_SESSION['add-user'] = "Please enter your username";
  } elseif (!$email) {
    $_SESSION['add-user'] = "Please enter a valid email";
  }elseif (strlen($createPassword) < 6 || strlen($confirmPassword) < 6) {
    $_SESSION['add-user'] = "Password should have atleast 6 characters";
  } elseif (!$avatar['name']) {
    $_SESSION['add-user'] = "Please add an image";
  }   else {
    //check password and confirmpassword match
    if ($createPassword !== $confirmPassword) {
        $_SESSION['add-user'] = "Passwords do not match!";
    } else {
        //hash password
        $hashed_password = password_hash($createPassword, PASSWORD_DEFAULT);

        //username and email check
        $user_check_query =  "SELECT * FROM user WHERE username= '$username' OR email = '$email'";
        $user_check_result = mysqli_query($connection, $user_check_query );
        if(mysqli_num_rows($user_check_result) > 0){
            $_SESSION['add-user'] = "Username or Email already exists";
        }  else{
            //avatar
            $time = time();
            $avatar_name = $time . $avatar['name'];
            $avatar_temp_name = $avatar['tmp_name'];
            $avatar_destination_path = '../assets/' . $avatar_name;

            //file should not be more than 2mb
            if($avatar['size'] > 2000000){
              $_SESSION['add-user'] = "File size too big, file should be less than 2mb";
            } 
        }
    }
  }

  //redirect back to adduser page if there's a problem
  if(isset($_SESSION['add-user'])){
    //pass form data back to signup page
    $_SESSION['add-user-data'] = $_POST;
    header('location: '. ROOT_URL . 'dashboard/add-user.php');
    die();
  }else{
    //insert user into user table in database
    $insert_user_query = "INSERT INTO user SET fullname='$fullname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin = '$is_admin'";
    $insert_user_result = mysqli_query($connection, $insert_user_query);

    if(!mysqli_errno($connection)){
        //redirect 
        $_SESSION['add-user-success'] = "New user $fullname Added sucessfully ";
        header('location: '. ROOT_URL . 'dashboard/manage-user.php');
        move_uploaded_file($avatar_temp_name, $avatar_destination_path);
        die();
    }
  }

} else {
    //go back to sign up
    header('location: '. ROOT_URL . 'dashboard/add-user.php');
    die();
}
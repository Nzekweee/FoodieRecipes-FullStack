<?php
require 'config/database.php';

//get user form if signup button was clicked
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    //validating input values
  if (!$fullname) {
    $_SESSION['edit-user'] = "Please enter your name";
  } elseif (!$username) {
    $_SESSION['edit-user'] = "Please enter your username";
  } elseif (!$email) {
    $_SESSION['edit-user'] = "Please enter a valid email";
  } elseif (!$avatar['name']) {
    $_SESSION['edit-user'] = "Please add an image";
  }   else {
        //username and email check
        $user_check_query = "SELECT * FROM user WHERE (username = '$username' OR email = '$email') AND id != $id";
        $user_check_result = mysqli_query($connection, $user_check_query );
        if(mysqli_num_rows($user_check_result) > 0){
            $_SESSION['edit-user'] = "Username or Email already exists";
        }  else{
            //avatar
            $time = time();
            $avatar_name = $time . $avatar['name'];
            $avatar_temp_name = $avatar['tmp_name'];
            $avatar_destination_path = '../assets/' . $avatar_name;

            //file should not be more than 2mb
            if($avatar['size'] < 2000000){
                move_uploaded_file($avatar_temp_name, $avatar_destination_path);
            } else{
                $_SESSION['edit-user'] = "File size too big, file should be less than 2mb";
            }
        }
    
  }

  //redirect back to edituser page if there's a problem
  if(isset($_SESSION['edit-user'])){
    header('location: '. ROOT_URL . 'dashboard/manage-user.php');
    die();
  }else{
    //insert user into user table in database
    $update_user_query = "UPDATE user SET fullname='$fullname', username='$username', email='$email', avatar='$avatar_name', is_admin = $is_admin WHERE id=$id LIMIT 1";
    $update_user_result = mysqli_query($connection, $update_user_query);

    if(!mysqli_errno($connection)){
        //redirect 
        $_SESSION['edit-user-success'] = "User $fullname updated sucessfully ";
        header('location: '. ROOT_URL . 'dashboard/manage-user.php');
        die();
    } else {
        $_SESSION['edit-user'] = "Failed to  update user ";
    }
  }

} else {
    //go back to sign up
    header('location: '. ROOT_URL . 'dashboard/edit-user.php');
    die();
}
<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM user WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
 if(mysqli_num_rows($result) == 1){
//delete user avatar
  $avatar_name = $user['avatar'];
  $avatar_path = '../assets/' . $avatar_name;
  if($avatar_path) {
    unlink($avatar_path);
  }
 }
 //fetch all thumbnails of user and delete
 $thumnails_query = "SELECT thumbnail FROM recipes WHERE author_id=$id";
 $thumbnails_result = mysqli_query($connection, $thumnails_query);
 if(mysqli_num_rows($thumbnails_result)>0){
   while($thumbnail = mysqli_fetch_assoc($thumbnails_result)){
      $thumbnail_path = '../assets/' . $thumbnail['thumbnail'];
      if($thumbnail_path) {
         unlink($thumbnail_path);
       }
   }
 }



 //delete user from database
 $delete_user_query = "DELETE FROM user WHERE id=$id";
 $delete_user_result = mysqli_query($connection,$delete_user_query);
 if(mysqli_errno($connection)){
    $_SESSION['delete-user'] = "Couldn't Delete '{$user['fullname']}'";
 } else{
    $_SESSION['delete-user-success'] = "'{$user['fullname']}' Deleted Successfully";
 }
  } 

  header('location:' . ROOT_URL . 'dashboard/manage-user.php');
  die();
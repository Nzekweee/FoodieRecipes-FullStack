<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //update category_id of posts that belong to this category to id of uncatgorized category
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_assoc($result);
 if(mysqli_num_rows($result) == 1){
//delete category cat_img
  $cat_img_name = $category['cat_img'];
  $cat_img_path = '../assets/' . $cat_img_name;
  if($cat_img_path) {
    unlink($cat_img_path);
  }
 }

 //delete category from database
 $delete_category_query = "DELETE FROM categories WHERE id=$id LIMIT 1";
 $delete_category_result = mysqli_query($connection,$delete_category_query);
 if(mysqli_errno($connection)){
    $_SESSION['delete-category'] = "Couldn't Delete '{$category['cat_name']}'";
 } else{
    $_SESSION['delete-category-success'] = "'{$category['cat_name']}' Deleted Successfully";
 }
  } 

  header('location:' . ROOT_URL . 'dashboard/manage-categories.php');
  die();
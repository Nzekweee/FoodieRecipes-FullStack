<?php
require 'config/database.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM recipes WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $recipe = mysqli_fetch_assoc($result);
 if(mysqli_num_rows($result) == 1){
//delete recipe avatar
  $thumbnail_name = $recipe['thumbnail'];
  $thumbnail_path = '../assets/' . $thumbnail_name;
  if($thumbnail_path) {
    unlink($thumbnail_path);
  }
 }
 //delete recipe from database
 $delete_recipe_query = "DELETE FROM recipes WHERE id=$id";
 $delete_recipe_result = mysqli_query($connection,$delete_recipe_query);
 if(mysqli_errno($connection)){
    $_SESSION['delete-recipe'] = "Couldn't Delete Recipe";
 } else{
    $_SESSION['delete-recipe-success'] = "Recipe Deleted Successfully";
 }
  } 

  header('location:' . ROOT_URL . 'dashboard/manage-recipes.php');
  die();
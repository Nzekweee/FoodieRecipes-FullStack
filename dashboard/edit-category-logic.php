<?php
require 'config/database.php';

//get category form if signup button was clicked
if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $cat_name = filter_var($_POST['cat_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_desc = filter_var($_POST['cat_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_img = $_FILES['cat_img'];

    //validating input values
    if (!$cat_name ) {
        $_SESSION['edit-category'] = "Please enter a category name";
    } elseif (!$cat_desc) {
        $_SESSION['edit-category'] = "Please enter a category description";
    } elseif (!$cat_img['name']) {
        $_SESSION['edit-category'] = "Please edit an image";
    }   else {
        //check if category name exist
        $category_check_query =  "SELECT * FROM categories WHERE cat_name= '$cat_name' AND id != $id";
        $category_check_result = mysqli_query($connection, $category_check_query );
        if(mysqli_num_rows($category_check_result) > 0){
            $_SESSION['edit-category'] = "Category  name already exists";
        }  else{
        // Cat_img
        $time = time();
        $cat_img_name = $time . $cat_img['name'];
        $cat_img_temp_name = $cat_img['tmp_name'];
        $cat_img_destination_path = '../assets/' . $cat_img_name;
         // File should not be more than 2mb
         if($cat_img['size'] < 2000000){
             move_uploaded_file($cat_img_temp_name, $cat_img_destination_path);
         } else {
             $_SESSION['edit-category'] = "File size too big, file should be less than 2mb";
         }
            
        }
    
  }

  //redirect back  if there's a problem
  if(isset($_SESSION['edit-category'])){
         
        header('location: '. ROOT_URL . 'dashboard/manage-categories.php');
        die();
  }else{
    //insert category into category table in database
    $update_category_query = "UPDATE categories SET cat_name='$cat_name', cat_desc='$cat_desc', cat_img='$cat_img_name' WHERE id=$id LIMIT 1";
    $update_category_result = mysqli_query($connection, $update_category_query);

    if(!mysqli_errno($connection)){
        //redirect 
        $_SESSION['edit-category-success'] = "category $cat_name updated sucessfully ";
        header('location: '. ROOT_URL . 'dashboard/manage-categories.php');
        die();
    } else {
        $_SESSION['edit-category'] = "Failed to  update category ";
    }
  }

} else {
    header('location: '. ROOT_URL . 'dashboard/edit-category.php');
    die();
}
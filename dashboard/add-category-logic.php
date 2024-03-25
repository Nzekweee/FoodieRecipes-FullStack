<?php
require 'config/database.php';

// Get user form if submit button was clicked
if(isset($_POST['submit'])){
    $cat_name = filter_var($_POST['cat_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_desc = filter_var($_POST['cat_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cat_img = $_FILES['cat_img'];

    // Validating input values
    if (!$cat_name ) {
        $_SESSION['add-category'] = "Please enter a category name";
    } elseif (!$cat_desc) {
        $_SESSION['add-category'] = "Please enter a category description";
    } elseif (!$cat_img['name']) {
        $_SESSION['add-category'] = "Please add an image";
    } else {

        //check if category name exist
        $category_check_query =  "SELECT * FROM categories WHERE cat_name= '$cat_name' ";
        $category_check_result = mysqli_query($connection, $category_check_query );
        if(mysqli_num_rows($category_check_result) > 0){
            $_SESSION['add-category'] = "Category  name already exists";
        }  else{
        // Cat_img
        $time = time();
        $cat_img_name = $time . $cat_img['name'];
        $cat_img_temp_name = $cat_img['tmp_name'];
        $cat_img_destination_path = '../assets/' . $cat_img_name;
         // File should not be more than 2mb
         if($cat_img['size'] > 2000000){
             $_SESSION['add-category'] = "File size too big, file should be less than 2mb";
         } 
        }
    }

    // Redirect back if there's a problem
    if(isset($_SESSION['add-category'])){
        // Display error message and pass form data back
        $_SESSION['add-category-data'] = $_POST;
        header('location: '. ROOT_URL . 'dashboard/add-category.php');
        die();
    } else {
        // Insert category into categories table in database
        $insert_category_query = "INSERT INTO categories SET cat_name='$cat_name', cat_desc='$cat_desc', cat_img='$cat_img_name'";
        $insert_category_result = mysqli_query($connection, $insert_category_query);
        if(!$insert_category_result || mysqli_errno($connection)){
            $_SESSION['add-category-error'] = "Couldn't create category: " . mysqli_error($connection);
            $_SESSION['add-category-data'] = $_POST;
            header('location: '. ROOT_URL . 'dashboard/add-category.php');
            die();
        } else{
            // Redirect on success
            $_SESSION['add-category-success'] = "New category '$cat_name' added successfully";
            header('location: '. ROOT_URL . 'dashboard/manage-categories.php');
            move_uploaded_file($cat_img_temp_name, $cat_img_destination_path);
            die();
        }
    }
} else {
    // Redirect if submit button was not clicked
    header('location: '. ROOT_URL . 'dashboard/add-category.php');
    die();
}
?>

<?php
// Include your database configuration file
require 'config/database.php';

// Check if the form is submitted
if(isset($_POST['submit'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = $_FILES['thumbnail'];
    $recipe_desc = filter_var($_POST['recipe_desc'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $prep_time = filter_var($_POST['prep_time'], FILTER_SANITIZE_NUMBER_INT);
    $cook_time = filter_var($_POST['cook_time'], FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT); 
    $ingredients = $_POST['ingredients']; // Array of ingredients
    $directions = $_POST['directions']; // Array of directions
    $author_id = $_SESSION['user-id'];

    
    if (!$title) {
        $_SESSION['add-recipe'] = "Please enter a Recipe title";
      } elseif (!$category_id) {
        $_SESSION['add-recipe'] = "Please choose a category";
      } elseif (!$recipe_desc) {
        $_SESSION['add-recipe'] = "Please add a description of you recipe";
      }elseif (!$prep_time) {
        $_SESSION['add-recipe'] = "Add a preparation time in minutes";
      } elseif (!$cook_time) {
        $_SESSION['add-recipe'] = "Add a cook time in minutes";
      } elseif (!$thumbnail['name']) {
        $_SESSION['add-recipe'] = "Please add a Thumbnail";
      } else {
    // Handle image upload
    $time = time();
    $thumbnail_name = $time . $thumbnail['name'];
    $thumbnail_temp_name = $thumbnail['tmp_name'];
    $thumbnail_destination_path = '../assets/' . $thumbnail_name;
             // File should not be more than 2mb
        if($thumbnail['size'] > 2000000){
          $_SESSION['add-recipe'] = "Thumbnail: File size is too big, file should be less than 2mb";
       } 
    }
    


    if(isset($_SESSION['add-recipe'])){
        $_SESSION['add-recipe-data'] = $_POST;
        header('location: '. ROOT_URL . 'dashboard/index.php');
        die();
  }else{
    //insert  recipe to table
        $insert_recipe_query= "INSERT INTO recipes SET title='$title', thumbnail = '$thumbnail_name', recipe_desc='$recipe_desc', prep_time= '$prep_time', cook_time= '$cook_time', category_id ='$category_id', author_id = '$author_id'";
        $insert_recipe_result = mysqli_query($connection, $insert_recipe_query);
        if(!mysqli_errno($connection)) {
            // insert ingredients and directions into db
            $recipe_id = mysqli_insert_id($connection);
        
            // Insert ingredients 
            foreach($ingredients as $ingredient) {
                $ingredient_name = mysqli_real_escape_string($connection, $ingredient);
                $insert_ingredient_query = "INSERT INTO ingredients SET recipe_id = '$recipe_id', ingredient='$ingredient_name'";
                $insert_ingredient_result = mysqli_query($connection, $insert_ingredient_query);
                if (!$insert_ingredient_result) {
                    $_SESSION['add-recipe'] = "Failed to add ingredient";
                }
            }


        
            // Insert directions 
            foreach($directions as $direction) {
                $direction_title = mysqli_real_escape_string($connection, $direction['title']);
                $direction_desc = mysqli_real_escape_string($connection, $direction['description']);
                $insert_direction_query = "INSERT INTO directions  SET recipe_id = '$recipe_id', direction_desc = '$direction_desc', direction_title = '$direction_title' ";
                mysqli_query($connection, $insert_direction_query);
            }
        
    
            if(!mysqli_errno($connection)){
                //redirect 
                $_SESSION['add-recipe-success'] = "Recipe Added sucessfully ";
                header('location: '. ROOT_URL . 'dashboard/manage-recipes.php');
                move_uploaded_file($thumbnail_temp_name, $thumbnail_destination_path);
                die();
            }
        } else {
            // Redirect to error page
            header('location: '. ROOT_URL . 'dashboard/index.php');
            die();
        }
  }

} else {
    header('location: '. ROOT_URL . 'dashboard/index.php');
    die();
}
?>

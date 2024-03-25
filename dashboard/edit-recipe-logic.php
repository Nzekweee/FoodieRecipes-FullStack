<?php
require 'config/database.php';


if(isset($_POST['submit'])) {
    $recipe_id = filter_var($_POST['recipe_id'], FILTER_SANITIZE_NUMBER_INT); 
    $old_thumbnail = filter_var($_POST['old_thumbnail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
        $_SESSION['edit-recipe'] = "Please enter a Recipe title";
      } elseif (!$category_id) {
        $_SESSION['edit-recipe'] = "Please choose a category";
      } elseif (!$recipe_desc) {
        $_SESSION['edit-recipe'] = "Please add a description of you recipe";
      }elseif (!$prep_time) {
        $_SESSION['edit-recipe'] = "Add a preparation time in minutes";
      } elseif (!$cook_time) {
        $_SESSION['edit-recipe'] = "Add a cook time in minutes";
      } elseif (!$thumbnail['name']) {
        $_SESSION['edit-recipe'] = "Please add a Thumbnail";
      } else {
              if(file_exists($old_thumbnail)) {
                 $old_thumbnail_path = '../assets/' . $thumbnail_name;
                  unlink($old_thumbnail); 
              }  
              // Handle image upload
              $time = time();
              $thumbnail_name = $time . $thumbnail['name'];
              $thumbnail_temp_name = $thumbnail['tmp_name'];
              $thumbnail_destination_path = '../assets/' . $thumbnail_name;
                       // File should not be more than 2mb
              if($thumbnail['size'] < 2000000){
                 move_uploaded_file($thumbnail_name, $thumbnail_destination_path);
             } else {
              $_SESSION['edit-recipe'] = "Thumbnail: File size is too big, file should be less than 2mb";
              }
    }


      //redirect back to if there's a problem
    if(isset($_SESSION['edit-recipe'])){           
        header('location: '. ROOT_URL . 'dashboard/manage-recipes.php');
        die();
    }else{
        // Update recipe details
        $update_recipe_query = "UPDATE recipes SET title = '$title',thumbnail = '$thumbnail_name' ,recipe_desc = '$recipe_desc', prep_time = '$prep_time', cook_time = '$cook_time', category_id = '$category_id' WHERE id = '$recipe_id'";
        $update_recipe_result = mysqli_query($connection, $update_recipe_query);
    
    if(!mysqli_errno($connection)){

                 // Delete all previous ingredients associated with the recipe
                $delete_previous_ingredients_query = "DELETE FROM ingredients WHERE recipe_id = '$recipe_id'";
                mysqli_query($connection, $delete_previous_ingredients_query);
                
                // Insert new ingredients
                foreach($ingredients as $ingredient) {
                    $ingredient_name = mysqli_real_escape_string($connection, $ingredient);
                    $insert_ingredient_query = "INSERT INTO ingredients SET recipe_id = '$recipe_id', ingredient='$ingredient_name'";
                    $insert_ingredient_result = mysqli_query($connection, $insert_ingredient_query);
                    if (!$insert_ingredient_result) {
                        $_SESSION['edit-recipe'] = "Failed to update ingredient";
                    }
                }


                 // Delete all previous ingredients associated with the recipe
                 $delete_previous_direction_query = "DELETE FROM directions WHERE recipe_id = '$recipe_id'";
                 mysqli_query($connection, $delete_previous_direction_query);                

                 foreach($directions as $direction) {
                    $direction_title = mysqli_real_escape_string($connection, $direction['title']);
                    $direction_desc = mysqli_real_escape_string($connection, $direction['description']);
                    $insert_direction_query = "INSERT INTO directions  SET recipe_id = '$recipe_id', direction_desc = '$direction_desc', direction_title = '$direction_title' ";
                    mysqli_query($connection, $insert_direction_query);
                }
         
                if(!mysqli_errno($connection)){
                    //redirect 
                    $_SESSION['edit-recipe-success'] = "Recipe Updated sucessfully ";
                    header('location: '. ROOT_URL . 'dashboard/manage-recipes.php');
                    die();
                } else{
                    $_SESSION['edit-recipe'] = "Failed to  update ingredients and direction ";
                }

} else {
    $_SESSION['edit-recipe'] = "Failed to  update category ";
    header('location: '. ROOT_URL . 'dashboard/manage-recipes.php');
    die();
}
}


} else {
    // Redirect if form is not submitted
    header('location: '. ROOT_URL . 'dashboard/manage-recipes.php');
    die();
}
?>

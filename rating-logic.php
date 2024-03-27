<?php
require 'config/database.php';

// Get user form if submit button was clicked
if(isset($_POST['submit'])){
    $recipe_id = filter_var($_POST['recipe_id'], FILTER_SANITIZE_NUMBER_INT);
    $star1 = isset($_POST['star1']) ? 1 : 0;
    $star2 = isset($_POST['star2']) ? 1 : 0;
    $star3 = isset($_POST['star3']) ? 1 : 0;
    $star4 = isset($_POST['star4']) ? 1 : 0;
    $star5 = isset($_POST['star5']) ? 1 : 0;

   $total_rating = $star1 + $star2 + $star3 + $star4 + $star5;


   if(isset($_SESSION['user-id'])){
    $user_id = $_SESSION['user-id'];
    $user_rating_check_query =  "SELECT * FROM ratings WHERE user_id= '$user_id' AND recipe_id = '$recipe_id'";
    $user_rating_check_result = mysqli_query($connection, $user_rating_check_query );
 
    if(mysqli_num_rows($user_rating_check_result) > 0){
     $_SESSION['rating-error'] = "You have Rated this recipe already";
     // Redirect after rating submission with the recipe id included in the URL
 header('location: '. ROOT_URL . 'recipe-post.php?id=' . $recipe_id);
 
 
     die();
 }  else {
     $insert_rating_query = "INSERT INTO ratings SET rating='$total_rating', recipe_id='$recipe_id', user_id = '$user_id'";
     $insert_rating_result = mysqli_query($connection, $insert_rating_query);
     if(!mysqli_errno($connection)){
         //redirect 
         $_SESSION['rating-success'] = "Your rating has been recorded ";
         header('location: '. ROOT_URL . 'recipe-post.php?id=' . $recipe_id);
 
 
         die();
     } else {
     // Redirect to error page
     $_SESSION['rating-error'] = "An error occured";
       header('location: '. ROOT_URL . 'recipe-post.php?id=' . $recipe_id);
 
 
     die();
 }
     
 }
 
   } else {
    header('location: '. ROOT_URL . 'sign-in.php' );
    die();
   }
   



} else {
    // Redirect if submit button was not clicked
   header('location: '. ROOT_URL . 'recipe-post.php?id=' . $recipe_id);
    die();
}
?>

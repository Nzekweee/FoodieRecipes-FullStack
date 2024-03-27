<?php
include 'partials/header.php';

if(isset($_GET['search']) && isset($_GET['submit'])){
    $category_id = filter_var($_GET['category_id'], FILTER_SANITIZE_NUMBER_INT);
    $search = filter_var($_GET['search'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $query = "SELECT * FROM recipes WHERE title LIKE '%$search%' AND category_id = $category_id ORDER BY time_date DESC
    ";
    $recipes = mysqli_query($connection,$query);

    $category_query = "SELECT * FROM categories WHERE id=$category_id";
    $category_result = mysqli_query($connection, $category_query);
    if(mysqli_num_rows($category_result) == 1){
        $category = mysqli_fetch_assoc($category_result);
      }


} else {
    header('location:' . ROOT_URL . 'recipe.php');
    die();
}

?>

        <style>
          <?php include 'css/recipe.css'; ?>
          </style>

    <section class='category__image-header'>
         <img src="<?= ROOT_URL . 'assets/' . $category['cat_img']?>" alt="cat_img">
      </section>

     <section class="container">
           <header class="cat-search-header">
               <h2><?=$category['cat_name']?></h2>
                <p><?=$category['cat_desc'] ?></p>
           </header>
            <section class="search__container-top flex-row space-between">
                <!-- searchbar -->
                <form class="search-container" action="<?= ROOT_URL ?>search-category-recipes.php" method="GET">
                      <input type="hidden" name="category_id" value="<?=$category_id ?>">
                      <input type="text" name="search" id="searchInput" placeholder="Search Recipes...">
                      <button id="searchButton" type="submit" name="submit"><i class="fas fa-search"></i></button>
                </form>   
               </section>
     </section>
       <main class="container recipe-categories-display">
       <?php if(mysqli_num_rows($recipes)> 0) : ?>
        <section class=" recipe-details-section category__recipes ">
       <?php while($recipe = mysqli_fetch_assoc($recipes)) {
             $author_id = $recipe['author_id'];
             $author_query = "SELECT username FROM user WHERE id = $author_id ";
             $author_result = mysqli_query($connection, $author_query);
             $author = mysqli_fetch_assoc($author_result);

             
        
        ?>
                        <div class="trending__recipe flex-column">
                           <div class="recipe_like  flex-row div-center recipe_like-clicked"><i class="fa-solid fa-heart recipe-heart" ></i></div>
                           <div class="trending__recipe-imagecont">
                             <img src="<?= ROOT_URL . 'assets/' . $recipe['thumbnail']?>" alt="recipe-img">
                           </div>
                           <span class="recipe-title"><?= $recipe['title'] ?></span>
                           <div class="flex-row recipe-details">
                             <div class="flex-row div-center">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time"><?= $recipe['cook_time'] ?> mins</span>
                             </div>
                             <div class="flex-row div-center">
                               <img src="assets/ForkKnife.svg" alt="timer">
                               <span class="recipe-category"><?= $author['username']?></span>
                             </div>
                           </div>
                           <div class="flex-row">
                           <?php
                           $star_ratings = ceil($recipe['average_rating']);
                            for ($i = 1; $i <= 5; $i++) {
                              if ($i <= $star_ratings) {
                                  echo '<i class="fa-solid fa-star" style="color: #a1c4fd"></i>'; 
                              } else {
                                  echo '<i class="fa-regular fa-star " style="color: #a1c4fd"></i>'; 
                              }
                           }
                          ?>
                           </div>
                           <a href="<?= ROOT_URL ?>recipe-post.php?id=<?=$recipe['id'] ?>" class="view-recipe">View Recipe</a>
                        </div>
       <?php } ?>
        </section>
        <?php else : ?>
            <div class="empty-category">
                    <p> No Recipe Found</p>
            </div>



        <?php endif ?>


              
       </main>
     <!-- categories sections ends -->
     <?php
         include 'partials/footer.php'
         ?>
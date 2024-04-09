<?php
include 'partials/header.php' ;

$query = "SELECT * FROM categories LIMIT 6";
$categories = mysqli_query($connection,$query);

$recipes_query = "SELECT * FROM recipes ORDER BY average_rating DESC LIMIT 6";
$recipes_result = mysqli_query($connection, $recipes_query)

?>
     <!--Header -->
     <header class="container header__container flex-row space-between">
         <section class="header__left">
             <h1>Your favourite <span> Recipes</span> in one place</h1>
             <p class="cont__text">Whether you’re a seasoned chef or a kitchen novice, having all your cherished recipes neatly organized is a true delight. Imagine flipping through the pages of your recipe book, each dish evoking memories and flavors. We have collections of mouthwatering recipes to tantalize your taste buds.</p>
                <a href="<?= ROOT_URL?>sign-up.php" class="header__login-btn div-center">Sign up</a>
             <p class="cont__text">Do you have an account? <a href="<?= ROOT_URL?>sign-in.php">Log in</a></p>

         </section>
         <section class="header__right flex-row div-center">
            <div>
               <img src="assets/headerimg.jpg" alt="header-img">
            </div>
       </section>

     </header>
     <!-- Header Ends -->
     <!-- categories section -->
     <section class="container categories__container cont__section">
         <h2>Popular Categories</h2>
         <section class="flex-row space-between cat-items ">
         <?php while($category = mysqli_fetch_assoc($categories)) : ?>
            <div class="flex-column div-center cat-item">
                <a href="<?= ROOT_URL ?>category-post.php?id=<?=$category['id'] ?>">
                      <div>
                          <img src="<?= ROOT_URL . 'assets/' . $category['cat_img']?>" alt="cat-img">
                      </div>
               </a>
                <span><?=$category['cat_name'] ?></span>
            </div>
            <?php endwhile ?>
         </section>
     </section>
         <!-- categories section  Ends-->
         <!-- Trending categories -->
         <section class="container cont__section trending__container">
            <h2>Trending Recipes</h2>
            <p class="cont__text">Mouth savouring recipes that changed the game in the kitchen!</p>
            <section class="trending__recipes space-between">
            <?php while ($recipe = mysqli_fetch_assoc($recipes_result)) {
                            $author_id = $recipe['author_id'];
                            $author_query = "SELECT username FROM user WHERE id = $author_id ";
                            $author_result = mysqli_query($connection, $author_query);
                            $author = mysqli_fetch_assoc($author_result);


                            $recipe_id = $recipe['id'];
                            $ratings_query = "SELECT SUM(rating) as total_rating, COUNT(*) as num_ratings FROM ratings WHERE recipe_id = $recipe_id";
                            $ratings_result = mysqli_query($connection, $ratings_query);
                            
                            if ($row = mysqli_fetch_assoc($ratings_result)) {
                                if ($row["num_ratings"] > 0) {
                                    $average_rating = ceil($row["total_rating"] / $row["num_ratings"]);
                                } else {
                                    $average_rating = 0; 
                                }
                            } else {
                                $average_rating = 0; 
                            }
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
                          for ($i = 1; $i <= 5; $i++) {
                              if ($i <= $average_rating) {
                                  echo '<i class="fa-solid fa-star" style="color: #a1c4fd"></i>'; // Filled star
                              } else {
                                  echo '<i class="fa-regular fa-star " style="color: #a1c4fd"></i>'; // Unfilled star
                              }
                           }
                          ?>
                           </div>
                           <a href="<?= ROOT_URL ?>recipe-post.php?id=<?=$recipe['id'] ?>" class="view-recipe">View Recipe</a>
                        </div>
                      <?php }?>
            </section>
            <div class="view-more-recipe-btn flex-row div-center"><a href="recipe.php">View More Recipes</a></div>
         </section>
         <!-- Trending categories Ends-->
         <!-- Chef CTA Section -->
         <section class="container chef__container cont__section flex-row div-center">
             <div class="flex-column chef__container-right">
                <h2>Everyone can be a <br/> chef in their own kitchen</h2>
                <p class="cont__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum dolore sint consequuntur necessitatibus nemo excepturi placeat quas eaque</p>
                <a href="sign-up.php" class="header__login-btn div-center flex-row">Sign up</a>
            </div>
            <div>
                <img src="assets/chefimg.svg" alt="chefimg">
            </div>
         </section>
        <!-- Chef CTA Section Ends-->
<?php
include 'partials/footer.php';
?>

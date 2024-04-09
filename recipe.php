       <?php
         include 'partials/header.php';
         $query = "SELECT * FROM categories ";
         $categories = mysqli_query($connection,$query);
         ?>
         <style>
          <?php include 'css/recipe.css'; ?>
          </style>

     <!-- search and filter section -->
     <section class="container">
            <section class="search__container-top flex-row space-between">
                <!-- searchbar -->
                <form class="search-container" action="<?= ROOT_URL ?>search.php" method="GET">
                      <input type="text" name="search" id="searchInput" placeholder="Search Recipes...">
                      <button id="searchButton" type="submit" name="submit"><i class="fas fa-search"></i></button>
                </form>   
                <!-- filters Activator  -->
                <div class="view-filters cursor-pointer flex-row div-center">
                  <i class="fa-solid fa-arrow-up-short-wide"></i> 
                  <span>Filters</span>
                </div>
               </section>
               <section class="search__container-bottom flex-row space-between">
                <div class="custom-dropdown">
                    <button class="custom-dropdown-toggle cursor-pointer flex-row space-between">Select a Category <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="custom-dropdown-content" id="custom-dropdownContent1">
                    <?php while($category = mysqli_fetch_assoc($categories)) : ?>
            
                            <a href="<?= ROOT_URL ?>/category-post.php?id=<?=$category['id'] ?>"  class="dropdown-item"><?= $category['cat_name']?></a>
                  
                      <?php endwhile ?>
                    </div>
                  </div>
                  
               </section>
     </section>
       <main class="container recipe-categories-display">
       <?php 
         mysqli_data_seek($categories, 0);
       while($category = mysqli_fetch_assoc($categories)) : ?>
             <section class="recipe-category-display">
             <div class="flex-row cat-item">
             <div>
               <img src="<?= ROOT_URL . 'assets/' . $category['cat_img']?>" alt="cat-img">
             </div>
             <span><?= $category['cat_name']?></span>
            </div>
        
                <section class="recipe-details-section category__recipes ">
                      <?php 
                          $category_id = $category['id'];
                          $recipes_query = "SELECT * FROM recipes WHERE category_id = $category_id ";
                          $recipes_results = mysqli_query($connection, $recipes_query);
                          
                          if(mysqli_num_rows($recipes_results) < 1) { ?>

                           <div class="empty-category">
                             <p> No Recipe has been added to this category yet! Recipes coming soon</p>
                           </div>

                           <?php } else{ while ($recipe = mysqli_fetch_assoc($recipes_results)) {
                            $author_id = $recipe['author_id'];
                            $author_query = "SELECT username FROM user WHERE id = $author_id ";
                            $author_result = mysqli_query($connection, $author_query);
                            $author = mysqli_fetch_assoc($author_result);

                            //to get average rating

                            $recipe_id = $recipe['id'];
                            $ratings_query = "SELECT SUM(rating) as total_rating, COUNT(*) as num_ratings FROM ratings WHERE recipe_id = $recipe_id";
                            $ratings_result = mysqli_query($connection, $ratings_query);
                            
                            if ($row = mysqli_fetch_assoc($ratings_result)) {
                                // Check if num_ratings is not zero before performing division
                                if ($row["num_ratings"] > 0) {
                                    $average_rating = ceil($row["total_rating"] / $row["num_ratings"]);
                                } else {
                                    $average_rating = 0; // Set average rating to 0 if there are no ratings
                                }
                            } else {
                                $average_rating = 0; // Set average rating to 0 if query fails or no ratings found
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
                      <?php } }?>
                </section>


            <div class="view-more-recipe-btn flex-row div-center"><a href="<?= ROOT_URL ?>/category-post.php?id=<?=$category['id'] ?>">View More Recipes</a></div>

        </section>
       <?php endwhile ?>


              
       </main>
     <!-- categories sections ends -->
     <?php
         include 'partials/footer.php'
         ?>

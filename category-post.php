<?php
         include 'partials/header.php';

         if(isset($_GET['id'])){
          $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
          $query = "SELECT * FROM categories WHERE id=$id";
          $result = mysqli_query($connection, $query);
          if(mysqli_num_rows($result) == 1){
            $category = mysqli_fetch_assoc($result);
          }
        } 
        else{
          header('location: '. ROOT_URL . 'recipe.php');
          die();
        }
?>
<style>
 <?php include 'css/recipe.css'; ?>
 </style>
      <section class='category__image-header'>
         <img src="<?= ROOT_URL . 'assets/' . $category['cat_img']?>" alt="cat_img">
      </section>
      <section class="container category__post-container">
               <header>
                   <h2><?=$category['cat_name']?></h2>
                  <p><?=$category['cat_desc'] ?></p>
              </header>
            <section class="search__container-top flex-row space-between">
                <!-- searchbar -->
                <div class="search-container">
                 <input type="text" id="searchInput" placeholder="Search Recipes...">
                 <button id="searchButton"><i class="fas fa-search"></i></button>
                 <div id="searchDropdown" class="dropdown-content">
                   <!-- Dropdown content will be populated dynamically -->
                 </div>
                 </div>   
               </section>
              <main class="recipe-categories-display recipe-details-section category__recipes">
                      <?php 
                          $category_id = $category['id'];
                          $recipes_query = "SELECT * FROM recipes WHERE category_id = $category_id ";
                          $recipes_results = mysqli_query($connection, $recipes_query);
                          if(mysqli_num_rows($recipes_results) < 1) { ?>
                            <div class="empty-category">
                             <p> No Recipe has been added to this category yet! Recipes coming soon</p>
                           </div>
                           <?php } else{
                          while ($recipe = mysqli_fetch_assoc($recipes_results)) {
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
                           <a href="<?= ROOT_URL ?>recipe-post.php?id=<?=$recipe['id'] ?>" class="view-recipe">View Recipe</a>
                        </div>
       
                      <?php }} ?>

        </section>              
       </main>
     </section>
<?php
  include 'partials/footer.php';
  ?>
       <?php
         include 'partials/header.php';
         if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $query = "SELECT recipes.*, user.username, user.avatar, categories.cat_name FROM recipes INNER JOIN user ON recipes.author_id = user.id INNER JOIN categories ON recipes.category_id = categories.id WHERE recipes.id = $id";
            
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) == 1) {
                $recipe = mysqli_fetch_assoc($result);
                $recipe_id = $recipe['id'];
                $ingrdients_query = "SELECT * FROM ingredients WHERE recipe_id = $recipe_id";
                $ingrdients_query_result = mysqli_query($connection, $ingrdients_query);
                $directions_query = "SELECT * FROM directions WHERE recipe_id = $recipe_id";
                $directions_query_result = mysqli_query($connection, $directions_query);

                //ratings
                // $ratings_query = "SELECT SUM(rating) as total_rating, COUNT(*) as num_ratings FROM ratings WHERE recipe_id = $recipe_id";
                // $ratings_result = mysqli_query($connection, $ratings_query);
                
                // if ($row = mysqli_fetch_assoc($ratings_result)) {
                //     $average_rating = ceil($row["total_rating"] / $row["num_ratings"]);

                // } else {
                //     $average_rating = 0;
                // } 
        
                $recipe_avg_rating = $recipe['average_rating'];
                $star_ratings = ceil($recipe_avg_rating);
      
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
    <main class="container cont-section recipe__post-container">
        <h2><?=$recipe['title'] ?> </h2>
        <header class="flex-row space-between">
            <section class="details-container flex-row">
                <div class="flex-row ">
                    <div class="avatar">
                        <img src="<?= ROOT_URL . 'assets/' . $recipe['avatar']?>" alt="avatar" draggable="false" class="rounded">
                    </div>
                    <div class="flex-column">
                        <span class="det-title profile-name"><?=$recipe['username'] ?></span>
                        <span class="cont__text"><?= date("M d, Y", strtotime($recipe['time_date'])) ?></span>
                    </div>
                </div>
                <div class="line-divider"></div>
                <div class="flex-row ">
                    <div class="flex-row div-center det-img">
                        <img src="assets/Timer.svg" alt="timer">
                    </div>
                    <div class="flex-column">
                        <span class="det-title prep-time">Prep Time</span>
                        <span class="cont__text"><?=$recipe['prep_time'] ?> mins</span>
                    </div>
                </div>
                <div class="line-divider"></div>
                <div class="flex-row ">
                    <div class="flex-row div-center det-img">
                        <img src="assets/Timer.svg" alt="timer">
                    </div>
                    <div class="flex-column">
                        <span class="det-title prep-time">Cook Time</span>
                        <span class="cont__text"><?=$recipe['cook_time'] ?> mins</span>
                    </div>
                </div>
                <div class="line-divider"></div>
                <div class="flex-row div-center">
                    <div class="flex-row det-img">
                        <img src="assets/ForkKnife.svg" alt="timer">
                    </div>
                    <div class="flex-column">
                        <span class="det-title ">Category</span>
                        <span class="cont__text recipe-category"><?=$recipe['cat_name'] ?></span>
                    </div>
                </div>
            </section>
            <section class="print-share flex-row">
                <div class="print-share-div print-div" >
                    <div class="flex-row div-center ">
                        <img src="assets/printer.svg" alt="printer">
                    </div>
                    <span>Print</span>
                </div>
                <div class="print-share-div share-div" >
                    <div class="flex-row div-center">
                        <img src="assets/share.svg" alt="share">
                     </div>
                    <span>Share</span>
                </div>

            </section>
        </header>
        <section>
            <p class="recipe-description"><?=$recipe['recipe_desc'] ?></p>     
            <div class="recipe-image">
                 <img src="<?= ROOT_URL . 'assets/' . $recipe['thumbnail']?>" alt="recipe_thumbnail">
            </div>
            <div class="recipe-rating flex-row">
            <?php
                  // Loop to generate stars
                  for ($i = 1; $i <= 5; $i++) {
                      if ($i <= $star_ratings) {
                          echo '<i class="fa-solid fa-star"></i>'; // Filled star
                      } else {
                          echo '<i class="fa-regular fa-star"></i>'; // Unfilled star
                      }
                  }
             ?>

            </div>
            <section class="ingredients">
                <h3>Ingredients</h3>
                <ul class="ingredients-list">
                <?php while($ingredient = mysqli_fetch_assoc($ingrdients_query_result)) : ?>
                    <li><?=$ingredient['ingredient'] ?></li>
                <?php endwhile ?>
                </ul>
            </section>
            <section class="recipe-directions">
                <h3>Directions</h3>
                <ul >
                <?php $step_counter = 1 ?>
                <?php while($direction = mysqli_fetch_assoc($directions_query_result)) : ?>
                    <li class="recipe-step flex-column">
                     <h4 class=""> <span>Step <?= $step_counter++ ?>:</span> <?=$direction['direction_title']?></h4>
                     <p class="cont__text"><?=$direction['direction_desc']?></p>
                </li>
                <?php endwhile ?>
             </ul>
            </section>
            <button class="view-more-recipe-btn rate-recipe-btn flex-row div-center">Rate this Recipe!</button>
            <form class="rating-container " action="<?=ROOT_URL ?>rating-logic.php" method="POST">
            <input type="hidden" name="recipe_id" value="<?= $recipe_id ?>">

             <section class="flex-row">
                 <div >
                      <input id="checkmark1" type="checkbox" class="input-checkbox"  name="star1" checked>
                     <label for="checkmark1" class="label-checkbox"><i class="fa-solid fa-star"></i></label>
                </div>
                <div>
                    <input id="checkmark2" type="checkbox" class="input-checkbox" name="star2">
                    <label for="checkmark2" class="label-checkbox"><i class="fa-solid fa-star"></i></label>
                </div>
              <div >
                  <input id="checkmark3" type="checkbox" class="input-checkbox" name="star3">
                  <label for="checkmark3" class="label-checkbox"><i class="fa-solid fa-star"></i></label>
             </div>
             <div >
                <input id="checkmark4" type="checkbox" class="input-checkbox" name="star4">
                <label for="checkmark4" class="label-checkbox"><i class="fa-solid fa-star"></i></label>
            </div>
            <div >
                <input id="checkmark5" type="checkbox" class="input-checkbox" name="star5">
                <label for="checkmark5" class="label-checkbox"><i class="fa-solid fa-star"></i></label>
            </div>
                 </section>
          <button class="view-more-recipe-btn rate-btn flex-row div-center" type="submit" name="submit">Rate</button>
     </form>
     <?php if(isset($_SESSION['rating-success'])) : ?>
            <p style="font-size: 14px; font-weight:600 ; color: #a1c4fd;">
                <?=  $_SESSION['rating-success'];
                unset($_SESSION['rating-success']);
                ?>
            </p>

    <?php elseif(isset($_SESSION['rating-error'])) : ?>
            <p style="font-size: 14px; font-weight:600 ; color: #da0f3f;">
                <?=  $_SESSION['rating-error'];
                unset($_SESSION['rating-error']);
                ?>
            </p>
        <?php endif ?>
        </section>
    </main>
    <?php
         include 'partials/footer.php';
    ?>
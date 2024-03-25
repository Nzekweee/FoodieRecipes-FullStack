        <?php
         include './partials/header.php' ;
         if(isset($_GET['id'])){
          $cat_query = "SELECT * FROM categories";
          $categories = mysqli_query($connection,$cat_query);

          $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
          $query = "SELECT * FROM recipes WHERE id=$id ";
          $result = mysqli_query($connection, $query);
          if(mysqli_num_rows($result) == 1){
            $recipe = mysqli_fetch_assoc($result);
            $recipe_id = $recipe['id'];
            $ingrdients_query = "SELECT * FROM ingredients WHERE recipe_id = $recipe_id";
            $ingrdients_query_result = mysqli_query($connection,$ingrdients_query);
            $directions_query = "SELECT * FROM directions WHERE recipe_id = $recipe_id";
            $directions_query_result = mysqli_query($connection,$directions_query);
          }
        }

        else{
          header('location: '. ROOT_URL . 'dashboard/manage-recipes.php');
          die();
        }
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Edit Recipe</h4>
                      <form action="<?=ROOT_URL ?>dashboard/edit-recipe-logic.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="recipe_id" value="<?= $recipe['id']?>">
                      <input type="hidden" name="old_thumbnail" value="<?= $recipe['thumbnail']?>">
                        <div class="form-group flex-column">
                           <label for="">Change Recipe Title</label>
                            <input type="text" id="recipeTitle" name="title" placeholder="Your recipe's title" value="<?=$recipe['title']?>" required>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">Recipe Img</label>
                            <input type="image" id="recipe-img" alt="Image" src="<?= ROOT_URL . 'assets/' . $recipe['thumbnail']?>" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div">
                            <label for="user-profile">Change Photo</label>
                            <input type="file" accept='image/*' id="upload-picture" name="thumbnail" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="">Change Description</label>
                             <input type="text" id="recipeDesc" name="recipe_desc" placeholder="Update description" value="<?=$recipe['recipe_desc']?>" required>
                           </div>
                           <div class="form-group flex-column  ingredient__cont">
                            <label for="">Change Ingredients</label>
                            <?php while($ingredient = mysqli_fetch_assoc($ingrdients_query_result)) : ?>
                              <div class="recipe-ing-group flex-row">
                                <input type="text" name="ingredients[]" value="<?=$ingredient['ingredient'] ?>" placeholder="Update Ingredient" required>
                                <i class="fa-solid fa-trash remove-ing "></i>
                             </div>
                            <?php endwhile ?>
                             <section class="add-ing">
                                <i class="fa-solid fa-plus"></i>
                                 <span>Add</span>
                             </section>
                           </div>
                           <div class="form-group flex-column directions">
                            <label for="">Change Directions</label>
                            <div class="directions-cont">
                            <?php $step_counter = 1 ?>
                            <?php while($direction = mysqli_fetch_assoc($directions_query_result)) : ?>
                              <article>
                                    <div class="direction-title-cont flex-row">
                                     <span>Step <span class="step_counter"><?= $step_counter++ ?></span></span>
                                     <input type="text" 
                                     name="directions[<?= $step_counter ?>][title]" placeholder="What's step 1" value="<?=$direction['direction_title']?>" required>
                                    </div>
                                    <textarea name="directions[<?= $step_counter ?>][description]" cols="30" rows="10" placeholder="Describe the step"><?=$direction['direction_desc']?></textarea>
                              </article>
                            <?php endwhile ?>
                            </div>
                          <section class="flex-row space-between">
                              <div class="add-dir" >
                                <i class="fa-solid fa-plus"></i>
                                <span>Add</span>
                              </div>
                              <div class="remove-dir">
                                <i class="fa-solid fa-trash"></i>
                                <span>Remove</span>
                              </div>
                         </section>
                           </div>
                           <div class="form-group flex-column">
                            <label for="">Change Prep Time in mins</label>
                             <input type="number" id="prepTime" name="prep_time" value="<?=$recipe['prep_time']?>" required>
                           </div>
                           <div class="form-group flex-column">
                            <label for="">Change Cook Time in mins</label>
                             <input type="number" id="cookTime" name="cook_time" value="<?=$recipe['cook_time']?>" required>
                           </div>
                           <select name="category" >
                            <option value="26" class="select-title">Change Category</option>
                            <?php while ($category = mysqli_fetch_assoc($categories)) :?>
                              <option value="<?=$category["id"]?>"><?=$category["cat_name"] ?></option>
                            <?php endwhile ?>
                           </select>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" name="submit" type="submit">Update Recipe</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
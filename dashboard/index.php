         <?php
         include './partials/header.php' ;

         //fetch categories from database
         $query = "SELECT * FROM categories";
         $categories = mysqli_query($connection,$query);

         ?>
                  <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Create A New Recipe</h4>
                        <?php if (isset($_SESSION['add-recipe'])) : ?>
                        <div class="alert__message error">
                          <p style="font-size: 14px; font-weight:600 ;">
                            <?=  $_SESSION['add-recipe'];
                            unset($_SESSION['add-recipe']);
                            ?>
                          </p>
                        </div>
                        <?php endif ?>
                      <form action="<?=ROOT_URL ?>dashboard/add-recipe-logic.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group flex-column">
                           <label for="">Recipe Title</label>
                            <input type="text" id="recipeTitle" name="title" placeholder="Your recipe's title" required>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">Recipe Img</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div">
                            <label for="user-profile">Add a Photo</label>
                            <input type="file" accept='image/*' id="upload-picture" name="thumbnail" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="">Description</label>
                             <input type="text" id="recipeDesc" name="recipe_desc" placeholder="Introduce your recipe" required>
                           </div>
                           <div class="form-group flex-column ingredient__cont">
                            <label for="">Ingredients</label>
                             <div class="recipe-ing-group flex-row">
                                <input type="text" name="ingredients[]" placeholder="Add Ingredient" required>
                                <i class="fa-solid fa-trash remove-ing"></i>
                             </div>
                             <section class="add-ing">
                                <i class="fa-solid fa-plus"></i>
                                 <span>Add</span>
                             </section>
                           </div>
                           <div class="form-group flex-column directions">
                            <label for="">Directions</label>
                            <div class="directions-cont">
                                <article>
                                    <div class="direction-title-cont flex-row">
                                     <span>Step 1</span>
                                     <input type="text" 
                                     name="directions[1][title]" placeholder="What's step 1" required>
                                    </div>
                                    <textarea  id="" cols="30" rows="10" placeholder="Describe the step" name="directions[1][description]" ></textarea>
                              </article>
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
                            <label for="">Prep Time in mins</label>
                             <input type="number" id="prepTime" name="prep_time" required>
                           </div>
                           <div class="form-group flex-column">
                            <label for="">Cook Time in mins</label>
                             <input type="number" id="cookTime" name="cook_time" required>
                           </div>
                           <select name="category">
                            <option value="26" class="select-title">Choose a Category</option>
                            <?php while ($category = mysqli_fetch_assoc($categories)) :?>
                              <option value="<?=$category["id"]?>"><?=$category["cat_name"] ?></option>
                            <?php endwhile ?>
                           </select>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" type="submit" name="submit">Create Recipe</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
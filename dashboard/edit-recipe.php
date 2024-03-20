        <?php
         include './partials/header.php' ;
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Edit Recipe</h4>
                      <form action="">
                        <div class="form-group flex-column">
                           <label for="">Change Recipe Title</label>
                            <input type="text" id="recipeTitle" name="recipeTitle" placeholder="Your recipe's title" required>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">Recipe Img</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div">
                            <label for="user-profile">Change Photo</label>
                            <input type="file" accept='image/*' id="user-avatar" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="">Change Description</label>
                             <input type="text" id="recipeDesc" name="recipeDesc" placeholder="Introduce your recipe" required>
                           </div>
                           <div class="form-group flex-column">
                            <label for="">Change Ingredients</label>
                             <div class="recipe-ing-group flex-row">
                                <input type="text" class="recipeIngredients" name="recipeIngredients" placeholder="Add Ingredient" required>
                                <i class="fa-solid fa-trash remove-ing"></i>
                             </div>
                             <section class="add-ing">
                                <i class="fa-solid fa-plus"></i>
                                 <span>Add</span>
                             </section>
                           </div>
                           <div class="form-group flex-column directions">
                            <label for="">Change Directions</label>
                            <div class="directions-cont">
                                <article>
                                    <div class="direction-title-cont flex-row">
                                     <span>Step 1</span>
                                     <input type="text" 
                                     class="direction-tile" name="direction-tile" placeholder="What's step 1" required>
                                    </div>
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Describe the step"></textarea>
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
                            <label for="">Change Prep Time in mins</label>
                             <input type="number" id="prepTime" name="prepTime" required>
                           </div>
                           <div class="form-group flex-column">
                            <label for="">Change Cook Time in mins</label>
                             <input type="number" id="cookTime" name="cookTime" required>
                           </div>
                           <select name="" id="">
                            <option value="0" class="select-title">Change Category</option>
                             <option value="1">Pasta</option>
                             <option value="2">Pizza</option>
                             <option value="1">Vegan</option>
                             <option value="1">Desserts</option>
                             <option value="1">Smoothies</option>
                             <option value="1">Breakfast</option>
                           </select>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe">Update Recipe</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
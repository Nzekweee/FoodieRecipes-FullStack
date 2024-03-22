         <?php
         include './partials/header.php' ;

          //get form dats back if redirect
          $cat_name = $_SESSION['add-category-data']['cat_name'] ?? null;
          $cat_desc = $_SESSION['add-category-data']['cat_desc'] ?? null;
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Add Category</h4>
                        <?php if (isset($_SESSION['add-category'])) : ?>
                            <div class="alert__message error">
                              <p style="font-size: 14px; font-weight:600 ;">
                                <?=  $_SESSION['add-category'];
                                unset($_SESSION['add-category']);
                                ?>
                              </p>
                            </div>
                            <?php endif ?>
                      <form action="<?=ROOT_URL ?>dashboard/add-category-logic.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group flex-column">
                           <label for="cat-name">Category Name</label>
                           <input type="text" id="cat-name" name="cat_name" value="<?= $cat_name?>" placeholder="Name of Category" >
                          </div>
                          <div class="form-group flex-column">
                            <label for="cat_desc">Description</label>
                            <textarea id="cat_desc" cols="30" rows="10" placeholder="Describe Category" name='cat_desc' value="<?= $cat_desc?>"></textarea>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">Category Image</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div" style="margin-bottom:30px ;">
                            <label for="cat-img">Add Category Image</label>
                            <input type="file" accept='image/*' id="user-avatar" required name="cat_img">
                          </div>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" type="submit" name="submit">Create Category</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
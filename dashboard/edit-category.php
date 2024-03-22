        <?php
         include './partials/header.php' ;

         if(isset($_GET['id'])){
          $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
          $query = "SELECT * FROM categories WHERE id=$id";
          $result = mysqli_query($connection, $query);
          if(mysqli_num_rows($result) == 1){
            $category = mysqli_fetch_assoc($result);
          }
        } 
        else{
          header('location: '. ROOT_URL . 'dashboard/manage-user.php');
          die();
        }
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Edit Category</h4>
                      <form action="<?=ROOT_URL ?>dashboard/edit-category-logic.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $category['id']?>">
                        <div class="form-group flex-column">
                           <label for="cat-name">Edit Category Name</label>
                           <input type="text" id="cat-name" name="cat_name" value="<?= $category['cat_name'] ?>" placeholder="Name of Category" required >
                          </div>
                          <div class="form-group flex-column">
                            <label for="cat_desc">Edit Description</label>
                            <textarea name='cat_desc' id="cat_desc"  cols="30" rows="10" placeholder="Describe Category"><?= $category['cat_desc'] ?></textarea>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">Category Image</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div" style="margin-bottom:30px ;">
                            <label for="cat-img">Change Category Image</label>
                            <input type="file" accept='image/*' id="upload-picture" name="cat_img" required>
                          </div>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" type="submit" name="submit">Update Category</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
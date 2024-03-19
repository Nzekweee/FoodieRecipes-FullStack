         <?php
         include './partials/header.php' ;
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Add Category</h4>
                      <form action="">
                        <div class="form-group flex-column">
                           <label for="cat-name">Category Name</label>
                           <input type="text" id="cat-name" name="cat-name" placeholder="Name of Category" required >
                          </div>
                          <div class="form-group flex-column">
                            <label for="email">Description</label>
                            <textarea name="" id="" cols="30" rows="10" placeholder="Describe Category"></textarea>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">Category Image</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div" style="margin-bottom:30px ;">
                            <label for="cat-img">Add Category Image</label>
                            <input type="file" accept='image/*' id="user-avatar" required>
                          </div>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe">Create Category</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
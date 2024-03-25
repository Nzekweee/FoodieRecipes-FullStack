        <?php
           include './partials/header.php' ;

                 //  fetch all categories 
                 $current_user_id = $_SESSION['user-id'];
                 $query = "SELECT recipes.id, recipes.title, categories.cat_name AS cat_name
                 FROM recipes JOIN categories ON recipes.category_id = categories.id WHERE recipes.author_id = $current_user_id ORDER BY recipes.id DESC";
                 $recipes = mysqli_query($connection, $query);
                 $admin_query = "SELECT recipes.id, recipes.title, categories.cat_name AS cat_name FROM recipes JOIN categories ON recipes.category_id = categories.id ORDER BY recipes.id DESC";
                 $all_recipes = mysqli_query($connection, $admin_query);
             ?>
        <?php
        include './partials/sidenav.php' ;
        ?>
                        <h4>Manage Recipes</h4>
                        <?php if(isset($_SESSION['add-recipe-success'])) : ?>
                        <div class="alert__message success">
                        <p style="font-size: 14px; font-weight:600 ;">
                        <?=  $_SESSION['add-recipe-success'];
                        unset($_SESSION['add-recipe-success']);
                        ?>
                        </p>
                        </div>
                        <?php elseif(isset($_SESSION['edit-recipe-success'])) : ?>
                       <div class="alert__message success">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['edit-recipe-success'];
                       unset($_SESSION['edit-recipe-success']);
                       ?>
                       </p>
                      </div>
                       <?php elseif(isset($_SESSION['edit-recipe'])) : ?>
                       <div class="alert__message error">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['edit-recipe'];
                       unset($_SESSION['edit-recipe']);
                       ?>
                       </p>
                       </div>
                       <?php elseif(isset($_SESSION['delete-recipe-success'])) : ?>
                       <div class="alert__message success">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['delete-recipe-success'];
                       unset($_SESSION['delete-recipe-success']);
                       ?>
                       </p>
                      </div>
                       <?php elseif(isset($_SESSION['delete-recipe'])) : ?>
                       <div class="alert__message error">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['delete-recipe'];
                       unset($_SESSION['delete-recipe']);
                       ?>
                       </p>
                      </div>
                        <?php endif ?>
                        <?php if(mysqli_num_rows($recipes)>0 || mysqli_num_rows($all_recipes)>0 ) : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th >Title</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($_SESSION['user_is_admin'])) : ?>
                                <?php while($all_recipe = mysqli_fetch_assoc($all_recipes)) : ?>
                                <tr>
                                    <td><?= $all_recipe['title'] ?></td>
                                    <td><?= $all_recipe['cat_name'] ?></td>
                                    <td><a href="<?= ROOT_URL ?>dashboard/edit-recipe.php?id=<?=$all_recipe['id'] ?>" class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="<?= ROOT_URL?>dashboard/delete-recipe.php?id=<?=$all_recipe['id']?> " class="header__login-btn div-center del-btn">Delete</a></td>
                                </tr>
                            <?php endwhile ?>
                            <?php else : ?>
                                <?php while($recipe = mysqli_fetch_assoc($recipes)) : ?>
                                <tr>
                                    <td><?= $recipe['title'] ?></td>
                                    <td><?= $recipe['cat_name'] ?></td>
                                    <td><a href="<?= ROOT_URL ?>dashboard/edit-recipe.php?id=<?=$recipe['id'] ?>" class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="<?= ROOT_URL?>dashboard/delete-recipe.php?id=<?=$recipe['id']?> " class="header__login-btn div-center del-btn">Delete</a></td>
                                </tr>
                            <?php endwhile ?>
                            <?php endif ?>

                            </tbody>
                        </table>
                        <?php else : ?>
                            <div class="alert__message error">
                          <p style="font-size: 14px; font-weight:600 ;"> No Recipes Added</p>
                       </div>
                        <?php endif ?>

                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
        <?php
         include './partials/header.php' ;

            //  fetch all categories 
             $current_admin_id = $_SESSION['user-id'];
             $query = "SELECT * FROM categories ";
             $categories = mysqli_query($connection, $query);
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Manage Category</h4>
                        <?php if(isset($_SESSION['add-recipe-success'])) : ?>
                        <div class="alert__message success">
                        <p style="font-size: 14px; font-weight:600 ;">
                        <?=  $_SESSION['add-recipe-success'];
                        unset($_SESSION['add-recipe-success']);
                        ?>
                        </p>
                       </div>
                       <?php elseif(isset($_SESSION['edit-category-success'])) : ?>
                       <div class="alert__message success">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['edit-category-success'];
                       unset($_SESSION['edit-category-success']);
                       ?>
                       </p>
                      </div>
                       <?php elseif(isset($_SESSION['edit-category'])) : ?>
                       <div class="alert__message error">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['edit-category'];
                       unset($_SESSION['edit-category']);
                       ?>
                       </p>
                       </div>
                       <?php elseif(isset($_SESSION['delete-category-success'])) : ?>
                       <div class="alert__message success">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['delete-category-success'];
                       unset($_SESSION['delete-category-success']);
                       ?>
                       </p>
                      </div>
                       <?php elseif(isset($_SESSION['delete-category'])) : ?>
                       <div class="alert__message error">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['delete-category'];
                       unset($_SESSION['delete-category']);
                       ?>
                       </p>
                      </div>

                       <?php endif ?>
                       <?php if(mysqli_num_rows($categories)>0) : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Category name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $uncategorized = null;
                                while($category = mysqli_fetch_assoc($categories)) {
                                    if($category['cat_name'] == 'Uncategorized') {
                                        $uncategorized = $category;
                                    } else {
                            ?>
                             <tr>
                                 <td><?= $category['cat_name'] ?></td>
                                 <td><a href="<?= ROOT_URL ?>dashboard/edit-category.php?id=<?=$category['id'] ?>" class="edit-btn header__login-btn div-center">Edit</a></td>
                                 <td><a href="<?= ROOT_URL?>dashboard/delete-category.php?id=<?=$category['id']?>" class="header__login-btn div-center del-btn">Delete</a></td>
                             </tr>
                            <?php
                                    }
                                }
                                if($uncategorized) {
                             ?>
                                  <tr>
                                      <td><?= $uncategorized['cat_name'] ?></td>
                                      <td>Cannot Edit</td>
                                      <td>Cannot Delete</td>
                                  </tr>
                                 <?php
                                     }
                                 ?>
                            </tbody>
                        </table>
                        <?php else : ?>
                            <div class="alert__message error">
                          <p style="font-size: 14px; font-weight:600 ;"> No Category Added Yet</p>
                       </div>
                       <?php endif ?>

                </section>
         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
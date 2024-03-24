        <?php
           include './partials/header.php' ;
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
                        </div>
                        <?php endif ?>
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
                                <tr>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td>Vegan</td>
                                    <td><a href="./edit-recipe.php" class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="delete-recipe.php " class="header__login-btn div-center del-btn">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td>Breakfast</td>
                                    <td><a href="./edit-recipe.php" class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="./delete-recipe.php " class="header__login-btn div-center del-btn">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td>Pasta</td>
                                    <td><a href="./edit-recipe.php" class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="delete-recipe.php " class="header__login-btn div-center del-btn">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                    <td>Pizza</td>
                                    <td><a href="./edit-recipe.php" class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="./delete-recipe.php " class="header__login-btn div-center del-btn">Delete</a></td>
                                </tr>

                            </tbody>
                        </table>

                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
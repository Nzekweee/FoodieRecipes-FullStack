              <?php
              include './partials/header.php' ;
              ?>
            <?php
            include './partials/sidenav.php' ;
            ?>
                        <h4>Edit user</h4>
                      <form action="<?=ROOT_URL ?>dashboard/edit-user-logic.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group flex-column">
                           <label for="fullname">Change User's Full Name</label>
                           <input type="text" id="fullname" name="fullname" placeholder="Full Name" required autocomplete="given-name">
                          </div>
                          <div class="form-group flex-column">
                            <label for="username">Change username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="email">Change email</label>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">User's Avatar</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div">
                            <label for="user-profile">change profile picture</label>
                            <input type="file" accept='image/*' id="user-avatar" name="avatar" required>
                          </div>
                           <select name="user-role" id="user-role">
                            <option value="0" class="select-title">Change user role</option>
                             <option value="1">Chef</option>
                             <option value="2">Admin</option>
                           </select>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" type="submit" name="submit">Update User</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
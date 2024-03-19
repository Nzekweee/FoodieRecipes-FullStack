        <?php
         include './partials/header.php' ;
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Add user</h4>
                      <form action="">
                        <div class="form-group flex-column">
                           <label for="fullname">User's Full Name</label>
                           <input type="text" id="fullname" name="fullname" placeholder="Full Name" required autocomplete="given-name">
                          </div>
                          <div class="form-group flex-column">
                            <label for="username">User's username</label>
                            <input type="text" id="username" name="username" placeholder="Username" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="email">User's email</label>
                            <input type="email" id="email" name="email" placeholder="Email" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="signup-password">User's password</label>
                            <input type="password" id="signup-password" name="password" placeholder="Password" required class="password">
                          </div>
                        <div class="form-group flex-column">
                            <label for="">User's Avatar</label>
                            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div">
                            <label for="user-profile">Add user profile picture</label>
                            <input type="file" accept='image/*' id="user-avatar" required>
                          </div>
                           <select name="user-role" id="user-role">
                            <option value="0" class="select-title">Choose a user role</option>
                             <option value="1">Author</option>
                             <option value="2">Admin</option>
                           </select>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe">Create User</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
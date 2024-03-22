        <?php
         include './partials/header.php' ;

         //get form dats back if redirect
         $fullname = $_SESSION['add-user-data']['fullname'] ?? null;
         $username = $_SESSION['add-user-data']['username'] ?? null;
         $email = $_SESSION['add-user-data']['email'] ?? null;
         $createPassword = $_SESSION['add-user-data']['createPassword'] ?? null;
         $confirmPassword = $_SESSION['add-user-data']['confirmPassword'] ?? null;

         unset($_SESSION['add-user-data']);
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
      <h4>Add user</h4>
      <?php if (isset($_SESSION['add-user'])) : ?>
      <div class="alert__message error">
        <p style="font-size: 14px; font-weight:600 ;">
          <?=  $_SESSION['add-user'];
          unset($_SESSION['add-user']);
          ?>
        </p>
    </div>
    <?php endif ?>
      <form action="<?=ROOT_URL ?>dashboard/add-user-logic.php" method="POST" enctype="multipart/form-data">
        <div class="form-group flex-column">
           <label for="fullname">User's Full Name</label>
           <input type="text" id="fullname" name="fullname" placeholder="Full Name" required autocomplete="given-name" value="<?=$fullname ?>" >
          </div>
          <div class="form-group flex-column">
            <label for="username">User's username</label>
            <input type="text" id="username" name="username" placeholder="Username" required value="<?=$username ?>">
          </div>
          <div class="form-group flex-column">
            <label for="email">User's email</label>
            <input type="email" id="email" name="email" placeholder="Email" value="<?=$email ?>" required>
          </div>
          <div class="form-group flex-column">
            <label for="signup-password">User's password</label>
            <input type="password" id="signup-password" name="createPassword" placeholder="Password" value="<?=$createPassword ?>" required class="password">
          </div>
          <div class="form-group flex-column">
            <label for="signup-password">Confirm User's password</label>
            <input type="password" id="confirm-password" class="password" name="confirmPassword"  placeholder="Confirm Password" value="<?=$confirmPassword ?>" required>
          </div>
        <div class="form-group flex-column">
            <label for="">User's Avatar</label>
            <input type="image" id="recipe-img" alt="Image" src="../assets/photo-placeholder.png" name="avatar-display" disabled>
          </div>
          <div class="form-group flex-column user-profile-div">
            <label for="user-profile">Add user profile picture</label>
            <input type="file" accept='image/*' id="upload-picture" name="avatar" required>
          </div>
           <select name="userrole" id="user-role">
            <option value="0" class="select-title">Choose a user role</option>
             <option value="0">Chef</option>
             <option value="1">Admin</option>
           </select>
           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" type="submit" name="submit">Create User</button>
      </form>
      </section>


      </main>
      <script type="module" src="../javascript/main.js"></script>
</body>
</html>
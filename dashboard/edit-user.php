              <?php
              include './partials/header.php' ;

              if(isset($_GET['id'])){
                $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                $query = "SELECT * FROM user WHERE id=$id";
                $result = mysqli_query($connection, $query);
                $user = mysqli_fetch_assoc($result);
              } 
              // else{
              //   header('location: '. ROOT_URL . 'dashboard/manage-user.php');
              //   die();
              // }
              ?>
            <?php
            include './partials/sidenav.php' ;
            ?>
                        <h4>Edit user</h4>
                      <form action="<?=ROOT_URL ?>dashboard/edit-user-logic.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?= $user['id']?>">
                        <div class="form-group flex-column">
                           <label for="fullname">Change User's Full Name</label>
                           <input type="text" id="fullname" name="fullname" value="<?= $user['fullname'] ?>" placeholder="Full Name" required autocomplete="given-name">
                          </div>
                          <div class="form-group flex-column">
                            <label for="username">Change username</label>
                            <input type="text" id="username" name="username" value="<?= $user['username']?>" placeholder="Username" required>
                          </div>
                          <div class="form-group flex-column">
                            <label for="email">Change email</label>
                            <input type="email" id="email" name="email" value="<?= $user['email']?>" placeholder="Email" required>
                          </div>
                        <div class="form-group flex-column">
                            <label for="">User's Avatar</label>
                            <input type="image" id="recipe-img" alt="Image" src="<?= ROOT_URL . 'assets/' . $user['avatar']?>" disabled>
                          </div>
                          <div class="form-group flex-column user-profile-div">
                            <label for="user-profile">change profile picture</label>
                            <input type="file" accept='image/*' id="user-avatar" name="avatar" value="<?= ROOT_URL . 'assets/' . $user['avatar']?>" required>
                          </div>
                           <select name="userrole" id="user-role" >
                            <option value="0" class="select-title">Change user role</option>
                             <option value="0">Chef</option>
                             <option value="1">Admin</option>
                           </select>
                           <button class="view-more-recipe-btn flex-row div-center" id="create-recipe" type="submit" name="submit">Update User</button>
                      </form>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
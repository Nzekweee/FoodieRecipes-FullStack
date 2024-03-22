         <?php
         include './partials/header.php' ;

         //fetch all users except from current user
         $current_admin_id = $_SESSION['user-id'];
         $query = "SELECT * FROM user WHERE NOT id=$current_admin_id";
         $users = mysqli_query($connection, $query);

         
         ?>
        <?php
         include './partials/sidenav.php' ;
         ?>
                        <h4>Manage Users</h4>
                        <?php if(isset($_SESSION['add-user-success'])) : ?>
                        <div class="alert__message success">
                        <p style="font-size: 14px; font-weight:600 ;">
                        <?=  $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                        ?>
                       </div>
                       <?php elseif(isset($_SESSION['edit-user-success'])) : ?>
                       <div class="alert__message success">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['edit-user-success'];
                       unset($_SESSION['edit-user-success']);
                       ?>
                      </div>
                       <?php elseif(isset($_SESSION['edit-user'])) : ?>
                       <div class="alert__message error">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['edit-user'];
                       unset($_SESSION['edit-user']);
                       ?>
                      </div>
                      <?php elseif(isset($_SESSION['delete-user-success'])) : ?>
                       <div class="alert__message success">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['delete-user-success'];
                       unset($_SESSION['delete-user-success']);
                       ?>
                      </div>
                       <?php elseif(isset($_SESSION['delete-user'])) : ?>
                       <div class="alert__message error">
                       <p style="font-size: 14px; font-weight:600 ;">
                       <?=  $_SESSION['delete-user'];
                       unset($_SESSION['delete-user']);
                       ?>
                      </div>
                       <?php endif ?>
                       <?php if(mysqli_num_rows($users) > 0) : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($user = mysqli_fetch_assoc($users)) : ?>
                                <tr>
                                    <td><?= $user['fullname'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><a href="<?= ROOT_URL ?>dashboard/edit-user.php?id=<?=$user['id'] ?> " class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="<?= ROOT_URL?>dashboard/delete-user.php?id=<?=$user['id']?>" class="header__login-btn div-center del-btn">Delete</a></td>
                                    <td><?=$user['is_admin']? 'Yes' : 'No' ?> </td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                        <?php else : ?>
                       <div class="alert__message error">
                          <p style="font-size: 14px; font-weight:600 ;"> No user found</p>
                       </div>
                       <?php endif ?>
                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
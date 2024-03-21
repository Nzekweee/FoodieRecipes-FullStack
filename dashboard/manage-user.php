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
                       <?php endif ?>
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
                                    <td><a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?=$user['id'] ?> " class="edit-btn header__login-btn div-center">Edit</a></td>
                                    <td><a href="delete-user.php " class="header__login-btn div-center del-btn">Delete</a></td>
                                    <td><?=$user['is_admin']? 'Yes' : 'No' ?> </td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>

                </section>


         </main>
         <script type="module" src="../javascript/main.js"></script>
</body>
</html>
<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>


<main class="dashboard__container container">
            <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-left"></i></button>
            <aside class="dashboard__sidebar">
                  <ul class="flex-column">
                    <li>
                    <a href="<?= ROOT_URL ?>dashboard" class="<?php echo ($current_page === 'index.php') ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-pen"></i>
                            <span>Create Recipe</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>dashboard/manage-recipes.php" class="<?php echo $current_page === 'manage-recipes.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Manage Recipes</span>
                        </a>
                    </li>
                    <?php if(isset($_SESSION['user_is_admin'])) : ?>
                    <li>
                        <a href="<?= ROOT_URL?>dashboard/add-user.php" class="<?php echo $current_page === 'add-user.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>Add Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>dashboard/manage-user.php" class="<?php echo $current_page === 'manage-user.php'  ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-users"></i>
                            <span>Manage Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>dashboard/add-category.php" class="<?php echo $current_page === 'add-category.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-table-list"></i>
                            <span>Add Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>dashboard/manage-categories.php" class="<?php echo $current_page === 'manage-categories.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-list"></i>
                            <span>Manage Categories</span>
                        </a>
                    </li>
                    <?php endif?>
                  </ul>
                </aside>
                
                <section class="main__container">
               
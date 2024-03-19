<?php
$current_page = basename($_SERVER['PHP_SELF']);

?>


<main class="dashboard__container container">
            <button id="show__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-angle-left"></i></button>
            <aside class="dashboard__sidebar">
                  <ul class="flex-column">
                    <li>
                        <a href="<?= ROOT_URL?>admin" class="<?php echo $current_page === '<?= ROOT_URL?>admin' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-pen"></i>
                            <span>Create Recipe</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>admin/manage-recipes.php" class="<?php echo $current_page === '<?= ROOT_URL?>admin/manage-recipes.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Manage Recipes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>admin/add-user.php" class="<?php echo $current_page === '<?= ROOT_URL?>admin/add-user.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>Add Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>admin/manage-user.php" class="<?php echo $current_page === '<?= ROOT_URL?>admin/manage-user.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-users"></i>
                            <span>Manage Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>admin/add-category.php" class="<?php echo $current_page === '<?= ROOT_URL?>admin/add-category.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-table-list"></i>
                            <span>Add Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= ROOT_URL?>admin/manage-categories.php" class="<?php echo $current_page === '<?= ROOT_URL?>admin/manage-categories.php' ? 'dashboard__sidebar-active' : ''; ?>">
                            <i class="fa-solid fa-list"></i>
                            <span>Manage Categories</span>
                        </a>
                    </li>
                  </ul>
                </aside>
                <section class="main__container">
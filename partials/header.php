<?php
require 'config/database.php';

//fetch current user
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM user WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodieRecipes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/styles.css">
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar">
        <div class="nav__container container flex-row div-center">
            <a href="index.php" class="nav__logo flex-row div-center"> <img src="<?= ROOT_URL ?>assets/foodie-logo.png" alt="logo"> Foodie<span>Recipes</span></a>
            <ul class="flex-row nav__items nav__details">
            <?php
                  if (basename($_SERVER['PHP_SELF']) === 'index.php') {
                      echo '<li class="nav__items-active home"><a href="' . ROOT_URL . '">Home</a></li>';
                      echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . 'recipe.php">Recipes</a></li>';
                      echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . 'about.php">About us</a></li>';
                  } elseif (basename($_SERVER['PHP_SELF']) === 'recipe.php') {
                      echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . '">Home</a></li>';
                      echo '<li class="nav__items-active recipe"><a href="' . ROOT_URL . 'recipe.php">Recipes</a></li>';
                      echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . 'about.php">About us</a></li>';
                  } elseif (basename($_SERVER['PHP_SELF']) === 'about.php') {
                      echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . '">Home</a></li>';
                      echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . 'recipe.php">Recipes</a></li>';
                      echo '<li class="nav__items-active about"><a href="' . ROOT_URL . 'about.php">About us</a></li>';
                  } else {
                    echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . '">Home</a></li>';
                    echo '<li class="nav__items-inactive"><a href="' . ROOT_URL . 'recipe.php">Recipes</a></li>';
                    echo '<li class="nav__items-inactive about"><a href="' . ROOT_URL . 'about.php">About us</a></li>';
                  }
             ?>

            </ul>
            <ul class="flex-row nav__login nav__details">
                <?php if (isset($_SESSION['user-id'])) : ?>
                <li class="nav__profile ">
                 <div class="avatar">
                     <img src="<?= ROOT_URL . 'assets/' . $avatar['avatar'] ?>" alt="avatar" draggable="false" class="rounded">
                 </div>
                 <ul class="flex-column">
                     <li><a href="<?= ROOT_URL?>dashboard" class="nav__dash">Dashboard</a></li>
                     <li><a href="<?= ROOT_URL?>logout.php" class="nav__logout">Logout</a></li>
                 </ul>
                </li>
                <?php else : ?>
                <li class="nav__login-btns flex-row nav__details">
                    <a href="<?= ROOT_URL?>sign-in.php" class="login__buttons login__btn">Log in</a>
                    <a href="<?= ROOT_URL?>sign-up.php" class="login__buttons signup__btn">Sign up</a>
                </li>
                <?php endif ?>

            </ul>
            <div class="nav__resp-btns">
                <button class="open__nav-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                <button class="close__nav-btn hidden"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
    </nav>
     <!-- NavBar Ends-->
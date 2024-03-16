<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodieRecipes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar">
        <div class="nav__container container flex-row div-center">
            <a href="index.php" class="nav__logo flex-row div-center"> <img src="assets/foodie-logo.png" alt="logo"> Foodie<span>Recipes</span></a>
            <ul class="flex-row nav__items nav__details">
                <li class="nav__items-active home"><a href="/">Home</a></li>
                <li class="nav__items-inactive"><a href="recipe.php">Recipes</a></li>
                <li class="nav__items-inactive"><a href="about.php">About us</a></li>
            </ul>
            <ul class="flex-row nav__login nav__details">
                <li class="nav__login-btns flex-row nav__details">
                    <a href="sign-in.php" class="login__buttons login__btn">Log in</a>
                    <a href="sign-up.php" class="login__buttons signup__btn">Sign up</a>
                </li>
                <li class="nav__profile hidden">
                     <div class="avatar">
                         <img src="assets/avatar2.jpg" alt="avatar" draggable="false" class="rounded">
                     </div>
                     <ul class="flex-column">
                         <li><a href="dashboard.php" class="nav__dash">Dashboard</a></li>
                         <li><a href="logout.php" class="nav__logout">Logout</a></li>
                     </ul>
                </li>
            </ul>
            <div class="nav__resp-btns">
                <button class="open__nav-btn"><i class="fa-solid fa-bars-staggered"></i></button>
                <button class="close__nav-btn hidden"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>
    </nav>
     <!-- NavBar Ends-->
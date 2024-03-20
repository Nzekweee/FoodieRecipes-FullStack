<?php
require 'config/constants.php';

$username = $_SESSION['signin-data']['username'] ?? null;
$email = $_SESSION['signin-data']['email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data'])
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FoodieRecipes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
<main class="form__signin flex-row div-center">
    <div class="form__container ">
        <div class="nav__logo flex-row div-center"> <img src="assets/foodie-logo.png" alt="logo"> Foodie<span>Recipes</span></div>
        <h3>Welcome back!</h3>
        <?php if(isset($_SESSION['signup-success'])) : ?>
          <div class="alert__message success">
          <p style="font-size: 14px; font-weight:600 ;">
          <?=  $_SESSION['signup-success'];
          unset($_SESSION['signup-success']);
          ?>
        </div>
        <?php elseif(isset($_SESSION['sign-in'])) : ?>
          <div class="alert__message error">
          <p style="font-size: 14px; font-weight:600 ;">
          <?=  $_SESSION['sign-in'];
          unset($_SESSION['sign-in']);
          ?>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>signin-logic.php"  method="POST">
          <div class="form-group">
            <span class="input-icon  fa-regular fa-user"></span>
            <input type="text" id="username" name="username" placeholder="Username" value="<?=$username ?>" required>
          </div>
          <div class="form-group">
            <span class="input-icon fa-regular fa-envelope"></span>
            <input type="email" id="email" name="email" placeholder="Email" value="<?=$email ?>" required>
          </div>
          <div class="form-group">
            <span class="input-icon  fa-solid fa-eye hide-password hidden"></span>
            <span class="input-icon  fa-solid fa-eye-slash view-password"></span>
            <input type="password" id="signin-password" name="password" placeholder="Password" value="<?=$password ?>" required class="password">
          </div>
          <div class="form-group flex-row div-center terms__box no-opacity">
            <div class="signup-checkbox">
                <input id="first_name" type="checkbox" class="input-checkbox">
                <label for="first_name" class="label-checkbox"></label>
              </div>
            <p class="terms">By signing up, you agree to the terms and conditions.</p>
          </div>
    
          <button type="submit" name="submit">Sign In</button>
        </form>
        <div class="signin-link">
          <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>
        </div>
      </div>
</main>
  <script type="module" src="javascript/main.js"></script>
</body>
</html>

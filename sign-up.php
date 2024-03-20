<?php
require 'config/constants.php';

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
  <div class="form__container form__siginup__container">
    <div class="nav__logo flex-row div-center"> <img src="assets/foodie-logo.png" alt="logo"> Foodie<span>Recipes</span></div>
    <h3>Create an account</h3>
    <div class="alert__message error">
        This is an error message
    </div>
    <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
      <div class="form-group">
        <span class="input-icon  fa-regular fa-user"></span>
        <input type="text" id="fullname" name="fullname" placeholder="Full Name" required autocomplete="given-name">
      </div>
      <div class="form-group">
        <span class="input-icon  fa-regular fa-user"></span>
        <input type="text" id="username" name="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <span class="input-icon fa-regular fa-envelope"></span>
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <span class="input-icon  fa-solid fa-eye hide-password hidden"></span>
        <span class="input-icon  fa-solid fa-eye-slash view-password"></span>
        <input type="password" id="signup-password" name="createPassword" placeholder="Password" required class="password">
      </div>
      <div class="form-group">
        <span class="input-icon  fa-solid fa-eye hide-password hidden"></span>
        <span class="input-icon  fa-solid fa-eye-slash view-password"></span>
        <input type="password" id="confirm-password" class="password" name="confirmPassword" placeholder="Confirm Password" required>
      </div>
      <div class="form-group ">
       <div class="form-group user-profile-div">
        <label for="avatar">User Profile Picture</label>
        <input type="file" accept='image/*' id="user-avatar" name="avatar" required>
       </div>
      <div class="form-group flex-row div-center terms__box">
        <div class="signup-checkbox">
            <input id="checkmark" type="checkbox" class="input-checkbox" required>
            <label for="checkmark" class="label-checkbox"></label>
          </div>
        <p class="terms">By signing up, you agree to the terms and conditions.</p>
      </div>
      </div>

      <button type="submit" name="submit">Sign Up</button>
    </form>
    <div class="signin-link">
      <p>Already have an account? <a href="sign-in.php">Sign In</a></p>
    </div>
  </div>
  <script type="module" src="javascript/main.js"></script>
</body>
</html>

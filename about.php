<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FoodieRecipes</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/css/styles.css">
    </head>
<body>
        <!-- NavBar -->
        <nav class="navbar">
            <div class="nav__container container flex-row div-center">
                <a href="index.php" class="nav__logo flex-row div-center"> <img src="/assets/foodie-logo.png" alt="logo"> Foodie<span>Recipes</span></a>
                <ul class="flex-row nav__items nav__details">
                    <li class="nav__items-inactive home"><a href="/">Home</a></li>
                    <li class="nav__items-inactive"><a href="/recipe.php">Recipes</a></li>
                    <li class="nav__items-active"><a href="/about.php">About us</a></li>
                </ul>
                <ul class="flex-row nav__login nav__details">
                    <li class="nav__login-btns flex-row nav__details">
                        <a href="sign-in.php" class="login__buttons login__btn">Log in</a>
                        <a href="sign-up.php" class="login__buttons signup__btn">Sign up</a>
                    </li>
                    <li class="nav__profile hidden">
                         <div class="avatar">
                             <img src="/assets/avatar2.jpg" alt="avatar" draggable="false" class="rounded">
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
         <main class="container about__container flex-column">
            <section class=" ">
                <h2>A website for foodies and culinary enthusiasts</h2>
                <div class="about-img"><img src="/assets/about.jpg" alt=""></div>
                <p class="cont__text">Welcome to our culinary hub, where chefs and food enthusiasts converge! Discover a diverse array of recipes to tantalize your taste buds and ignite your culinary creativity. Chefs, share your expertise and signature dishes with a global audience. Recipe seekers, explore our curated collection for inspiration to spice up your kitchen and delight your senses. Join us on a flavorful journey, where every dish tells a story and every bite is an adventure.</p>
            </section>
            <section class="services">
                <h2>Services</h2>
                <p class="cont__text">We are here to serve you, foodie explorer</p>
                <section class="flex-row space-between">
                        <ul class="flex-column">
                            <li>Recipe Discovery Platform: Access to a vast collection of diverse and curated recipes from around the world.</li>
                            <li>Cooking Tips and Techniques: Expert advice and tutorials to enhance culinary skills and knowledge.</li>
                            <li>Chef Profiles: Explore profiles of talented chefs, discover their culinary backgrounds, and follow their latest recipes and creations.</li>
                            <li>Recipe Sharing: Upload and share your own recipes, garner feedback, and connect with fellow chefs and foodies.</li>
                            <li>Ingredient Sourcing: Information on sourcing high-quality ingredients, including local markets, specialty stores, and online suppliers.</li>
                        </ul>
                     <div>
                        <img src="assets/Ads.svg" alt="ad">
                     </div>
                </section>
            </section>
         </main>
                 <!-- Footer -->
        <footer class="footer cont__section container">
            <section class="flex-row  space-between  footer__top">
              <div>
                  <a href="index.php" class="nav__logo flex-row footer__logo"> <img src="/assets/foodie-logo.png" alt="logo"> Foodie<span>Recipes</span></a>
                  <p class="cont__text">Your favourite Recipes in one place</p>
              </div>
              <ul class="flex-row footer__items  div-center">
                  <li><a href="#">Home</a></li>
                  <li><a href="/recipe.php">Recipes</a></li>
                  <li><a href="/about.php">About us</a></li>
              </ul>
            </section>
            <section class="flex-row space-between">
              <span>2024&copy;foodieRecipe</span>
              <div class="social-icons flex-row">
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-github"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </section>
        </footer>
        <script type="module" src="/javascript/main.js"></script>
</body>
</html>
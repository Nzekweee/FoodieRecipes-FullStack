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
                <li class="nav__items-active home"><a href="/">Home</a></li>
                <li class="nav__items-inactive"><a href="/recipe.php">Recipes</a></li>
                <li class="nav__items-inactive"><a href="/about.php">About us</a></li>
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
     <!--Header -->
     <header class="container header__container flex-row space-between">
         <section class="header__left">
             <h1>Your favourite <span> Recipes</span> in one place</h1>
             <p class="cont__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed nesciunt cupiditate nostrum reiciendis vitae rem! Tempore laudantium accusantium totam facilis eius cupiditate eum? Modi, quidem consequatur ad aspernatur eligendi sunt.</p>
                <a href="sign-up.php" class="header__login-btn div-center">Sign up</a>
             <p class="cont__text">Do you have an account? <a href="sign-in.php">Log in</a></p>

         </section>
         <section class="header__right flex-row div-center">
            <div>
               <img src="assets/headerimg.jpg" alt="header-img">
            </div>
       </section>

     </header>
     <!-- Header Ends -->
     <!-- categories section -->
     <section class="container categories__container cont__section">
         <h2>Popular Categories</h2>
         <section class="flex-row space-between cat-items ">
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="assets/pasta.webp" alt="cat-img1">
                </div>
                <span>Pasta</span>
            </div>
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="/assets/pizza.jpg" alt="cat-img2">
                </div>
                <span>Pizza</span>
            </div>
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="assets/vegan.jpg" alt="cat-img3">
                </div>
                <span>Vegan</span>
            </div>
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="assets/desserts.jpg" alt="cat-img4">
                </div>
                <span>Desserts</span>
            </div>
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="assets/smoothie.jpg" alt="cat-img5">
                </div>
                <span>Smoothies</span>
            </div>
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="assets/breakfast.jpg" alt="cat-img6">
                </div>
                <span>Breakfast</span>
            </div>
         </section>
     </section>
         <!-- categories section  Ends-->
         <!-- Trending categories -->
         <section class="container cont__section trending__container">
            <h2>Trending Recipes</h2>
            <p class="cont__text">Mouth savouring recipes that changed the game in the kitchen!</p>
            <section class="trending__recipes space-between">
                 <div class="trending__recipe flex-column">
                    <div class="recipe_like  flex-row div-center recipe_like-clicked" > <i class="fa-solid fa-heart"></i></div>
                     <div class="trending__recipe-imagecont">
                        <img src="assets/recipe1.jpg" alt="recipe-img">
                     </div>
                     <span class="recipe-title">Chocoloate Delight flambe</span>
                     <div class="flex-row  recipe-details">
                           <div class="flex-row div-center ">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time">30 mins</span>
                           </div>
                           <div class="flex-row div-center ">
                            <img src="assets/ForkKnife.svg" alt="timer">
                            <span class="recipe-category">Desserts</span>
                        </div>
                     </div>
                     <a href="#" class="view-recipe">View Recipe</a>
                 </div>
                 <div class="trending__recipe flex-column">
                    <div class="recipe_like  flex-row div-center"> <i class="fa-solid fa-heart"></i></div>
                     <div class="trending__recipe-imagecont">
                        <img src="assets/recipe2.jpg" alt="recipe-img">
                     </div>
                     <span class="recipe-title">Yummy chocolate banana smoothie</span>
                     <div class="flex-row  recipe-details">
                           <div class="flex-row div-center ">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time">30 mins</span>
                           </div>
                           <div class="flex-row div-center ">
                            <img src="assets/ForkKnife.svg" alt="timer">
                            <span class="recipe-category">Smoothies</span>
                        </div>
                     </div>
                     <a href="#" class="view-recipe">View Recipe</a>
                 </div>
                 <div class="trending__recipe flex-column">
                    <div class="recipe_like  flex-row div-center"> <i class="fa-solid fa-heart"></i></div>
                     <div class="trending__recipe-imagecont">
                        <img src="assets/recipe3.jpg" alt="recipe-img">
                     </div>
                     <span class="recipe-title">Fresh and Healthy Fruity salad</span>
                     <div class="flex-row  recipe-details">
                           <div class="flex-row div-center ">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time">30 mins</span>
                           </div>
                           <div class="flex-row div-center ">
                            <img src="assets/ForkKnife.svg" alt="timer">
                            <span class="recipe-category">Vegan</span>
                        </div>
                     </div>
                     <a href="#" class="view-recipe">View Recipe</a>
                 </div>
                 <div class="trending__recipe flex-column">
                    <div class="recipe_like  flex-row div-center"> <i class="fa-solid fa-heart"></i></div>
                     <div class="trending__recipe-imagecont">
                        <img src="assets/recipe4.jpg" alt="recipe-img">
                     </div>
                     <span class="recipe-title">Creamy vegan pasta delight</span>
                     <div class="flex-row  recipe-details">
                           <div class="flex-row div-center ">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time">30 mins</span>
                           </div>
                           <div class="flex-row div-center ">
                            <img src="assets/ForkKnife.svg" alt="timer">
                            <span class="recipe-category">Vegan</span>
                        </div>
                     </div>
                     <a href="#" class="view-recipe">View Recipe</a>
                 </div>
                 <div class="trending__recipe flex-column">
                    <div class="recipe_like  flex-row div-center"> <i class="fa-solid fa-heart"></i></div>
                     <div class="trending__recipe-imagecont">
                        <img src="assets/recipe5.jpg" alt="recipe-img">
                     </div>
                     <span class="recipe-title">Pesto pasta</span>
                     <div class="flex-row  recipe-details">
                           <div class="flex-row div-center ">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time">30 mins</span>
                           </div>
                           <div class="flex-row div-center ">
                            <img src="assets/ForkKnife.svg" alt="timer">
                            <span class="recipe-category">pasta</span>
                        </div>
                     </div>
                     <a href="#" class="view-recipe">View Recipe</a>
                 </div>
                 <div class="trending__recipe flex-column">
                    <div class="recipe_like  flex-row div-center"> <i class="fa-solid fa-heart"></i></div>
                     <div class="trending__recipe-imagecont">
                        <img src="assets/recipe6.jpeg" alt="recipe-img">
                     </div>
                     <span class="recipe-title">Bread and baked beans morning delight</span>
                     <div class="flex-row  recipe-details">
                           <div class="flex-row div-center ">
                               <img src="assets/Timer.svg" alt="timer">
                               <span class="recipe-time">30 mins</span>
                           </div>
                           <div class="flex-row div-center ">
                            <img src="assets/ForkKnife.svg" alt="timer">
                            <span class="recipe-category">Breakfast</span>
                        </div>
                     </div>
                     <a href="#" class="view-recipe">View Recipe</a>
                 </div>
            </section>
            <div class="view-more-recipe-btn flex-row div-center"><a href="recipe.php">View More Recipes</a></div>
         </section>
         <!-- Trending categories Ends-->
         <!-- Chef CTA Section -->
         <section class="container chef__container cont__section flex-row div-center">
             <div class="flex-column chef__container-right">
                <h2>Everyone can be a <br/> chef in their own kitchen</h2>
                <p class="cont__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum dolore sint consequuntur necessitatibus nemo excepturi placeat quas eaque</p>
                <a href="sign-up.php" class="header__login-btn div-center flex-row">Sign up</a>
            </div>
            <div>
                <img src="assets/chefimg.svg" alt="chefimg">
            </div>
         </section>
        <!-- Chef CTA Section Ends-->
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
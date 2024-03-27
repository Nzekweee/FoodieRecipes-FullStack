<?php
include 'partials/header.php' ;

$query = "SELECT * FROM categories LIMIT 6";
$categories = mysqli_query($connection,$query);
?>
     <!--Header -->
     <header class="container header__container flex-row space-between">
         <section class="header__left">
             <h1>Your favourite <span> Recipes</span> in one place</h1>
             <p class="cont__text">Whether you’re a seasoned chef or a kitchen novice, having all your cherished recipes neatly organized is a true delight. Imagine flipping through the pages of your recipe book, each dish evoking memories and flavors. We have collections of mouthwatering recipes to tantalize your taste buds.</p>
                <a href="<?= ROOT_URL?>sign-up.php" class="header__login-btn div-center">Sign up</a>
             <p class="cont__text">Do you have an account? <a href="<?= ROOT_URL?>sign-in.php">Log in</a></p>

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
         <?php while($category = mysqli_fetch_assoc($categories)) : ?>
            <div class="flex-column div-center cat-item">
                <div>
                    <img src="<?= ROOT_URL . 'assets/' . $category['cat_img']?>" alt="cat-img">
                </div>
                <span><?=$category['cat_name'] ?></span>
            </div>
            <?php endwhile ?>
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
<?php
include 'partials/footer.php';
?>
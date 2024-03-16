       <?php
         include 'partials/header.php';
         ?>
        <style>
          <?php include 'css/recipe.css'; ?>
          </style>
    <main class="container cont-section recipe__post-container">
        <h2>Health Japanese Fried Rice </h2>
        <header class="flex-row space-between">
            <section class="details-container flex-row">
                <div class="flex-row ">
                    <div class="avatar">
                        <img src="assets/avatar2.jpg" alt="avatar" draggable="false" class="rounded">
                    </div>
                    <div class="flex-column">
                        <span class="det-title profile-name">John Smith</span>
                        <span class="cont__text">15 March 2022</span>
                    </div>
                </div>
                <div class="line-divider"></div>
                <div class="flex-row ">
                    <div class="flex-row div-center det-img">
                        <img src="assets/Timer.svg" alt="timer">
                    </div>
                    <div class="flex-column">
                        <span class="det-title prep-time">Prep Time</span>
                        <span class="cont__text">20 mins</span>
                    </div>
                </div>
                <div class="line-divider"></div>
                <div class="flex-row ">
                    <div class="flex-row div-center det-img">
                        <img src="assets/Timer.svg" alt="timer">
                    </div>
                    <div class="flex-column">
                        <span class="det-title prep-time">Cook Time</span>
                        <span class="cont__text">15 mins</span>
                    </div>
                </div>
                <div class="line-divider"></div>
                <div class="flex-row div-center">
                    <div class="flex-row det-img">
                        <img src="assets/ForkKnife.svg" alt="timer">
                    </div>
                    <div class="flex-column">
                        <span class="det-title ">Category</span>
                        <span class="cont__text recipe-category">Breakfast</span>
                    </div>
                </div>
            </section>
            <section class="print-share flex-row">
                <div class="print-share-div ">
                    <div class="flex-row div-center ">
                        <img src="assets/printer.svg" alt="printer">
                    </div>
                    <span>Print</span>
                </div>
                <div class="print-share-div">
                    <div class="flex-row div-center">
                        <img src="assets/share.svg" alt="share">
                     </div>
                    <span>Share</span>
                </div>

            </section>
        </header>
        <section>
            <p class="recipe-description">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed obcaecati, asperiores aspernatur natus qui sequi facere ipsa pariatur cumque delectus alias rem molestiae incidunt labore corporis exercitationem iusto nihil amet.</p>     
            <div class="recipe-image">
                 <img src="assets/recipe-post-img.jpg" alt="">
            </div>
            <div class="recipe-rating flex-row">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <section class="ingredients">
                <h3>Ingredients</h3>
                <ul class="ingredients-list">
                    <li>Rice</li>
                    <li>Vanilla</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>crepe pudding</li>
                    <li>3 cups of vanilla</li>

                </ul>
            </section>
            <section class="recipe-directions">
                <h3>Directions</h3>
                <ul >
                    <li class="recipe-step flex-column">
                     <h4 class=""> <span>Step 1:</span> Cook the meat</h4>
                     <p class="cont__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni cupiditate id exercitationem corporis temporibus quibusdam blanditiis ipsa nisi maiores corrupti. Eveniet perspiciatis qui, ad et quae porro dicta excepturi nostrum!</p>
                    </li>
                    <li class="recipe-step flex-column">
                        <h4 class=""><span>Step 2:</span> Cook the meat</h4>
                        <p class="cont__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni cupiditate id exercitationem corporis temporibus quibusdam blanditiis ipsa nisi maiores corrupti. Eveniet perspiciatis qui, ad et quae porro dicta excepturi nostrum!</p>
                    </li>
                  <li class="recipe-step flex-column">
                   <h4 class=""><span>Step 3:</span> Cook the meat</h4>
                   <p class="cont__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni cupiditate id exercitationem corporis temporibus quibusdam blanditiis ipsa nisi maiores corrupti. Eveniet perspiciatis qui, ad et quae porro dicta excepturi nostrum!</p>
                  </li>
                  <li class="recipe-step flex-column">
                    <h4 class=""><span>Step 4:</span> Cook the meat</h4>
                    <p class="cont__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni cupiditate id exercitationem corporis temporibus quibusdam blanditiis ipsa nisi maiores corrupti. Eveniet perspiciatis qui, ad et quae porro dicta excepturi nostrum!</p>
                   </li>
             </ul>
            </section>
            <button class="view-more-recipe-btn rate-recipe-btn flex-row div-center">Rate this Recipe!</button>
            <div class="rating-container"></div>
        </section>
    </main>
    <?php
         include 'partials/footer.php';
    ?>
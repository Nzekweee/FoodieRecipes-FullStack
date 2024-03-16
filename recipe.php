       <?php
         include 'partials/header.php';
         ?>
         <style>
          <?php include 'css/recipe.css'; ?>
          </style>
         <head>
         <link rel="stylesheet" href="/css/recipe.css">
         </head>
     <!-- search and filter section -->
     <section class="container">
            <section class="search__container-top flex-row space-between">
                <!-- searchbar -->
                <div class="search-container">
                 <input type="text" id="searchInput" placeholder="Search Recipes...">
                 <button id="searchButton"><i class="fas fa-search"></i></button>
                 <div id="searchDropdown" class="dropdown-content">
                   <!-- Dropdown content will be populated dynamically -->
                 </div>
                 </div>   
                <!-- filters Activator  -->
                <div class="view-filters cursor-pointer flex-row div-center">
                  <i class="fa-solid fa-arrow-up-short-wide"></i> 
                  <span>Filters</span>
                </div>
               </section>
               <section class="search__container-bottom flex-row space-between">
                <div class="custom-dropdown">
                    <button class="custom-dropdown-toggle cursor-pointer flex-row space-between" id="custom-dropdownButton1">Select a Category <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="custom-dropdown-content" id="custom-dropdownContent1">
                      <!-- custom-dropdown content will be populated dynamically -->
                    </div>
                  </div>
                  
                  <div class="custom-dropdown">
                    <button class="custom-dropdown-toggle cursor-pointer flex-row space-between" id="custom-dropdownButton2">Select a location <i class="fa-solid fa-chevron-down"></i></button>
                    <div class="custom-dropdown-content" id="custom-dropdownContent2">
                      <!-- custom-dropdown content will be populated dynamically -->
                    </div>
                  </div>
                  
               </section>
     </section>
     <!-- search and filter section ends-->
     <!-- categories sections -->
       <!-- different categories with view more button that leads to categories PAGE -->
       <!-- also each recipe leads to indiviual recipe page -->
       <main class="container recipe-categories-display">
              
       </main>
     <!-- categories sections ends -->
     <?php
         include 'partials/footer.php'
         ?>
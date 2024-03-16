<?php
         include 'partials/header.php';
?>
<style>
 <?php include 'css/recipe.css'; ?>
 </style>
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
               </section>
     </section>
<?php
  include 'partials/footer.php';
  ?>
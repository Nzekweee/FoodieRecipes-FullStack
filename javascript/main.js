const openNavIcon =  document.querySelector(".open__nav-btn"),
closeNavIcon =  document.querySelector(".close__nav-btn"),
navItems = document.querySelectorAll(".nav__details"),
recipeLike = document.querySelectorAll(".recipe_like"),
recipeHeart = document.querySelectorAll(".recipe_like i"),
viewPasswordIcon = document.querySelectorAll('.view-password'),
hidePasswordIcon = document.querySelectorAll('.hide-password'),
passwordInput = document.querySelectorAll('.password'),
searchInput = document.getElementById("searchInput"),
searchDropdown = document.getElementById("searchDropdown"),
viewFilters = document.querySelector(".view-filters"),
searchContainerBottom = document.querySelector(".search__container-bottom"),
customDropdowns = document.querySelectorAll(".custom-dropdown"),
sideBar = document.querySelector('.dashboard__sidebar'),
showSideBarToggle  = document.querySelector('#show__sidebar-btn'),
hideSideBarToggle  = document.querySelector('#hide__sidebar-btn'),
fileInput = document.getElementById('upload-picture'),
recipeImg = document.getElementById('recipe-img'),
addIngBtn = document.querySelector('.add-ing'),
ingredientCont = document.querySelector('.ingredient__cont'),
stepCounterSpan = document.querySelectorAll('.step_counter'),
addDirBtn = document.querySelector('.add-dir'),
removeDirBtn = document.querySelector('.remove-dir'),
directionsContainer = document.querySelector('.directions-cont');


//navbar
openNavIcon ? openNavIcon.addEventListener("click", () => {
     navItems.forEach((navItem)=>{
       navItem.style.display = "flex";
     })
     openNavIcon.classList.add("hidden")
     closeNavIcon.classList.remove("hidden")
}) : null;

closeNavIcon ? closeNavIcon.addEventListener("click", () =>{
    navItems.forEach((navItem)=>{
        navItem.style.display = "none";
      })
      openNavIcon.classList.remove("hidden")
      closeNavIcon.classList.add("hidden")
}): null;


//dashboard nav
const showSideBar = () =>{
  sideBar.style.left = '0'
  showSideBarToggle.style.display = 'none'
  hideSideBarToggle.style.display = 'inline-block'

}

const hideSideBar = () =>{
  sideBar.style.left = '-100%'
  hideSideBarToggle.style.display = 'none'
  showSideBarToggle.style.display = 'inline-block'
}
if(sideBar){
 showSideBarToggle.addEventListener('click', showSideBar)
 hideSideBarToggle.addEventListener('click', hideSideBar)

 //upload recipe Img
 fileInput ? fileInput.addEventListener('change', function() {
  if (this.files && this.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
          recipeImg.src = e.target.result;
      };
      reader.readAsDataURL(this.files[0]);
  }
}) : null;

   // Create a new ingredient input field
// Function to handle removing ingredient groups
const handleRemoveIngredient = (e) => {
  const clickedRemoveIcon = e.target;
  const ingredientGroupToRemove = clickedRemoveIcon.closest('.recipe-ing-group');
  if (ingredientGroupToRemove) {
      ingredientGroupToRemove.remove();
  }
}

// Create a new ingredient input field
addIngBtn ? addIngBtn.addEventListener('click', function() {
  // Create a new ingredient input field
  const newIngredientGroup = document.createElement('div');
  newIngredientGroup.classList.add('recipe-ing-group', 'flex-row');

  const newIngredientInput = document.createElement('input');
  newIngredientInput.type = 'text';
  newIngredientInput.name = 'ingredients[]';
  newIngredientInput.placeholder = 'Add Ingredient';
  newIngredientInput.required = true;

  const removeIcon = document.createElement('i');
  removeIcon.classList.add('fa-solid', 'fa-trash', 'remove-ing');
  removeIcon.addEventListener('click', handleRemoveIngredient);

  newIngredientGroup.appendChild(newIngredientInput);
  newIngredientGroup.appendChild(removeIcon);

  ingredientCont.insertBefore(newIngredientGroup, addIngBtn);
}) : null ;

// Add event listeners to dynamically generated remove icons
document.querySelectorAll('.remove-ing').forEach(function(removeIcon) {
  removeIcon.addEventListener('click', handleRemoveIngredient);
});



         // Create and removea article  element for directions

         let nextStepCounter ;
         let stepCounter;
         let steps;

         if(stepCounterSpan && stepCounterSpan.length > 0){
          nextStepCounter = parseInt(stepCounterSpan[stepCounterSpan.length - 1]?.innerHTML) + 2;
          stepCounter = nextStepCounter ;
          steps = parseInt(stepCounterSpan[stepCounterSpan.length - 1]?.innerHTML) + 1
         } else {
          stepCounter = 2;
          steps = stepCounter
         }
  
      addDirBtn? addDirBtn.addEventListener('click', function() {
          const newDirectionArticle = document.createElement('article');
          newDirectionArticle.innerHTML = `
              <div class="direction-title-cont flex-row">
                  <span>Step ${steps}</span>
                  <input type="text" name="directions[${stepCounter}][title]" placeholder="What's step ${steps}" required>
              </div>
              <textarea cols="30" rows="10" name="directions[${stepCounter}][description]" placeholder="Describe the step"></textarea>
          `;
          stepCounter++;
          steps++
          directionsContainer.appendChild(newDirectionArticle);
      }) : null ;
  
      removeDirBtn ? removeDirBtn.addEventListener('click', function() {
          const lastDirectionArticle = directionsContainer.lastElementChild;
          if (lastDirectionArticle) {
              directionsContainer.removeChild(lastDirectionArticle);
              stepCounter--;
              const prevStepNumber = stepCounter - 1;
              const prevStepSpan = document.querySelector(`.direction-title-cont:nth-child(${prevStepNumber}) span`);
              if (prevStepSpan) {
                  prevStepSpan.textContent = `Step ${prevStepNumber}`;
              }
          }
      }) : null ;
   
}

//liking recipes
let likeBool = false
const likeRecipeFunc = ( recipeHeartIdx) =>{
  if (!recipeHeart) return
  likeBool = !likeBool; 
  let likeRecipe = likeBool; 
  let countLike = 0
 if (likeRecipe) {
  recipeHeart[recipeHeartIdx].style.color = '#FF6363'
  countLike =1
 } else {
  recipeHeart[recipeHeartIdx].style.color = '#DBE2E5'
  countLike = 0
 } 
}
if (recipeLike){
  recipeLike.forEach((icon, idx)=>{
      icon.addEventListener("click", () => likeRecipeFunc(idx))
    })
}


//password
if (viewPasswordIcon) {
  viewPasswordIcon.forEach((viewIcon, idx) => {
    viewIcon.addEventListener("click", () => {
      viewIcon.style.display = 'none';
      hidePasswordIcon[idx].style.display = 'block'
      passwordInput[idx].type = 'text';
    });
  });
}

if (hidePasswordIcon) {
  hidePasswordIcon.forEach((hideIcon, idx) => {
    hideIcon.addEventListener("click", () => {
      hideIcon.style.display = 'none';
      viewPasswordIcon[idx].style.display = 'block'
      passwordInput[idx].type = 'password';
    });
  });
}


// RECIPE PAGE

// filter functionality
let viewFiltersBool = false
const viewFiltersFunc =(element)=>{
 
 viewFiltersBool = !viewFiltersBool
 let viewFiltersDiv = viewFiltersBool; 
 if(viewFiltersDiv){
   element.classList.add('view-filters-clicked') 
 } else {
   element.classList.remove('view-filters-clicked') 
 }
}
if(viewFilters){
  viewFilters.addEventListener("click", ()=> {
    viewFiltersFunc(viewFilters)
    searchContainerBottom.style.display = searchContainerBottom.style.display === "flex" ? "none" : "flex";
  })
 
}


//link and share

const printRecipe = () => {
  window.print(); 
}

const copyLink = () => {
  var url = window.location.href;
  if (!navigator.clipboard) {
    alert('Browser does not support Clipboard API');
    return;
  }
  navigator.clipboard.writeText(url)
    .then(function() {
      alert("Link copied to clipboard: " + url); 
    })
    .catch(function(err) {
      console.error('Could not copy text: ', err);
    });
}

const copyDiv = document.querySelector('.print-div'),
shareDiv = document.querySelector('.share-div')

copyDiv ? copyDiv.addEventListener('click', printRecipe) : null ;
shareDiv ? shareDiv.addEventListener('click', copyLink) : null ;





//custom drop down
customDropdowns.forEach((customDropdown, index) => {
  const customDropdownBtn = customDropdown.querySelector(".custom-dropdown-toggle");
  const customDropdownContent = customDropdown.querySelector(".custom-dropdown-content");

  customDropdownBtn.addEventListener("click", () => {
    customDropdownContent.style.display = customDropdownContent.style.display === "block" ? "none" : "block";
    viewFiltersFunc(customDropdownBtn)
  });

  document.addEventListener("click", event => {
    if (!event.target.matches(".custom-dropdown-toggle") && !event.target.matches(".dropdown-item")) {
      closeDropdown(customDropdownContent);
    }
  });
});

function closeDropdown(customDropdownContent) {
  customDropdownContent.style.display = "none";
}



// rating system
const rateRecipeBtn = document.querySelector('.rate-recipe-btn');
const ratingContainer = document.querySelector('.rating-container');

if(rateRecipeBtn){
  // Show rating container on button click
rateRecipeBtn.addEventListener('click', () => {
  ratingContainer.style.display = ratingContainer.style.display ===  'block'? 'none' : 'block' ;
}); }


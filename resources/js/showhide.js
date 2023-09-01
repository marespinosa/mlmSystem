const mainDiv = document.querySelector(".maindiv");
const hideBox = document.querySelector(".hidebox-div");
  
    mainDiv.addEventListener("click", function() {
      hideBox.style.display = hideBox.style.display === "none" ? "block" : "none";
    });
  
    hideBox.addEventListener("click", function(event) {
      
      event.stopPropagation();
    });
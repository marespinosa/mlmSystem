function showfunctionsbtn() {
    var elements = document.querySelectorAll(".hidebox-div");
    elements.forEach(function(element) {
      if (element.style.display === "none" || element.style.display === "") {
        element.style.display = "block";
      } else {
        element.style.display = "none";
      }
    });
  }
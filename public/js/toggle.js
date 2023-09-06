function toggleContent(tabNumber) {
    var userTree = document.querySelector(".userTree[onclick='toggleContent(" + tabNumber + ")']");
    
    var contentTabs = userTree.parentElement.querySelectorAll(".contentTab");

    contentTabs.forEach(function (element) {
        if (element.style.display === "none" || element.style.display === "") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    });
}

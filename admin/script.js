
var tableContainer = document.getElementById("table");


var searchForm = document.getElementById("search");

searchForm.addEventListener("submit", function(event) {
  event.preventDefault();

  tableContainer.style.display = "none";
});

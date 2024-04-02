var showFormButton = document.getElementById("showFormButton");
var formContainer = document.getElementById("formContainer");
var submitButton = document.getElementById("submitButton");

showFormButton.addEventListener("click", function() {
  formContainer.style.display = "block";
});

submitButton.addEventListener("click", function(event) {
  event.preventDefault();
  // Handle button click and form submission logic here
  
  formContainer.style.display = "none";
});

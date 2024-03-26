 // Get references to the dropdown toggle and dropdown content elements
 var plansDropdownToggle = document.getElementById('plans-dropdown-toggle');
 var plansDropdownContent = document.getElementById('plans-dropdown');

 // Add event listener to the Plans dropdown toggle
 plansDropdownToggle.addEventListener('click', function(event) {
   // Prevent default behavior of the click event
   event.preventDefault();
   // Toggle visibility of the dropdown content
   if (plansDropdownContent.style.display === "block") {
	 plansDropdownContent.style.display = "none";
   } else {
	 plansDropdownContent.style.display = "block";
   }
 });

 // Add event listener to the document body to close dropdown when clicking elsewhere
 document.body.addEventListener('click', function(event) {
   // Check if the clicked element is not part of the Plans dropdown
   if (!event.target.matches('.dropdown-toggle')) {
	 // Hide the dropdown content
	 plansDropdownContent.style.display = 'none';
   }
 });    





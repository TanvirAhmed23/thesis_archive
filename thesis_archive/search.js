// Function to handle search
function searchPDFs() {
    // Get the search input value
    var searchQuery = document.getElementById('searchInput').value.toLowerCase();
  
    // Get all PDF cards
    var pdfCards = document.getElementsByClassName('pdf-card');
  
    // Loop through each PDF card
    for (var i = 0; i < pdfCards.length; i++) {
      var pdfTitle = pdfCards[i].getElementsByClassName('pdf-title')[0].textContent.toLowerCase();
  
      // Check if the search query matches the PDF title
      if (pdfTitle.includes(searchQuery)) {
        pdfCards[i].style.display = 'block'; // Show the PDF card
      } else {
        pdfCards[i].style.display = 'none'; // Hide the PDF card
      }
    }
  }
  
  // Add event listener to the search form
  document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent form submission
    searchPDFs(); // Call the search function
  });
  
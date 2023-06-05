function toggleAbstract(button) {
    var abstract = button.parentNode.querySelector('.pdf-description.abstract');
  
    if (abstract.style.display === 'none') {
      abstract.style.display = 'block';
      button.textContent = 'Hide Abstract';
    } else {
      abstract.style.display = 'none';
      button.textContent = 'Show Abstract';
    }
  }


//   function toggleAbstract(link) {
//     var abstract = link.nextElementSibling;
//     abstract.style.display = abstract.style.display === 'none' ? 'block' : 'none';
//   }

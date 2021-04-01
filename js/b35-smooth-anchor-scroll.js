/**
 * Scrolls anchors into view
 * 
 * Set window.scrollOffset to the amount of pixels you want to offset 
 * between the window top and the target element
 */
document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      const element = document.querySelector(this.getAttribute('href'));

      if (window.scrollOffset != undefined) {

        const y = element.getBoundingClientRect().top + window.pageYOffset + window.scrollOffset;

        window.scrollTo({top: y, behavior: 'smooth'});
      } else {
        element.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });
});

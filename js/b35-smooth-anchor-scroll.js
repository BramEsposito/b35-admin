/**
 * Scrolls anchors into view
 *
 * Set b35_smooth_anchor_scroll.scrollOffset to the amount of pixels you want to offset
 * between the window top and the target element
 *
 * Example code:
 * ```
 * add_action( 'wp_enqueue_scripts', function() {
 *    wp_localize_script("wp-smooth-anchor-scroll" , 'b35_smooth_anchor_scroll',
 *      array(
 *        'scrollOffset' => -200,
 *      )
 *    );
 *  });
 * ```
 */

let destination = "";
if (window.location.hash) {
  destination = window.location.hash;
  window.location.hash = "";
}

document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();

      if( this.getAttribute('href') === "#" ) return;

      const element = document.querySelector(this.getAttribute('href'));

      if (b35_smooth_anchor_scroll != undefined && b35_smooth_anchor_scroll.scrollOffset != undefined) {

        const y = element.getBoundingClientRect().top + window.pageYOffset + parseInt(b35_smooth_anchor_scroll.scrollOffset);

        window.scrollTo({top: y, behavior: 'smooth'});
        return false;
      } else {
        element.scrollIntoView({
          behavior: 'smooth'
        });
        return false;
      }
    });
  });

  if (destination !== "") {

    // on page load
    $(document).ready(function(){
      $(window).load(function() {
        const element = document.querySelector(destination);
        if (element) {
          const y = element.getBoundingClientRect().top + window.pageYOffset + parseInt(b35_smooth_anchor_scroll.scrollOffset);

          window.scrollTo({top: y, behavior: 'smooth'});
        }
      });
    });
  }
});

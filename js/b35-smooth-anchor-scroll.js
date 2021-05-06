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
document.addEventListener("DOMContentLoaded", function() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      const element = document.querySelector(this.getAttribute('href'));

      if (b35_smooth_anchor_scroll.scrollOffset != undefined) {

        const y = element.getBoundingClientRect().top + window.pageYOffset + parseInt(b35_smooth_anchor_scroll.scrollOffset);

        window.scrollTo({top: y, behavior: 'smooth'});
      } else {
        element.scrollIntoView({
          behavior: 'smooth'
        });
      }
    });
  });
});

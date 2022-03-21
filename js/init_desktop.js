/* These scripts are executed on desktop only */
(function ($) {

  $(document).ready(function () {

    // Animate page elements on window scroll.
    // check demo here http://tympanus.net/Blueprints/OnScrollEffectLayout/
    new cbpScroller(document.getElementById('cbp-so-scroller'));

    // Parallax effect on the middle row background
    $('.row-middle').parallax('-20%', 1);

  });


})(jQuery);

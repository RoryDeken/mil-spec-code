(function ($) {

  /* ================= Configure functions  =================  */
  // Accordion on sidebar services menu.
  function menu_accordion() {

    // Add +/- icon to the parent items.
    $('.accordion .menu > li.menu-item-has-children > a').append('<em></em>');

    // Collapse all tabs + add span for better styling.
    var panels = $('.accordion .sub-menu').hide().find('a').wrapInner('<span></span>');

    // Expand section with active sub menu item when page loads.
    var current_tab = $('.accordion .sub-menu .current-menu-item').parent().show().prev().addClass('act');

    // Expand section with active top level item.
    $('.accordion .menu > li.current-menu-item .sub-menu').show();


    $('.accordion em').click(function () {
      $(this).parent().toggleClass('act').next().slideToggle();
      return false;
    });
  }

  // Open external links in the new window.
  function external_links() {
    $('a[rel*=external]').attr({'target': '_blank'});
  }

  $(document).ready(function () {

    /* Custom scripts */
    // Toggle active rows styles for the prices table.
    $('article table tr').click(function () {
      $(this).toggleClass('act');
    });

    // Back to top button.
    $('#back-to-top').on('click', function () {
      $('body,html').animate({
        scrollTop: 0
      }, 800);
      return false;
    });

    menu_accordion();

    external_links();

    // Wrap slider text button for styling purposes.
    $('.slider-text a').wrapInner('<span></span>');


    /* Initialize external plugins */

    // Owl Carousel for posts on the home page.
    $(".home-carousel").owlCarousel({
      items: 3,
      itemsDesktop: [1299, 3],
      itemsTablet: [992, 2],
      itemsMobile: [479, 1],
      navigationText: [
        "<i class='fa fa-chevron-left'></i> <span>prev</span>",
        "<i class='fa fa-chevron-right'></i> <span>next</span>"
      ],
      navigation: true,
      autoPlay: false
    });

    // Isotope for the Portfolio.
    var container = $('.isotope'),
      filterLinks = $('#filter-by a');

    filterLinks.click(function (e) {
      var selector = $(this).attr('data-filter');
      container.isotope({
        filter: '.' + selector,
        itemSelector: '.isotope-item',
        layoutMode: 'fitRows',
        animationEngine: 'best-available'
      });

      filterLinks.removeClass('active');
      $('#filter-by li').removeClass('current-cat');
      $(this).addClass('active');
      e.preventDefault();
    });

    // Equal height
    $('.khaki-block h2').matchHeight();

    /* Device dependent scripts */
    // Mobile call
    if ($(window).width() < 768) {
      // Mobile menu.
      $('nav#menu_mobile').mmenu();
    }
    // Not mobile
    else {
      // Default Menu dropdown.
      $('ul.main-menu').superfish();

      // Prettyphoto popup.
      $("a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        overlay_gallery: true
      });
    }


  });

  $(window).load(function () {

  })

})(jQuery);
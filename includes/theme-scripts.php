<?php
/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {

  /**
   * Script for device detection -> includes\mobile_Detect.php
   * used to connect scripts/styles on specific devices
   */
  $detect = new Mobile_Detect;

  /* ++++++++++ Styles ++++++++++ */
  // Load default stylesheet.
  wp_enqueue_style( 'default', get_stylesheet_uri() );

  // Bootstrap styles.
  // files contains only grid classes.
  wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );

  /* Custom fonts */
  wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic,700' );
  wp_enqueue_style( 'Oswald', '//fonts.googleapis.com/css?family=Oswald:400,300,700' );
  wp_enqueue_style( 'Font Awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

  // External plugins.
  wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css' ); // popup
  wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css' ); // mobile menu

  /**
   * Desktop specific styles
   */
  if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
    // animate page elements on window scroll.
    wp_enqueue_style( 'scroll animate', get_template_directory_uri() . '/css/scroll_animate.css' );
  }

  // Theme stylesheet.
  wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css', array(), '1.0.0', 'all' );

  /* ++++++++++ Scripts ++++++++++ */
  // Popup
  wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.4', TRUE );

  // Adaptive carousel
  wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1.0', TRUE );

  // Portfolio page gallery + filtering
  wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array( 'jquery' ), '', TRUE );

  // Equal heights.
  wp_enqueue_script( 'matchHeight', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array( 'jquery' ), '', TRUE );

  // Mobile menu
  wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '4.7.4', TRUE );

  // Dropdown menu.
  wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.min.js', array( 'jquery' ), '1.7.5', TRUE );


  if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
    /**
     * Desktop scripts here
     */

    // Custom select skin.
    wp_enqueue_script( 'sumoselect', get_template_directory_uri() . '/js/jquery.sumoselect.min.js', array( 'jquery' ), '', TRUE );

    // Parallax effect for rows background.
    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax.min.js', array( 'jquery' ), '1.0', TRUE );

    /**
     * Animate page elements on window scroll.
     * desktop only
     * @link http://tympanus.net/codrops/2013/07/18/on-scroll-effect-layout/
     */
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ), '1.0', TRUE );
    wp_enqueue_script( 'cbpScroller', get_template_directory_uri() . '/js/cbpScroller.js', array( 'jquery' ), '1.0', TRUE );
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), '1.0', TRUE );

    // Theme custom scripts.
    wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_desktop.js', array( 'jquery' ), '1.0', TRUE );

  } else {
    /**
     * Tablet & Mobile scripts.
     */
    // Theme custom scripts.
    wp_enqueue_script( 'init_touch', get_template_directory_uri() . '/js/init_touch.js', array( 'jquery' ), '1.0', TRUE );

  }

  /**
   * Theme custom scripts.
   */
  wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array( 'jquery' ), '', TRUE );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );
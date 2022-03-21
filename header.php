<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="icon"
        href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"
        type="image/x-icon"/>


  <?php wp_head(); ?>
</head>
<?php
$detect = new Mobile_Detect;
$cclass = '';
$cclass .= ' cbp-so-scroller';
// Desktop mode.
if ( ! $detect->isMobile() && ! $detect->isTablet() ) {
  $cclass .= ' desktop';
}
?>
<body <?php body_class( $cclass ); ?>>
<div id="cbp-so-scroller" class="hfeed site">

  <header id="masthead" class="site-header clearfix">
    <div id="logo" class="site-logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
         rel="home" title="<?php echo get_bloginfo( 'name' ); ?>">
        <img
          src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-khaki.png"
          alt="<?php echo get_bloginfo( 'description', 'display' ); ?>"/>
      </a>
    </div>

    <!--Primary menu-->
    <a href="#menu_mobile" id="hamburger"><span></span></a>

    <div class="nav-primary">
      <nav id="menu_mobile">
        <?php wp_nav_menu( array(
          'container'  => 'ul',
          'menu_class' => 'main-menu clearfix',
          'menu_id'    => 'primary',
          'menu'       => 'Primary'
        ) );
        ?>
      </nav>
    </div>

  </header>

  <div id="content">
    <?php if ( ! is_front_page() ) { ?>
    
      <?php if ( ! is_search() ) { ?>
        <div class="page-title">
          <div class="container">
            <?php get_template_part( 'template-parts/page-title' ); ?>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
    <div class="site-content">

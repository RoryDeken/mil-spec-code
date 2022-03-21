<?php
/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function theme_widgets_init() {

// Main Sidebar
// Location: right sidebar
  register_sidebar( array(
    'name'          => __( 'Sidebar' ),
    'id'            => 'sidebar',
    'description'   => __( 'Displayed in the Blog page template' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

// Sidebar Services
// Location: services single page
  register_sidebar( array(
    'name'          => __( 'Sidebar Secondary' ),
    'id'            => 'sidebar-secondary',
    'description'   => __( 'Outputs content in the Sidebar Right page template' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

// Footer blocks
// Footer
  register_sidebar( array(
    'name'          => __( 'Footer blocks' ),
    'id'            => 'footer-blocks',
    'description'   => __( 'Footer bottom blocks' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}

add_action( 'widgets_init', 'theme_widgets_init' );

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

</div><!-- .site-content -->
</div><!-- #content -->

<footer class="site-footer">
  <?php if ( get_page_template_slug( $post->ID ) == 'page-fullwidth.php' ) {
    if ( function_exists( 'show_text_block' ) ) {
      echo show_text_block( '2-columns-khaki' );
    }
  } ?>
  <div class="pre-footer clearfix">
    <div class="site-logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
         rel="home" title="<?php echo get_bloginfo( 'name' ); ?>">
        <img
          src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-khaki.png"
          alt="<?php echo get_bloginfo( 'description', 'display' ); ?>"/>
      </a>
    </div>
    <a href="#" id="back-to-top">
      <span>
        <i class="fa fa-arrow-circle-o-up"></i>
        <i class="fa fa-arrow-circle-up"></i>
        <em>Back to top</em>
      </span>
    </a>
  </div>
  <div class="footer-section clearfix">
    <?php wp_nav_menu( array(
      'container'  => 'ul',
      'menu_class' => 'footer-menu clearfix',
      'menu'       => 'Footer menu'
    ) );
    ?>
    <div class="widgets-area clearfix">
      <?php if ( ! dynamic_sidebar( 'Footer blocks' ) ) : ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="copyright">
    <?php if ( function_exists( 'show_text_block' ) ) {
      echo show_text_block( 'copyright', TRUE );
    } ?>
  </div>
</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>

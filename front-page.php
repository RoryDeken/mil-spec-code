<?php
/**
 * Home page template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 */


get_header(); ?>

<div class="container">
  <div class="row">
  <main>
    <?php
    // Start the loop.
    while (have_posts()) : the_post();

      // Include the page content template.
      get_template_part('content', 'page');

      // End the loop.
    endwhile;
    ?>

  </main>
  <!-- .site-main -->
</div><!-- .content-area -->
  </div>
<?php get_footer(); ?>

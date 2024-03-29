<?php
/**
 * The template for displaying page title.
 *
 */

if ( is_author() ) { ?>

  <h2 class="title"><?php _e( 'Recent Posts by', 'theme' ); ?>  <?php echo get_the_author(); ?></h2>
<?php } else {
  if ( is_archive() ) { ?>
    <h2 class="title">
      <?php if ( is_day() ) : /* if the daily archive is loaded */ ?>
        <?php printf( __( 'Daily Archives: <span>%s</span>' ), get_the_date() ); ?>
      <?php elseif ( is_month() ) : /* if the montly archive is loaded */ ?>
        <?php printf( __( 'Monthly Archives: <span>%s</span>' ), get_the_date( 'F Y' ) ); ?>
      <?php elseif ( is_year() ) : /* if the yearly archive is loaded */ ?>
        <?php printf( __( 'Yearly Archives: <span>%s</span>' ), get_the_date( 'Y' ) ); ?>
      <?php elseif ( is_post_type_archive( 'horoscope' ) ) : /* if the yearly archive is loaded */
        echo '<span>Horoscope</span> Archives'; ?>
      <?php elseif ( is_tax( 'horoscope_category' ) ) : /* if the yearly archive is loaded */
        global $wp_query;
        $term  = $wp_query->get_queried_object();
        $title = $term->name;
        echo '<span>' . $title . '</span> Archives'; ?>
      <?php else : /* if anything else is loaded, ex. if the tags or categories template is missing this page will load */ ?>
        <?php printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', FALSE ) . '</span>' ); ?>
      <?php endif; ?>
    </h2>

  <?php } elseif ( is_404() ) { ?>
    <h2 class="title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'theme' ); ?></h2>
  <?php }  elseif ( is_search() ) { ?>
    <h2 class="title"><?php _e( 'Search results', 'theme' ); ?></h2>
  <?php } else {
    echo '<h2 class="title">' . get_the_title() . '</h2>';
  }
}

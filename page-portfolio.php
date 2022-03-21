<?php
/**
 * Template Name: Portfolio
 */

get_header(); ?>

  <div class="container">

    <div class="row">

      <div class="col-sm-12 portfolio">

        <div id="content">
          <?php
          global $more;
          $more       = 0;
          $values     = get_post_custom_values( "category-include" );
          $cat        = $values[0];
          $catinclude = 'portfolio_category=' . $cat;

          $temp     = $wp_query;
          $wp_query = NULL;
          $wp_query = new WP_Query();
          $wp_query->query( "post_type=portfolio&" . $catinclude . "&paged=" . $paged . '&showposts=5' );

          if ( ! have_posts() ) { ?>
            <div id="post-0" class="post error404 not-found">
              <h3 class="entry-title portfolioCap"><?php _e( 'Not Found' ); ?></h3>

              <div class="entry-content">
                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.' ); ?></p>
              </div>
              <!-- .entry-content -->
            </div><!-- #post-0 -->
          <?php } ?>

          <!-- BEGIN Gallery -->
          <?php
          // Do not show filtering block if we are on the specific portfolio category page.
          if ( empty( $cat ) ) { ?>
            <div id="filter-by" class="clearfix">

              <?php
              $status_terms = get_terms( 'portfolio_category' );
              if ( ! empty( $status_terms ) && is_array( $status_terms ) ) { ?>
                <a href="#" data-filter="galleryItem" class="active"><?php _e( 'All', 'framework' ); ?></a>
                <?php
                foreach ( $status_terms as $status_term ) {
                  echo '<a href="' . get_term_link( $status_term->slug, $status_term->taxonomy ) . '" data-filter="' . $status_term->slug . '" title="' . sprintf( __( 'View all Properties having %s status', 'framework' ), $status_term->name ) . '">' . $status_term->name . '</a>';
                }
              }
              ?>
            </div>
          <?php } ?>

          <div id="galleryHolder" class="one_column">

            <ul class="isotope clearfix">
              <?php
              $i = 1;
              if ( have_posts() ) {
                while ( have_posts() ) : the_post();

                  $post_meta_data = get_post_custom( $post->ID );
                  $prettyType     = "prettyPhoto[gallery" . $i . "]";
                  foreach ( $post_meta_data['gallery'] as $value ) {
                    $term_list = '';
                    $terms     = get_the_terms( $post->ID, 'portfolio_category' );

                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                      foreach ( $terms as $term ) {
                        $term_list .= $term->slug;
                        $term_list .= ' ';
                      }
                    }
                    ?>

                    <li class="galleryItem isotope-item <?php echo $term_list; ?>">
                      <?php
                      $full_image_url = wp_get_attachment_url( $value, 'full' );
                      $image          = aq_resize( $full_image_url, 415, 300, TRUE ); //resize & crop img
                      /**
                       * Get current image caption.
                       * reference https://codex.wordpress.org/Function_Reference/wp_prepare_attachment_for_js
                       */
                      $attachment_data = wp_prepare_attachment_for_js( $value );
                      $caption         = $attachment_data['caption'];
                      $alt             = $attachment_data['alt'];
                      ?>

                      <a class="image-wrap" href="<?php echo $full_image_url; ?>" rel="<?php echo $prettyType; ?>">
                        <figure>
                          <span class="img-border">
                            <img src="<?php echo $image; ?>" alt="<? echo $alt; ?>">
                            <span class="zoom-icon"></span>
                          </span>
                          <figcaption>
                            <? if ( $caption != '' ) {
                              echo $caption;
                            } else {
                              the_title();
                            } ?>
                          </figcaption>
                        </figure>

                      </a>
                    </li>

                  <?php } ?>


                  <?php $i ++;
                endwhile;
              } ?>
            </ul>
            <div class="clear"></div>

          </div>
          <!-- END Gallery -->



          <?php get_template_part( 'includes/post-formats/post-nav' ); ?>
          <!-- Posts Navigation -->


          <?php $wp_query = NULL;
          $wp_query       = $temp; ?>
        </div>
        <!-- #content -->

      </div>
    </div>
  </div>

<?php get_footer(); ?>
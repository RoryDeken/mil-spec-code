<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-holder' ); ?>>

  <header class="entry-header">
    <?php if ( ! is_singular() ) : ?>
      <h3 class="entry-title">
        <a href="<?php the_permalink(); ?>" title="<?php _e( 'Permalink to:' ); ?> <?php the_title(); ?>">
          <?php the_title(); ?>
        </a>
      </h3>
    <?php else : ?>
      <!-- <h2 class="entry-title"><?php //the_title(); ?></h2> -->
    <?php endif; ?>
  </header>

  <?php get_template_part( 'includes/post-formats/post-meta' ); ?>

  <?php get_template_part( 'includes/post-formats/post-thumb' ); ?>




  <?php if ( ! is_singular() ) { ?>

    <div class="post-content">
      <?php
      $post_excerpt = 'true';
      //$post_excerpt = of_get_option( 'post_excerpt' );
      ?>
      <?php if ( $post_excerpt == 'true' || $post_excerpt == '' ) { ?>

        <div class="excerpt">


          <?php

          $content = get_the_content();
          $excerpt = get_the_excerpt();

          if ( has_excerpt() ) {

            echo my_string_limit_words( $excerpt, 75 );

          } else {

            if ( ! is_search() ) {

              echo my_string_limit_words( $content, 55 );

            } else {

              echo my_string_limit_words( $excerpt, 55 );

            }

          }


          ?>

        </div>


      <?php } ?>

      <a href="<?php the_permalink() ?>" class="details"><?php _e( 'Read more' ); ?></a>

    </div>

  <?php } else { ?>
    <div class="content">
      <?php the_content( '' ); ?>
    </div>
  <?php } ?>

</article>
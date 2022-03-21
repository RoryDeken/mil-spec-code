<?php

/**
 * Layout controls & grid markup based on Bootstrap v3.* framework.
 */

// Container
function container_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="container ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div> <!-- .container (end) -->';

  return $output;
}

add_shortcode( 'container', 'container_shortcode' );

// Row
function row_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="row ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div> <!-- .row (end) -->';

  return $output;
}

add_shortcode( 'row', 'row_shortcode' );

// Universal block wrapper for styling purposes.
function block_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="block ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div>';

  return $output;
}

add_shortcode( 'block', 'block_shortcode' );

// Wrapper element.
function wrapper_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $output = '<div class="wrapper ' . $class . '">';
  $output .= do_shortcode( $content );
  $output .= '</div>';

  return $output;
}

add_shortcode( 'wrapper', 'wrapper_shortcode' );


// Clear
function clear_shortcode( $atts, $content = NULL ) {

  $output = '<div class="clear"></div>';

  return $output;
}

add_shortcode( 'clear', 'clear_shortcode' );

/**
 * Columns: add bootstrap classes to make grid layout.
 * Eg.: [column class="col-sm-6"]
 */
function column_shortcode( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  $return = '<div class="' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'column', 'column_shortcode' );


/**
 * Columns with logical names
 * based on the same bootstrap classes
 * Eg.: one_half = column 50% width; one_fourth = column 25% width
 */
// one_half
function one_half_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-6 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_half', 'one_half_column' );

// one_third
function one_third_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-4 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_third', 'one_third_column' );

// two_third
function two_third_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-8 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'two_third', 'two_third_column' );

// one_fourth
function one_fourth_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-3 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_fourth', 'one_fourth_column' );

// three_fourth
function three_fourth_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-9 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'three_fourth', 'three_fourth_column' );

// one_sixth
function one_sixth_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-2 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'one_sixth', 'one_sixth_column' );

// five_sixth
function five_sixth_column( $atts, $content = NULL ) {
  //remove wrong nested <p>
  $content = remove_invalid_tags( $content, array( 'p' ) );

  extract( shortcode_atts( array(
    'class' => ''
  ), $atts ) );

  // add divs to the content
  $return = '<div class="col-sm-10 ' . $class . '">';
  $return .= do_shortcode( $content );
  $return .= '</div>';

  return $return;
}

add_shortcode( 'five_sixth', 'five_sixth_column' );


/**
 * Content selection
 */


// Recent Posts
// todo: make shortcode more flexible and universal, remove unused post formats; rename shortcode (eg.: content).
function shortcode_recent_posts( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'type'              => 'post',
    'category'          => '',
    'custom_category'   => '',
    'post_format'       => 'standard',
    'num'               => '-1',
    'meta'              => 'false',
    'meta_format'       => '',
    'thumb'             => 'false',
    'thumb_width'       => '120',
    'thumb_height'      => '120',
    'more_text_single'  => '',
    'excerpt_count'     => '0',
    'class'      => '',
    'class_item' => ''
  ), $atts ) );

  $output = '<ul class="recent-posts ' . $class . '">';

  global $post;
  global $my_string_limit_words;

  if ( $post_format == 'standard' ) {

    $args = array(
      'post_type'         => $type,
      'category_name'     => $category,
      $type . '_category' => $custom_category,
      'numberposts'       => $num,
      'orderby'           => 'post_date',
      'order'             => 'DESC',
      'tax_query'         => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'post_format',
          'field'    => 'slug',
          'terms'    => array(
            'post-format-aside',
            'post-format-gallery',
            'post-format-link',
            'post-format-image',
            'post-format-quote',
            'post-format-audio',
            'post-format-video'
          ),
          'operator' => 'NOT IN'
        )
      )
    );

  } else {

    $args = array(
      'post_type'         => $type,
      'category_name'     => $category,
      $type . '_category' => $custom_category,
      'numberposts'       => $num,
      'orderby'           => 'post_date',
      'order'             => 'DESC',
      'tax_query'         => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'post_format',
          'field'    => 'slug',
          'terms'    => array( 'post-format-' . $post_format )
        )
      )
    );

  }

  $latest = get_posts( $args );

  foreach ( $latest as $post ) {
    setup_postdata( $post );
    $excerpt        = get_the_excerpt( $post->ID );
    $attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    $url            = $attachment_url['0'];
    $image          = aq_resize( $url, $thumb_width, $thumb_height, TRUE );


    $post_classes = get_post_class();
    foreach ( $post_classes as $key => $value ) {
      $pos = strripos( $value, 'tag-' );
      if ( $pos !== FALSE ) {
        unset( $post_classes[ $i ] );
      }
    }
    $post_classes = implode( ' ', $post_classes );


    $output .= '<li class="' . $post_classes . ' ' . $class_item . '"><div class="wrapper">';


    // Aside
    if ( $post_format == "aside" ) {

      $output .= the_content( $post->ID );

      // Link
    } elseif ( $post_format == "link" ) {

      $url = get_post_meta( get_the_ID(), 'tz_link_url', TRUE );

      $output .= '<a target="_blank" href="' . $url . '">';
      $output .= get_the_title( $post->ID );
      $output .= '</a>';


      // Quote
    } elseif ( $post_format == "quote" ) {

      $quote = get_post_meta( get_the_ID(), 'tz_quote', TRUE );

      $output .= '<div class="quote-wrap clearfix">';

      $output .= '<blockquote>';
      $output .= $quote;
      $output .= '</blockquote>';

      $output .= '</div>';


      // Image
    } elseif ( $post_format == "image" ) {

      if ( has_post_thumbnail() ):

        $lightbox = get_post_meta( get_the_ID(), 'tz_image_lightbox', TRUE );

        $src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array(
          '9999',
          '9999'
        ), FALSE, '' );

        $thumb   = get_post_thumbnail_id();
        $img_url = wp_get_attachment_url( $thumb, 'full' ); //get img URL
        $image   = aq_resize( $img_url, 200, 120, TRUE ); //resize & crop img


        $output .= '<figure class="featured-thumbnail large">';
        $output .= '<a class="image-wrap" rel="prettyPhoto[gallery]" title="' . get_the_title( $post->ID ) . '" href="' . $src[0] . '">';
        $output .= '<img src="' . $image . '" alt="' . get_the_title( $post->ID ) . '" />';
        $output .= '<span class="zoom-icon"></span></a>';
        $output .= '</figure>';

      endif;


      // Audio
    } elseif ( $post_format == "audio" ) {

      $audio = get_post_meta( get_the_ID(), 'tz_audio_mp3', TRUE );

      $output .= '<div class="audio-wrapper">';
      $output .= '<audio src="' . stripslashes( htmlspecialchars_decode( $audio ) ) . '" preload="none"></audio>';
      $output .= '</div>';
      $output .= '<div class="entry-content">';
      $output .= get_the_content( $post->ID );
      $output .= '</div>';

      // Video
    } elseif ( $post_format == "video" ) {

      $embed = get_post_meta( get_the_ID(), 'tz_video_embed', TRUE );


      $output .= '<figure class="video-holder">';
      $output .= stripslashes( htmlspecialchars_decode( $embed ) );
      $output .= '</figure>';
      if ( $excerpt_count >= 1 ) {
        $output .= '<div class="excerpt">';
        $output .= my_string_limit_words( $excerpt, $excerpt_count );
        $output .= '</div>';
      }

      // Standard post format
    } else {

      if ( $thumb == 'true' ) {

        if ( has_post_thumbnail( $post->ID ) ) {
          $output .= '<figure class="featured-thumbnail"><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
          if ( $image ) {
            $output .= '<img  src="' . $image . '"/>';
          } else {
            $output .= '<img  src="' . $url . '"/>';
          }
          $output .= '</a></figure>';
          //$output .= $url;
        }
      }


      $output .= '<div class="wrap-info">';

      $output .= '<h5><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
      $output .= get_the_title( $post->ID );
      $output .= '</a></h5>';


      if ( $meta == 'true' ) {
        $output .= '<span class="meta">';
        $output .= '<span class="post-date">';
        if ( $meta_format == 'long' ) {
          $output .= get_the_time( 'j' ) . ' of ' . get_the_time( 'F, Y' );
        } else {
          $output .= '<span class="meta_day">' . get_the_time( 'd' ) . '/</span><span class="meta_mouths">' . get_the_time( 'm' ) . '/</span><span class="meta_year">' . get_the_time( 'Y' ) . '</span>';
        }
        $output .= '</span>';
        $output .= '</span>';
      }

      if ( $excerpt_count >= 1 ) {
        $output .= '<div class="excerpt">';
        $output .= my_string_limit_words( $excerpt, $excerpt_count );
        $output .= '</div>';
      }

      /**
       * Show author custom field
       * used in the Testimonials post type
       * reference http://codex.wordpress.org/Function_Reference/get_post_custom_values
       */
      $custom_field_author = get_post_custom_values( 'author' );
      if ( $custom_field_author ) {
        $output .= '<strong class="author">' . $custom_field_author[0] . '</strong>';
      }

      if ( $more_text_single != "" ) {
        $output .= '<a href="' . get_permalink( $post->ID ) . '" class="readmore" title="' . get_the_title( $post->ID ) . '">';
        $output .= $more_text_single;
        $output .= '</a>';
      }

      $output .= '</div>';

      //$output .= '<a class="boxCover" href="' . get_permalink( $post->ID ) . '"></a>';
    }


    $output .= '<div class="clear"></div>';
    $output .= '</div></li><!-- .entry (end) -->';

  }
  $output .= '</ul><!-- .recent-posts (end) -->';

  wp_reset_postdata();

  return $output;

}

add_shortcode( 'recent_posts', 'shortcode_recent_posts' );


// Recent Comments
function shortcode_recent_comments( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'num' => '5'
  ), $atts ) );

  global $wpdb;
  $sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
    comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved,
    comment_type,comment_author_url,
    SUBSTRING(comment_content,1,50) AS com_excerpt
    FROM $wpdb->comments
    LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
    $wpdb->posts.ID)
    WHERE comment_approved = '1' AND comment_type = '' AND
    post_password = ''
    ORDER BY comment_date_gmt DESC LIMIT " . $num;

  $comments = $wpdb->get_results( $sql );

  $output = '<ul class="recent-comments">';

  foreach ( $comments as $comment ) {

    $output .= '<li>';
    $output .= '<a href="' . get_permalink( $comment->ID ) . '#comment-' . $comment->comment_ID . '" title="on ' . $comment->post_title . '">';
    $output .= strip_tags( $comment->comment_author ) . ' : ' . strip_tags( $comment->com_excerpt ) . '...';
    $output .= '</a>';
    $output .= '</li>';

  }

  $output .= '</ul>';

  return $output;

}

add_shortcode( 'recent_comments', 'shortcode_recent_comments' );


// Popular Posts
function shortcode_popular_posts( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'num' => '5'
  ), $atts ) );

  $args = array(
    'numberposts' => $num,
    'orderby'     => 'comment_count',
    'order'       => 'DESC',
    'tax_query'   => array(
      'relation' => 'AND',
      array(
        'taxonomy' => 'post_format',
        'field'    => 'slug',
        'terms'    => array(
          'post-format-aside',
          'post-format-gallery',
          'post-format-link',
          'post-format-image',
          'post-format-quote',
          'post-format-audio',
          'post-format-video'
        ),
        'operator' => 'NOT IN'
      )
    )
  );

  $popular = get_posts( $args );

  $output = '<ul class="popular_posts">';

  foreach ( $popular as $post ) {

    setup_postdata( $post );
    $excerpt        = get_the_excerpt( $post->ID );
    $attachment_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
    $url            = $attachment_url['0'];
    $image          = aq_resize( $url, 138, 138, TRUE );

    $output .= '<li>';

    if ( has_post_thumbnail( $post->ID ) ) {
      $output .= '<figure class="featured-thumbnail"><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
      $output .= '<img  src="' . $image . '"/>';
      $output .= '</a></figure>';
    }

    $output .= '<h5><a href="' . get_permalink( $post->ID ) . '" title="' . get_the_title( $post->ID ) . '">';
    $output .= get_the_title( $post->ID );
    $output .= '</a></h5>';

    $output .= '<div class="excerpt">';
    $output .= my_string_limit_words( $excerpt, 20 );
    $output .= '</div>';
    $output .= '</li>';

  }

  $output .= '</ul>';

  return $output;

}

add_shortcode( 'popular_posts', 'shortcode_popular_posts' );


// Categories
// todo: needs testing -> try to show categories/taxonomies from custom post types(portfolio).
// taxonomy works but doesn`t work for default post
function shortcode_list_categories( $atts, $content = NULL ) {

  extract( shortcode_atts( array(
    'taxonomy'     => '',
    'title'        => '',
    'orderby'      => '',
    'order'        => '',
    'exclude'      => '',
    'include'      => '',
    'number'       => '',
    'hide_empty'   => '',
    'class' => ''
  ), $atts ) );

  $categories = get_categories( 'taxonomy=' . $taxonomy . '&exclude=' . $exclude . '&include=' . $include . '&number=' . $number . '&orderby=' . $orderby . '&order=' . $order . '&hide_empty=' . $hide_empty );

  $output = '';

  if ( ! empty( $title ) || $title != '' ) {
    $output .= '<h3 class="list_cats ' . $class . '-title">' . $title . '</h3>';
  }

  $output .= '<ul class="list_cats ' . $class . '">';
  foreach ( $categories as $category ) {
    $output .= '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name . '</a></li>';
  }
  $output .= '</ul>';

  return $output;
}

add_shortcode( 'list_categories', 'shortcode_list_categories' );


// Tag Cloud
function shortcode_tags( $atts, $content = NULL ) {

  $output = '<div class="tags-cloud clearfix">';

  $tags = wp_tag_cloud( 'smallest=8&largest=16&format=array' );

  foreach ( $tags as $tag ) {
    $output .= $tag . ' ';
  }

  $output .= '</div><!-- .tags-cloud (end) -->';

  return $output;

}

add_shortcode( 'tags', 'shortcode_tags' );


/**
 * Custom staff will go here
 */

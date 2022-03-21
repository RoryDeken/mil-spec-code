<?php

/**
 * Theme custom functions.
 *
 * */

// The excerpt based on words
function my_string_limit_words( $string, $word_limit ) {
  $words = explode( ' ', $string, ( $word_limit + 1 ) );
  if ( count( $words ) > $word_limit ) {
    array_pop( $words );
  }

  return implode( ' ', $words );
}

// Remove invalid tags
function remove_invalid_tags( $str, $tags ) {
  foreach ( $tags as $tag ) {
    $str = preg_replace( '#^<\/' . $tag . '>|<' . $tag . '>$#', '', trim( $str ) );
  }

  return $str;
}

// Remove Empty Paragraphs
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );
function shortcode_empty_paragraph_fix( $content ) {
  $array = array(
    '<p>['    => '[',
    ']</p>'   => ']',
    ']<br />' => ']'
  );

  $content = strtr( $content, $array );

  return $content;
}

// Generates a random string
function generate_random_string($length){

  srand((double)microtime()*1000000 );

  $random_id = "";

  $char_list = "abcdefghijklmnopqrstuvwxyz";

  for($i = 0; $i < $length; $i++) {
    $random_id .= substr($char_list,(rand()%(strlen($char_list))), 1);
  }

  return $random_id;
}

// Adds browser class to the body tag.
function custom_browser_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) {
    $classes[] = 'ie';
    if(preg_match('/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
      $classes[] = 'ie'.$browser_version[1];
  } else $classes[] = 'unknown';
  if($is_iphone) $classes[] = 'iphone';
  if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
    $classes[] = 'osx';
  } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
    $classes[] = 'linux';
  } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
    $classes[] = 'windows';
  }
  return $classes;
}
//add_filter('body_class','custom_browser_body_class');

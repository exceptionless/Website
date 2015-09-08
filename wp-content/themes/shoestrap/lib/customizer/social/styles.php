<?php

/*
 * Apply any css needed for the social sharing buttons.
 */
function shoestrap_social_share_styles() {

  $btn_color = get_theme_mod( 'shoestrap_buttons_color' );

  // Make sure colors are properly formatted
  $btn_color = '#' . str_replace( '#', '', $btn_color );
  
  // if no color has been selected, set to #0066cc. This prevents errors with the php-less compiler.
  if ( strlen( $btn_color ) < 3 ) {
    $btn_color = '#0066cc';
  }

  $styles = '<style type="text/css">';
  $styles .= '.shareme .social_icon{';
  if ( shoestrap_get_brightness( $btn_color ) >= 160 ) {
    $styles .= 'color: #333;';
  } else {
    $styles .= 'color: #fff;';
  }
  $styles .= '}';
  $styles .= '</style>';
  
  return $styles;
}
add_action( 'wp_head', 'shoestrap_social_share_styles' );

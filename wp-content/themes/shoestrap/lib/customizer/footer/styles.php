<?php

/*
 * Applies the background to the footer.
 */
function shoestrap_footer_css() {
  $back_color = get_theme_mod( 'shoestrap_footer_background_color' );
  $text_color = get_theme_mod( 'shoestrap_footer_text_color' );
  
  // Make sure colors are properly formatted
  $back_color = '#' . str_replace( '#', '', $back_color );
  $text_color = '#' . str_replace( '#', '', $text_color );
  
  $styles = '<style>';
  if ( strlen( $back_color ) < 6 ) {
    $styles .= '#footer-wrapper{ background: none; background: transparent; }';
  } else {
    $styles .= '#footer-wrapper{ background: ' . $back_color . ';}';
    if ( strlen( $text_color ) < 6 ) {
      if ( shoestrap_get_brightness( $back_color ) >= 160 ) {
          $styles .= '#footer-wrapper{ color: ' . shoestrap_adjust_brightness( $back_color, -150 ) . ';}';
          $styles .= '#footer-wrapper a{ color: ' . shoestrap_adjust_brightness( $back_color, -180 ) . ';}';
      } else {
        $styles .= '#footer-wrapper{ color: ' . shoestrap_adjust_brightness( $back_color, 150 ) . ';}';
        $styles .= '#footer-wrapper a{color: ' . shoestrap_adjust_brightness( $back_color, 180 ) . ';}';
      }
    } else {
      $styles .= '#footer-wrapper{ color: ' . $text_color . ';}';
      $styles .= '#footer-wrapper a{ color: ' . $text_color . ';}';
    }
  }
  $styles .= '</style>';
  
  return $styles;
}

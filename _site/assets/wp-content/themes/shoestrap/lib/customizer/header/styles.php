<?php

/*
 * Applies css to the branding area (extra header).
 */
function shoestrap_branding_css() {
  $header_bg_color        = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  $header_sitename_color  = get_theme_mod( 'shoestrap_header_textcolor' );
  
  // Make sure colors are properly formatted
  $header_bg_color        = '#' . str_replace( '#', '', $header_bg_color );
  $header_sitename_color  = '#' . str_replace( '#', '', $header_sitename_color );
  
  $styles = '<style>';
  $styles .= '.logo-wrapper{background: ' . $header_bg_color . ';}';
  $styles .= '.logo-wrapper .logo a{color: ' . $header_sitename_color . ';}';
  $styles .= '</style>';
  
  return $styles;
}

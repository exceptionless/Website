<?php

/*
 * Applies the selected styles to the hero area.
 * 
 * The call to action button styles are calculated using the phpless compiler
 * and a portion of bootstrap's buttons.less file that has been pasted here.
 */
function shoestrap_css_hero() {
  $shoestrap_header_mode            = get_theme_mod( 'shoestrap_header_mode' );
  $shoestrap_hero_background_color  = get_theme_mod( 'shoestrap_hero_background_color' );
  $shoestrap_hero_textcolor         = get_theme_mod( 'shoestrap_hero_textcolor' );
  $shoestrap_hero_background        = get_theme_mod( 'shoestrap_hero_background' );
  $shoestrap_hero_cta_color         = get_theme_mod( 'shoestrap_hero_cta_color' );
  $no_gradients                     = get_theme_mod( 'shoestrap_general_no_gradients' );
  
  if ( $shoestrap_hero_cta_color == 'default' ) {
    $shoestrap_hero_cta_color = '#ffffff';
  }
  
  // Compatibility hack for users that have upgraded from Shoestrap version 1.0.2 and below
  // and have not changed the button color. (Previously was class-based).
  if ($shoestrap_hero_cta_color == 'primary') { $shoestrap_hero_cta_color = '#0088cc'; }
  if ( $shoestrap_hero_cta_color == 'info' ) { $shoestrap_hero_cta_color = '#5bc0de'; }
  if ( $shoestrap_hero_cta_color == 'success' ) { $shoestrap_hero_cta_color = '#62c462'; }
  if ( $shoestrap_hero_cta_color == 'danger' ) { $shoestrap_hero_cta_color = '#ee5f5b'; }
  if ( $shoestrap_hero_cta_color == 'warning' ) { $shoestrap_hero_cta_color = '#f89406'; }
  if ( $shoestrap_hero_cta_color == 'inverse' ) { $shoestrap_hero_cta_color = '#444444'; }

  // Make sure colors are properly formatted
  $shoestrap_hero_background_color  = '#' . str_replace( '#', '', $shoestrap_hero_background_color );
  $shoestrap_hero_textcolor         = '#' . str_replace( '#', '', $shoestrap_hero_textcolor );
  $shoestrap_hero_cta_color         = '#' . str_replace( '#', '', $shoestrap_hero_cta_color );
  
  // if no color has been selected, set to #0066cc. This prevents errors with the php-less compiler.
  if ( strlen( $shoestrap_hero_cta_color ) < 3 ){
    $shoestrap_hero_cta_color = '#0066cc';
  }
  
  $styles = '<style>';
  if ( get_theme_mod( 'shoestrap_extra_branding' ) != 1 ) {
    $styles .= '.top-navbar .jumbotron{margin-top: -20px;}';
  }
  $styles .= '.jumbotron{';
  if ( $shoestrap_header_mode == 'navbar' ) {
    $styles .= 'margin-top: -17px;';
  }
  $styles .= 'background: ' . $shoestrap_hero_background_color . ' url("' . $shoestrap_hero_background . '");';
  $styles .= 'color: ' . $shoestrap_hero_textcolor . ';}';
  
  if ( shoestrap_get_brightness( $shoestrap_hero_cta_color ) <= 160) {
    $textColor = '#ffffff';
  } else {
    $textColor = '#333333';
  }
  
  $startColor = $shoestrap_hero_cta_color;
  $endColor   = shoestrap_adjust_brightness( $startColor, -63 );
  
  $styles .= '.jumbotron .btn{';
  $styles .= 'border: none;';
  $styles .= 'color: ' . $textColor . ';';
  
  if ( $no_gradients == 1 ) {
    $styles .= 'background-color: ' . $startColor . ';';
    $styles .= 'border: 0px;';
  } else {
    $styles .= 'background-color: ' . shoestrap_mix_colors( $startColor, $endColor, 60 ) . ';';
    $styles .= 'background-image: -moz-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
    $styles .= 'background-image: -webkit-gradient(linear, 0 0, 0 100%, from(' . $startColor . '), to(' . $endColor . '));';
    $styles .= 'background-image: -webkit-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
    $styles .= 'background-image: -o-linear-gradient(top, ' . $startColor . ', ' . $endColor . ');';
    $styles .= 'background-image: linear-gradient(to bottom, ' . $startColor . ', ' . $endColor . ');';
    $styles .= 'background-repeat: repeat-x;';
    $styles .= '*background-color: ' . $endColor . ';';
  }
  $styles .= '}';
  $styles .= '.jumbotron .btn:hover, .jumbotron .btn:active, .jumbotron .btn.active, .jumbotron .btn.disabled, .jumbotron .btn[disabled] {';
  $styles .= 'color: ' . $textColor . ';';
  $styles .= 'border: none;';
  $styles .= 'background-color: ' . $endColor . ';';
  $styles .= '*background-color: ' . shoestrap_adjust_brightness( $endColor, -12 ) . ';}';
  $styles .= '</style>';

  return $styles;
}

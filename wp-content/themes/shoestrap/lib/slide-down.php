<?php

/*
 * Calculates the class of the widget areas based on a 12-column bootstrap grid.
 */
function shoestrap_navbar_widget_area_class() {
  $str = '';
  if ( is_active_sidebar( 'navbar-slide-down-1' ) )
    $str .= '1';

  if ( is_active_sidebar( 'navbar-slide-down-2' ) )
    $str .= '2';

  if ( is_active_sidebar( 'navbar-slide-down-3' ) )
    $str .= '3';

  if ( is_active_sidebar( 'navbar-slide-down-4' ) )
    $str .= '4';
  
  $strlen = strlen( $str );
  
  if ( $strlen > 0 ) {
    $span = 12 / $strlen;
  } else {
    $span = 12;
  }
  
  return $span;
}

/*
 * Prints the content of the slide-down widget areas.
 */
function shoestrap_navbar_slidedown_content() {
  echo '<div id="megaDrop" class="container-fluid top-megamenu">';
  echo '<div class="container">';
  $widgetareaclass = 'span' . shoestrap_navbar_widget_area_class();
  
  dynamic_sidebar('navbar-slide-down-top');
  
  echo '<div class="row">';
  if ( is_active_sidebar( 'navbar-slide-down-1' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-1');
    echo '</div>';
    
  if ( is_active_sidebar( 'navbar-slide-down-2' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-2');
    echo '</div>';
    
  if ( is_active_sidebar( 'navbar-slide-down-3' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-3');
    echo '</div>';
    
  if ( is_active_sidebar( 'navbar-slide-down-4' ) )
    echo '<div class="' . $widgetareaclass . '">';
    dynamic_sidebar('navbar-slide-down-4');
    echo '</div>';
    
  echo '</div></div></div>';
}
add_action( 'shoestrap_nav_top_bottom', 'shoestrap_navbar_slidedown_content', 1 );

function shoestrap_navbar_slidedown_toggle() {
  $navbar_color     = get_theme_mod( 'shoestrap_navbar_color' );
  
  if ( is_active_sidebar( 'navbar-slide-down-top' ) || is_active_sidebar( 'navbar-slide-down-1' ) || is_active_sidebar( 'navbar-slide-down-2' ) || is_active_sidebar( 'navbar-slide-down-3' ) || is_active_sidebar( 'navbar-slide-down-4' ) ) {
    if ( shoestrap_get_brightness( $navbar_color ) >= 160 ) {
      echo '<a style="width: 30px;" class="toggle-nav black" href="#"></a>';
    } else {
      echo '<a style="width: 30px;" class="toggle-nav" href="#"></a>';
    }
  }
}
add_action( 'shoestrap_primary_nav_top_left', 'shoestrap_navbar_slidedown_toggle' );
<?php

/*
 * This function can be used to compile a less file to css
 */
function shoestrap_phpless( $inputFile, $outputFile ) {

  if ( !class_exists( 'lessc' ) ) {
    require_once locate_template( '/lib/less_compiler/lessc.inc.php' );
  }
  $less = new lessc;

  if ( get_option( 'shoestrap_minimize_css' ) == 1 ) {
    $less->setFormatter( "compressed" );
  }

  // create a new cache object, and compile
  $cache = $less -> cachedCompile( $inputFile );

  file_put_contents( $outputFile, $cache["compiled"] );

  // the next time we run, write only if it has updated
  $last_updated = $cache['updated'];
  $cache = $less -> cachedCompile( $cache );
  if ( $cache['updated'] > $last_updated ) {
    file_put_contents( $outputFile, $cache['compiled'] );
  }
}

/*
 * Runs the compiler function shoestrap_phpless
 * for all files that need compiling
 */
function shoestrap_phpless_compile() {

  $app_less                         = locate_template( 'assets/less/app-gradients-radius.less' );
  $app_css                          = locate_template( 'assets/css/app.css' );

  $app_no_radius_less               = locate_template( 'assets/less/app-no-radius.less' );
  $app_no_radius_css                = locate_template( 'assets/css/app-no-radius.css' );

  $app_no_gradients_less            = locate_template( 'assets/less/app-no-gradients.less' );
  $app_no_gradients_css             = locate_template( 'assets/css/app-no-gradients.css' );

  $app_no_gradients_no_radius_less  = locate_template( 'assets/less/app-no-gradients-no-radius.less' );
  $app_no_gradients_no_radius_css   = locate_template( 'assets/css/app-no-gradients-no-radius.css' );

  $responsive_less                  = locate_template( 'assets/less/responsive.less' );
  $responsive_css                   = locate_template( 'assets/css/responsive.css' );

  if ( get_option( 'shoestrap_dev_mode' ) == 1 && get_option( 'shoestrap_advanced_compiler' ) == 1 ) {
    shoestrap_phpless( $app_less, $app_css );                                               // compiling the default styles
    shoestrap_phpless( $app_no_radius_less, $app_no_radius_css );                           // compiling no-radius styles
    shoestrap_phpless( $app_no_gradients_less, $app_no_gradients_css );                     // compiling no-gradients styles
    shoestrap_phpless( $app_no_gradients_no_radius_less, $app_no_gradients_no_radius_css ); // compiling no-gradients, no-radius styles
    shoestrap_phpless( $responsive_less, $responsive_css );                                 // compiling responsive styles
  }
}
add_action('wp', 'shoestrap_phpless_compile');

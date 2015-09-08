<?php

add_theme_support( 'custom-background' );

$files    = array();
// Textarea Control
$files[]  = array( 'filename' => '/lib/customizer/functions/custom-controls.php' );
// Extra Functions for the customizer
$files[]  = array( 'filename' =>  '/lib/customizer/functions/remove-controls.php' );
// Login screen customizations
$files[]  = array( 'filename' => '/lib/customizer/functions/login.php' );
// Color functions
$files[]  = array( 'filename' => '/lib/customizer/functions/color-functions.php' );
// General Customizer
$files[]  = array( 'filename' => '/lib/customizer/general/functions.php' );
// NavBar Customizer
$files[]  = array( 'filename' => '/lib/customizer/navbar/functions.php' );
// Hero Customizer
$files[]  = array( 'filename' => '/lib/customizer/hero/functions.php' );
// Typography Customizer
$files[]  = array( 'filename' => '/lib/customizer/typography/functions.php' );
// Background Customizer
$files[]  = array( 'filename' => '/lib/customizer/background/functions.php' );
// Logo Customizer
$files[]  = array( 'filename' => '/lib/customizer/logo/functions.php' );
// Header Customizer
$files[]  = array( 'filename' => '/lib/customizer/header/functions.php' );
// Layout Customizer
$files[]  = array( 'filename' => '/lib/customizer/layout/functions.php' );
// Social Customizer
$files[]  = array( 'filename' => '/lib/customizer/social/functions.php' );
// Footer Customizer
$files[]  = array( 'filename' => '/lib/customizer/footer/functions.php' );
// Featured Image Customizer
$files[]  = array( 'filename' => '/lib/customizer/featured-image/functions.php' );
// Advanced Customizer
$files[]  = array( 'filename' => '/lib/customizer/advanced/functions.php' );

// The below files apply the selected styles
// depending on our customizer selections

// Branding (header) region, containing the logo etc.
$files[]  = array( 'filename' => '/lib/customizer/header/styles.php' );
// Page and wrap background
$files[]  = array( 'filename' => '/lib/customizer/background/styles.php' );
// NavBar styles
$files[]  = array( 'filename' => '/lib/customizer/navbar/styles.php' );
// Buttons Customizer
$files[]  = array( 'filename' => '/lib/customizer/buttons/functions.php' );
// Typography styles
$files[]  = array( 'filename' => '/lib/customizer/typography/styles.php' );
// Buttons styles
$files[]  = array( 'filename' => '/lib/customizer/buttons/styles.php' );
// Webfont functions
$files[]  = array( 'filename' => '/lib/customizer/typography/webfonts-functions.php' );
// Hero styles
$files[]  = array( 'filename' => '/lib/customizer/hero/styles.php' );
// Social Sharing Styles
$files[]  = array( 'filename' => '/lib/customizer/social/styles.php' );
// Footer Styles
$files[]  = array( 'filename' => '/lib/customizer/footer/styles.php' );


// Load the advanced customizer only if
// * the user has enabled it
// * it is not on a multisite installation, or is multisite and the user is superadmin
// * the files that must be written are not read-only

// Determine if the user is using the advanced builder or not
$advanced_builder = get_option('shoestrap_advanced_compiler');
// Turn off the advanced builder on multisite if the user is not superadmin
if ( is_multisite() && !is_super_admin() ) {
  $advanced_builder == '';
}
if ( $advanced_builder == 1 && ( shoestrap_check_files_permissions( true ) != true ) ) {
  // Custom Bootstrap Builder
  $files[]  = array( 'filename' => '/lib/customizer/custom-builder/custom-builder.php');
}

// Caching functions
$files[]  = array( 'filename' => '/lib/customizer/functions/caching.php' );


foreach( $files as $file ) {
  if ( file_exists( locate_template( $file ) ) ) {
    require_once locate_template( $file );
  }
}

/**
 * Used by Shoestrap_Google_WebFont_Control
 *
 * Adds extra javascript actions to the theme customizer editor
 */
function shoestrap_customizer_live_preview()
{
  wp_register_script('theme_customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', false, null, true);
  wp_enqueue_script('theme_customizer');
}
add_action( 'customize_controls_init', 'shoestrap_customizer_live_preview' );
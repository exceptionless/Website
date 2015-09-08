<?php
/**
 * Shoestrap configuration
 */

// Enable theme features

if ( get_option( 'shoestrap_root_relative_urls' ) )
  add_theme_support('root-relative-urls');    // Enable relative URLs

if ( get_option( 'shoestrap_root_relative_urls' ) )
  add_theme_support('rewrite-urls');          // Enable URL rewrites

if ( get_theme_mod( 'shoestrap_navbar_top' ) == 1 )
  add_theme_support('bootstrap-top-navbar');  // Enable Bootstrap's fixed navbar

add_theme_support('h5bp-htaccess');         // Enable HTML5 Boilerplate's .htaccess
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN

/**
 * Define which pages shouldn't have any sidebars
 *
 * See lib/sidebar.php for more details
 */
function shoestrap_display_sidebar() {
  if ( get_theme_mod( 'shoestrap_sidebar_on_front' ) != 'show') {
    $sidebar_config = new Shoestrap_Sidebar(
      array(
        'is_404',
        'is_front_page'
      ),
      array(
        'page-custom.php'
      )
    );
  } else {
    $sidebar_config = new Shoestrap_Sidebar(
      array(
        'is_404',
      ),
      array(
        'page-custom.php'
      )
    );
  }

  return $sidebar_config->display;
}

/**
 * Define which pages shouldn't have the primary sidebar
 *
 * See lib/sidebar.php for more details
 */
function shoestrap_display_primary_sidebar() {
  if ( get_theme_mod( 'shoestrap_sidebar_on_front' ) != 'show') {
    $sidebar_config = new Shoestrap_Sidebar(
      array(
        'is_404',
        'is_front_page'
      ),
      array(
        'page-full.php'
      )
    );
  } else {
    $sidebar_config = new Shoestrap_Sidebar(
      array(
        'is_404',
      ),
      array(
        'page-full.php'
      )
    );
  }

  return $sidebar_config->display;
}

/**
 * Define which pages shouldn't have the secondary sidebar
 *
 * See lib/sidebar.php for more details
 */
function shoestrap_display_secondary_sidebar() {
  if ( get_theme_mod( 'shoestrap_sidebar_on_front' ) != 'show') {
    $sidebar_config = new Shoestrap_Sidebar(
      array(
        'is_404',
        'is_front_page'
      ),
      array(
        'page-full.php',
        'page-primary-sidebar.php'
      )
    );
  } else {
    $sidebar_config = new Shoestrap_Sidebar(
      array(
        'is_404',
      ),
      array(
        'page-full.php',
        'page-primary-sidebar.php'
      )
    );
  }

  return $sidebar_config->display;
}

// #main CSS classes
function shoestrap_main_class() {
  if (shoestrap_display_sidebar()) {
    $class = shoestrap_sidebar_class_calc( 'main' );
  } else {
    $class = 'span12';
  }

  return $class;
}

// #sidebar CSS classes
function shoestrap_sidebar_class( $sidebar = 'primary' ) {
  if ( $sidebar == 'secondary' ) {
    return shoestrap_sidebar_class_calc( 'secondary' );
  } else {
    return shoestrap_sidebar_class_calc( 'primary' );
  }
}

// Configuration values
define('GOOGLE_ANALYTICS_ID', ''); // UA-XXXXX-Y
define('GOOGLE_FONTS_API_KEY', ''); // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
define('POST_EXCERPT_LENGTH', 80);

/**
* $content_width is a global variable used by WordPress for max image upload sizes and media embeds (in pixels)
*
* Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
*
* Default: 940px is the default Bootstrap container width.
*
* This is not required or used by Shoestrap.
*/
if (!isset($content_width)) { $content_width = 940; }
<?php
/**
 * Scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/bootstrap.css
 * 2. /theme/assets/css/bootstrap-responsive.css
 * 3. /theme/assets/css/app.css
 * 4. /child-theme/style.css (if a child theme is activated)
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.9.1.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/vendor/bootstrap.min.js
 * 4. /theme/assets/js/main.js
 */

function shoestrap_scripts() {
  $shoestrap_responsive   = get_theme_mod( 'shoestrap_responsive' );
  $footer_scripts         = get_option( 'shoestrap_load_scripts_on_footer' );
  $no_radius              = get_theme_mod( 'shoestrap_general_no_radius' );
  $no_gradients           = get_theme_mod( 'shoestrap_general_no_gradients' );
  $use_default_js_version = get_option( 'shoestrap_use_default_js_version' );
  $hero_title_fittext     = get_theme_mod( 'shoestrap_hero_title_fittext' );

  if ( $footer_scripts == 1 )
    $h_f = true;
  else
    $h_f = false;

  if ( $no_gradients == 1 ) {
    if ( $no_radius == 1 ) {
      wp_enqueue_style('shoestrap_app', get_template_directory_uri() . '/assets/css/app-no-gradients-no-radius.css', false, null);
    } else {
      wp_enqueue_style('shoestrap_app', get_template_directory_uri() . '/assets/css/app-no-gradients.css', false, null);
    }
  } else {
    if ( $no_radius == 1 ) {
      wp_enqueue_style('shoestrap_app', get_template_directory_uri() . '/assets/css/app-no-radius.css', false, null);
    } else {
      wp_enqueue_style('shoestrap_app', get_template_directory_uri() . '/assets/css/app.css', false, null);
    }
  }

  if ( $shoestrap_responsive != '0' ) {
    wp_enqueue_style('shoestrap_app_responsive', get_template_directory_uri() . '/assets/css/responsive.css', false, null);
  }

  // Load style.css from child theme
  if (is_child_theme()) {
    wp_enqueue_style('shoestrap_child', get_stylesheet_uri(), false, null);
  }

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if ( !is_admin() && current_theme_supports( 'jquery-cdn' ) && $use_default_js_version != 1 ) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', false, null, $h_f);
    add_filter('script_loader_src', 'shoestrap_jquery_local_fallback', 10, 2);
  }

  if ( $h_f == false ) {
    if (is_single() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }
  }

  if ( $hero_title_fittext == 1 ) {
    wp_register_script('shoestrap_fittext', get_template_directory_uri() . '/assets/js/vendor/jquery.fittext.js', false, null, $h_f);
  }



  wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2.min.js', false, null, $h_f);
  wp_register_script('shoestrap_main', get_template_directory_uri() . '/assets/js/main.js', false, null, $h_f);
  wp_enqueue_script('jquery');
  wp_enqueue_script('modernizr');
  wp_enqueue_script('shoestrap_main');

  if ( $hero_title_fittext == 1 ) {
    wp_enqueue_script('shoestrap_fittext');
  }
}
add_action('wp_enqueue_scripts', 'shoestrap_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function shoestrap_jquery_local_fallback($src, $handle) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}

function shoestrap_remove_script_version( $src ){
  return preg_replace('/[?&]ver=[0-9a-z._-]*($|#|&)/i', '$1', $src);
}
add_filter( 'script_loader_src', 'shoestrap_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', 'shoestrap_remove_script_version', 15, 1 );

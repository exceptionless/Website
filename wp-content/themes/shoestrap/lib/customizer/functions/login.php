<?php
/*
Description: Customize WordPress Login Screen with options made in customizer.
*/

function shoestrap_login_scripts() { 
  if ( get_theme_mod( 'shoestrap_logo' ) ) {
    $login_logo = get_theme_mod( 'shoestrap_logo' );
  }
  if ( get_theme_mod( 'shoestrap_background_color' ) ) {
    $background_color = get_theme_mod( 'shoestrap_background_color' );
  }
  if ( get_theme_mod( 'shoestrap_header_backgroundcolor' ) ) {
    $header_bg_color = get_theme_mod( 'shoestrap_header_backgroundcolor' );
  }
  if ( get_theme_mod( 'shoestrap_header_textcolor' ) ) {
    $header_sitename_color = get_theme_mod( 'shoestrap_header_textcolor' );
  }
  if ( get_theme_mod( 'shoestrap_buttons_color' ) ) {
    $btn_color = get_theme_mod( 'shoestrap_buttons_color' );
  }
  if ( get_theme_mod( 'shoestrap_link_color' ) ) {
    $link_color = get_theme_mod( 'shoestrap_link_color' );
  }
  if ( get_theme_mod( 'shoestrap_google_webfonts' ) ) {
    $google_webfonts = get_theme_mod( 'shoestrap_google_webfonts' );
  }

  // Make sure colors are properly formatted
  $btn_color = '#' . str_replace( '#', '', $btn_color );
  // if no color has been selected, set to #0066cc. This prevents errors with the php-less compiler.
  if ( strlen( $btn_color ) < 3 ) {
    $btn_color = '#0066cc';
  }
  if ( get_theme_mod( 'shoestrap_flat_buttons' ) == 1 ) {
    $btnColorHighlight = $btn_color;
  } else {
    $btnColorHighlight = shoestrap_adjust_brightness( $btn_color, -63 );
  }

  if ( shoestrap_get_brightness( $btn_color ) <= 160) {
    $textColor = '#ffffff';
  } else {
    $textColor = '#333333';
  }
  $startColor = $btn_color;
  $endColor   = $btnColorHighlight;
?>
  <style type="text/css">
    body.login {
      background: <?php echo $background_color ?>;
      background-size: contain;
      font-family: <?php echo $google_webfonts ?>;
    }
    body.login div#login h1 a {
<?php 
  if ( isset($login_logo) ) {
?>
      background-image: url(<?php echo $login_logo ?>);
      padding-bottom: 30px;
<?php 
  } else {
?>
      background: <?php echo $header_bg_color ?>;
      text-indent: 0px;
      text-align: center;
      padding: 10px 0 10px 0;
      height: auto;
<?php 
  }
?>
      
      margin: 0 auto;
    }
    .login form {
      background: <?php echo $background_color ?>;
      border: 0px;
      border-width: 0px;
      border-style: none;
      -ms-box-shadow: none;
      -webkit-box-shadow: none;
      -o-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      -ms-border-radius: 0px;
      -webkit-border-radius: 0px;
      -o-border-radius: 0px;
      -moz-border-radius: 0px;
      border-radius: 0px;
    }
    #nav, #backtoblog {
      position: relative;
      left: 0px;
    }
    .login .message {
      background-color: <?php echo $background_color ?>;
      -ms-box-shadow: none;
      -webkit-box-shadow: none;
      -o-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
    }
    .login #nav a, .login #backtoblog a, a, a.active, a:hover, a.hover, a.visited, a:visited, a.link, a:link {
      color: <?php echo $link_color ?>;
      text-decoration: none;
    }
    #wp-submit.button-primary {
      color: <?php echo $textColor ?>;
      background-color: <?php shoestrap_mix_colors( $startColor, $endColor, 60 ) ?>;
      background-image: -moz-linear-gradient(top, <?php echo $startColor ?>, <?php echo $endColor ?> );
      background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $startColor ?>), to(<?php echo $endColor ?>));
      background-image: -webkit-linear-gradient(top, <?php echo $startColor ?>, <?php echo $endColor ?> );
      background-image: -o-linear-gradient(top, <?php echo $startColor ?>, <?php echo $endColor ?> );
      background-image: linear-gradient(to bottom, <?php echo $startColor ?>, <?php echo $endColor ?> );
      background-repeat: repeat-x;';
      *background-color: <?php echo $endColor ?>;
      }
    .btn:hover, .btn-primary:hover, .btn-primary:active, .btn::active, .btn-primary.active .btn.active, .btn-primary.disabled, .btn.disabled, .btn-primary[disabled] .btn[disabled] {
      color: <?php echo $textColor ?>;
      background-color: <?php echo $endColor ?>;
      *background-color: <?php shoestrap_adjust_brightness( $endColor, -12 ) ?>;
    }
    </style>  
<?php 
}
add_action( 'login_enqueue_scripts', 'shoestrap_login_scripts' );

/* Login Links */
function shoestrap_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'shoestrap_login_logo_url' );

function shoestrap_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'shoestrap_login_logo_url_title' );

/*
 * Set cache for 24 hours
 */
function shoestrap_login_scripts_cache() {
  $data = get_transient( 'shoestrap_login_scripts' );
  if ( $data === false ) {
    $data = shoestrap_login_scripts();
    set_transient( 'shoestrap_login_scripts', $data, 3600 * 24 );
  }
  echo $data;
}
add_action( 'login_enqueue_scripts', 'shoestrap_login_scripts_cache' );

/*
 * Reset cache when in customizer
 */
function shoestrap_login_scripts_cache_reset() {
  delete_transient( 'shoestrap_login_scripts' );
  shoestrap_login_scripts_cache();
}
add_action( 'customize_preview_init', 'shoestrap_login_scripts_cache_reset' );
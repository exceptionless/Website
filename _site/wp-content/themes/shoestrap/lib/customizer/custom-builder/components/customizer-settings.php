<?php

/*
 * Adds settings to the customizer
 */
function shoestrap_custom_builder_register_settings( $wp_customize ){
  $settings   = array();
  
  // Typography
  $settings[]  = array( 'slug' => 'strp_cb_sansfont',         'default' => '"Helvetica Neue", Helvetica, Arial, sans-serif' );
  $settings[]  = array( 'slug' => 'strp_cb_serifont',         'default' => 'Georgia, "Times New Roman", Times, serif' );
  $settings[]  = array( 'slug' => 'strp_cb_monofont',         'default' => 'Monaco, Menlo, Consolas, "Courier New", monospace' );
  $settings[]  = array( 'slug' => 'strp_cb_basefontsize',     'default' => '14' );
  $settings[]  = array( 'slug' => 'strp_cb_baselineheight',   'default' => '20' );
  $settings[]  = array( 'slug' => 'strp_cb_fontsizelarge',    'default' => '1.25' );
  $settings[]  = array( 'slug' => 'strp_cb_fontsizesmall',    'default' => '0.85' );
  $settings[]  = array( 'slug' => 'strp_cb_fontsizemini',     'default' => '0.75' );
  
  // Radius
  $settings[]  = array( 'slug' => 'strp_cb_baseborderradius', 'default' => '4' );
  
  // Layout
  $settings[]  = array( 'slug' => 'strp_cb_gridwidth_normal', 'default' => '940' );
  $settings[]  = array( 'slug' => 'strp_cb_gridwidth_wide',   'default' => '1200' );
  $settings[]  = array( 'slug' => 'strp_cb_gridwidth_narrow', 'default' => '768' );
  $settings[]  = array( 'slug' => 'strp_cb_gridgutter_normal','default' => '20' );
  $settings[]  = array( 'slug' => 'strp_cb_gridgutter_wide',  'default' => '30' );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array(
        'default'     => $setting['default'],
        'type'        => 'theme_mod',
        'capability'  => 'edit_theme_options'
    ));
  }
}
add_action( 'customize_register', 'shoestrap_custom_builder_register_settings' );

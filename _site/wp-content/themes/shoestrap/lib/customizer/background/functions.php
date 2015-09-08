<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_background_customizer( $wp_customize ){

  // Adds compatibility with wordpress's default background color control.
  $background_color = get_theme_mod( 'background_color' );
  $background_color = '#' . str_replace( '#', '', $background_color );
  set_theme_mod( 'background_color', get_theme_mod( 'shoestrap_background_color' ) );

  $background_color_help = __( 'You can use the above color control to select a background color for your page', 'shoestrap' );

  $settings   = array();
  // Color Settings
  $settings[] = array( 'slug' => 'shoestrap_background_color',          'default' => '#ffffff' );
  $settings[] = array( 'slug' => 'shoestrap_background_color_help',     'default' => $background_color_help );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Remove the default "background" control
  $wp_customize->remove_control( 'background_color' );

  /*
   * Color Controls
   */
  $color_controls   = array();

  // Background Color
  $color_controls[] = array( 'setting' => 'shoestrap_background_color', 'label' => 'Background Color', 'section' => 'colors', 'priority' => 1 );

  foreach( $color_controls as $control ){
    $wp_customize->add_control( new WP_Customize_Color_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority'],
      )
    ));
  }

  // Background color help text
  $wp_customize->add_control( new Shoestrap_Customize_Label_Control( $wp_customize, 'shoestrap_background_color_help', array(
    'label'       => $background_color_help,
    'section'     => 'colors',
    'settings'    => 'shoestrap_background_color_help',
    'priority'    => 2,
  )));
}
add_action( 'customize_register', 'shoestrap_background_customizer' );

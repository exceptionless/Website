<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_buttons_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_buttons', 'title' => __( 'Buttons', 'shoestrap' ), 'priority' => 9 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $buttons_color_help = __( 'Choose the color for your buttons above', 'shoestrap' );
  $flat_buttons_help  = __( 'If you don\'t want to use gradients in your buttons, check the option above', 'shoestrap' );

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_buttons_color', 'default' => '#0066bb' );
  $settings[] = array( 'slug' => 'shoestrap_flat_buttons',  'default' => '' );

  $settings[] = array( 'slug' => 'shoestrap_buttons_color_help', 'default' => $buttons_color_help );
  $settings[] = array( 'slug' => 'shoestrap_flat_buttons_help',  'default' => $flat_buttons_help );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Buttons Color
  $color_controls   = array();
  $color_controls[] = array( 'setting' => 'shoestrap_buttons_color', 'label' => 'Buttons Color', 'section' => 'shoestrap_buttons', 'priority' => 1 );

  $help_controls    = array();
  $help_controls[]  = array( 'setting' => 'shoestrap_buttons_color_help', 'label' => $buttons_color_help, 'section' => 'shoestrap_buttons', 'priority' => 2 );
  $help_controls[]  = array( 'setting' => 'shoestrap_flat_buttons_help',  'label' => $flat_buttons_help,  'section' => 'shoestrap_buttons', 'priority' => 4 );

  /*
   * Checkbox Controls
   */
  $checkbox_controls = array();
  // Flat buttons on/off
  $checkbox_controls[] = array( 'setting' => 'shoestrap_flat_buttons', 'label' => 'Flat Buttons (no gradients)', 'section' => 'shoestrap_buttons', 'priority' => 3 );

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

  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }

  foreach ( $help_controls as $control ) {
    $wp_customize->add_control( new Shoestrap_Customize_Label_Control( $wp_customize, $control['setting'], array(
      'label'       => $control['label'],
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'priority'    => $control['priority'],
    )));
  }

}
add_action( 'customize_register', 'shoestrap_buttons_customizer' );

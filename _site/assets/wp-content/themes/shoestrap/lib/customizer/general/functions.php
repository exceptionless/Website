<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_general_customizer( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_general', 'title' => __( 'General', 'shoestrap' ), 'priority' => 1 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $no_gradients_help  = __ ('By selecting this option, all gradients will be removed and solid colors will be used instead, giving a cleaner look to your site.', 'shoestrap' );
  $no_radius_help     = __( 'By selecting this option. all round corners will be removed from your website (buttons etc) giving a more straight look to your site', 'shoestrap' );

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_general_no_gradients',      'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_general_no_radius',         'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_general_no_gradients_help', 'default' => $no_gradients_help );
  $settings[] = array( 'slug' => 'shoestrap_general_no_radius_help',    'default' => $no_radius_help );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Checkbox Controls
  $checkbox_controls    = array();
  $checkbox_controls[]  = array( 'setting' => 'shoestrap_general_no_gradients',       'label' => 'No Gradients',    'section' => 'shoestrap_general',  'priority' => 1 );
  $checkbox_controls[]  = array( 'setting' => 'shoestrap_general_no_radius',          'label' => 'No Border Radius','section' => 'shoestrap_general',  'priority' => 3 );

  $help_controls        = array();
  $help_controls[]      = array( 'setting' => 'shoestrap_general_no_gradients_help',  'label' => $no_gradients_help,'section' => 'shoestrap_general',  'priority' => 2 );
  $help_controls[]      = array( 'setting' => 'shoestrap_general_no_radius_help',     'label' => $no_radius_help,   'section' => 'shoestrap_general',  'priority' => 4 );

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
add_action( 'customize_register', 'shoestrap_general_customizer' );

<?php

/*
 * Creates the section, settings and the controls for the customizer
 */
function shoestrap_logo_customizer( $wp_customize ){

  $shoestrap_logo_helptext  = __( 'You can upload an image to be used as your site\'s logo here', 'shoestrap' );
  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_logo',          'default' => '' );
  $settings[] = array( 'slug' => 'shoestrap_logo_helptext', 'default' => $shoestrap_logo_helptext );

  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_logo',              'title' => __( 'Logo', 'shoestrap' ),             'priority' => 1 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $image_controls   = array();
  $image_controls[] = array( 'setting' => 'shoestrap_logo',           'label' => 'Logo Image',            'section' => 'shoestrap_logo',  'priority' => 2 );

  $help_controls    = array();
  $help_controls[]  = array( 'setting' => 'shoestrap_logo_helptext',  'label' => $shoestrap_logo_helptext,'section' => 'shoestrap_logo',  'priority' => 3 );

  foreach ( $image_controls as $control ) {
    $wp_customize->add_control( new WP_Customize_Image_Control(
      $wp_customize,
      $control['setting'],
      array(
        'label'     => __( $control['label'], 'shoestrap' ),
        'section'   => $control['section'],
        'settings'  => $control['setting'],
        'priority'  => $control['priority']
      )
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
add_action( 'customize_register', 'shoestrap_logo_customizer' );

/*
 * The site logo.
 * If no custom logo is uploaded, use the sitename
 */
function shoestrap_logo() {
  if ( get_theme_mod( 'shoestrap_logo' ) ) {
    $image = '<img id="site-logo" src="%s" alt="%s" style="max-width:100%%; height:auto;">';
    printf(
      $image,
      get_theme_mod( 'shoestrap_logo' ),
      get_bloginfo( 'name' )
    );
  } else {
    echo '<span class="sitename">';
    bloginfo( 'name' );
    echo '</span>';
  }
}

/*
 * Extra function for the navbar logo.
 * Same as the shoestrap_logo function,
 * with just a minor css tweak.
 */
function shoestrap_navbar_brand() {
  if ( get_theme_mod( 'shoestrap_navbar_logo' ) != 0 ) {
    if ( get_theme_mod( 'shoestrap_logo' ) ) {
      if ( get_theme_mod( 'shoestrap_navbar_original_logo' ) != 1 )
        $image = '<img id="site-logo" src="%s" alt="%s" style="max-height:20px; width:auto;">';
      else
        $image = '<img id="site-logo" src="%s" alt="%s">';
      
      printf(
        $image,
        get_theme_mod( 'shoestrap_logo' ),
        get_bloginfo( 'name' )
      );
    } else {
      echo '<span class="sitename">';
      bloginfo( 'name' );
      echo '</span>';
    }
  } else {
    bloginfo( 'name' );
  }
}

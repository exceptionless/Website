<?php

/*
 * Creates the section, settings and controls for the customizer
 */
function shoestrap_feat_image_customizer( $wp_customize ){
  
  $sections   = array();
  $sections[] = array( 'slug' => 'shoestrap_feat_image', 'title' => __( 'Featured Image', 'shoestrap' ), 'priority' => 8 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }

  $feat_img_enabling_help           = __( 'Enable the display of featured images on post archives (such as categories, tags and posts lists in general), as well as on the top of single posts', 'shoestrap' );
  $feat_img_archive_dimentions_help = __( 'Define the dimentions (width & height) of the image to be displayed on post archives. Please note that images will be resized and cropped to the specified size, so larger images will work best.', 'shoestrap' );
  $feat_img_post_dimentions_help    = __( 'Define the dimentions (width & height) of the image to be displayed on single posts. Please note that images will be resized and cropped to the specified size, so larger images will work best.', 'shoestrap' );

  $settings   = array();
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive',                'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post',                   'default' => '1' );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_width',          'default' => 550 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_height',         'default' => 330 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_width',             'default' => 550 );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_height',            'default' => 330 );

  $settings[] = array( 'slug' => 'shoestrap_feat_img_enabling_help',          'default' => $feat_img_enabling_help );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_archive_dimentions_help','default' => $feat_img_archive_dimentions_help );
  $settings[] = array( 'slug' => 'shoestrap_feat_img_post_dimantions_help',   'default' => $feat_img_post_dimentions_help );
  
  foreach( $settings as $setting ){
    $wp_customize->add_setting( $setting['slug'], array( 'default' => $setting['default'], 'type' => 'theme_mod', 'capability' => 'edit_theme_options' ) );
  }

  // Text Controls
  $text_controls    = array();
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_width',   'label' => 'Image width (archives)',      'section' => 'shoestrap_feat_image',  'priority' => 4 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_height',  'label' => 'Image height (archives)',     'section' => 'shoestrap_feat_image',  'priority' => 5 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_width',      'label' => 'Image width (single posts)',  'section' => 'shoestrap_feat_image',  'priority' => 7 );
  $text_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_height',     'label' => 'Image height (single posts)', 'section' => 'shoestrap_feat_image',  'priority' => 8 );
  
   // Checkbox Controls
  $checkbox_controls = array();
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_archive',  'label' => 'Show featured images on archives',      'section' => 'shoestrap_feat_image',  'priority' => 1 );
  $checkbox_controls[] = array( 'setting' => 'shoestrap_feat_img_post',     'label' => 'Show featured images on single posts',  'section' => 'shoestrap_feat_image',  'priority' => 2 );

  $help_controls    = array();
  $help_controls[]  = array( 'setting' => 'shoestrap_feat_img_enabling_help',           'label' => $feat_img_enabling_help,           'section' => 'shoestrap_feat_image', 'priority' => 3 );
  $help_controls[]  = array( 'setting' => 'shoestrap_feat_img_archive_dimentions_help', 'label' => $feat_img_archive_dimentions_help, 'section' => 'shoestrap_feat_image', 'priority' => 6 );
  $help_controls[]  = array( 'setting' => 'shoestrap_feat_img_post_dimantions_help',    'label' => $feat_img_post_dimentions_help,    'section' => 'shoestrap_feat_image', 'priority' => 9 );

  foreach ( $checkbox_controls as $control ) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'checkbox',
      'priority'    => $control['priority'],
    ));
  }
  
 foreach ( $text_controls as $control) {
    $wp_customize->add_control( $control['setting'], array(
      'label'       => __( $control['label'], 'shoestrap' ),
      'section'     => $control['section'],
      'settings'    => $control['setting'],
      'type'        => 'text',
      'priority'    => $control['priority']
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
add_action( 'customize_register', 'shoestrap_feat_image_customizer' );

/*
 * Adds the featured image on post archives
 */
function shoestrap_add_featured_image_on_archives() {
  // Get the customizer options
  $archive_feat_img_toggle  = get_theme_mod( 'shoestrap_feat_img_archive', 1 );
  $archive_feat_img_width   = get_theme_mod( 'shoestrap_feat_img_archive_width', 550 );
  $archive_feat_img_height  = get_theme_mod( 'shoestrap_feat_img_archive_height', 330 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $archive_feat_img_width;
  $height = $archive_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $archive_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a>';
    }
  }
}
add_action( 'shoestrap_entry_summary_begin', 'shoestrap_add_featured_image_on_archives', 40 );

/*
 * Adds the featured image on single posts
 */
function shoestrap_add_featured_image_on_posts() {
  // Get the customizer options
  $post_feat_img_toggle = get_theme_mod( 'shoestrap_feat_img_post', 1 );
  $post_feat_img_width  = get_theme_mod( 'shoestrap_feat_img_post_width', 550 );
  $post_feat_img_height = get_theme_mod( 'shoestrap_feat_img_post_height', 330 );

  $url    = wp_get_attachment_url( get_post_thumbnail_id() );
  $width  = $post_feat_img_width;
  $height = $post_feat_img_height;
  $crop   = true;
  $retina = false;

  if ( $post_feat_img_toggle == 1 ) {
    if ( '' != get_the_post_thumbnail() ) {
      // Call the resizing function (returns an array)
      $image = shoestrap_image_resize( $url, $width, $height, $crop, $retina );

      echo '<a href="' . get_permalink() . '"><img src="' . $image['url'] . '" /></a>';
    }
  }
}
add_action( 'shoestrap_before_the_content', 'shoestrap_add_featured_image_on_posts', 40 );

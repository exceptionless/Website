<?php

/*
 * Removes core controls
 */
function shoestrap_remove_controls( $wp_customize ){
  $wp_customize->remove_control( 'header_textcolor');
}
add_action( 'customize_register', 'shoestrap_remove_controls' );

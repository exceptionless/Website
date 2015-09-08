<?php

if (!has_nav_menu('primary_navigation')) {
  $primary_nav_id = wp_create_nav_menu('Primary Navigation', array('slug' => 'primary_navigation'));
  $shoestrap_primary_nav_theme_mod['primary_navigation'] = $primary_nav_id;
}

if (!has_nav_menu('primary_navigation')) {
  $secondary_nav_id = wp_create_nav_menu('Secondary Navigation', array('slug' => 'secondary_navigation'));
  $shoestrap_secondary_nav_theme_mod['secondary_navigation'] = $secondary_nav_id;
}

if ($shoestrap_primary_nav_theme_mod) {
  set_theme_mod('nav_menu_locations', $shoestrap_primary_nav_theme_mod);
}

if ($shoestrap_secondary_nav_theme_mod) {
  set_theme_mod('nav_secondary_menu_locations', $shoestrap_secondary_nav_theme_mod);
}

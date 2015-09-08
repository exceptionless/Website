<?php
get_template_part('templates/head');
$layout = get_theme_mod( 'shoestrap_layout' );
?>
<body <?php body_class(); ?>>
  <!--[if lt IE 7]><div class="alert">Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]-->
<a href="https://github.com/exceptionless/Exceptionless" target="_blank"><img class="gitHubRibbon" alt="Fork me on GitHub" src="/assets/gitHubRibbon.png"></a>
  <?php
  do_action('get_header');
  // Use Bootstrap's navbar if enabled in config.php
  if (current_theme_supports('bootstrap-top-navbar'))
    get_template_part('templates/header-top-navbar');
  ?>
  
  <?php
  // Load the extra branding area
  do_action('shoestrap_branding');
  // load the shoestrap hero area
  do_action('shoestrap_hero');
  ?>
  <?php if(is_front_page() ) { ?>
	<?php if( function_exists('cyclone_slider') ) cyclone_slider('20'); ?>
  <?php } ?>
  <?php
  // load the secondary navbar if one is selected in the customizer
  if ( get_theme_mod( 'shoestrap_navbar_secondary' ) == 1 )
    get_template_part('templates/navbar');
  ?>

  <?php dynamic_sidebar('hero-area'); ?>
  
  <?php do_action('shoestrap_pre_wrap'); ?>
    <?php if(!is_front_page() ) { ?>
    	<?php if(is_single() ) { ?>
            <div class="page-header">
                <div class="post-categories">Post Categories: <?php the_category(', '); ?></div>
            </div>
    	<?php }else{ ?>
        	  <div class="page-header">
                <h1><?php echo shoestrap_title(); ?></h1>
            </div>
        <?php } ?> 
<?php } ?>
  <div id="wrap" class="<?php shoestrap_fluid_body_classes( 'container' ); ?>" role="document">

    <?php do_action('shoestrap_pre_content'); ?>
    <div id="content" class="<?php shoestrap_fluid_body_classes( 'row' ); ?>">

      <?php if ( in_array ( $layout, array ( 'mps', 'pms', 'smp', 'spm' ) ) && shoestrap_display_sidebar() && shoestrap_display_primary_sidebar() ) { ?>
        <div class="m_p_wrap <?php shoestrap_sidebar_class_calc( 'main-primary', '', true ); ?>">
          <div class="row-fluid">
      <?php } ?>

      <?php do_action('shoestrap_pre_main'); ?>
      <div id="main" class="<?php echo shoestrap_main_class(); ?>" role="main">
        <?php include shoestrap_template_path(); ?>
      </div>
      <?php do_action('shoestrap_after_main'); ?>
      <?php if (shoestrap_display_sidebar() && shoestrap_display_primary_sidebar()) : ?>
        <?php if ( !in_array ( $layout, array ( 'm', 'ms', 'sm' ) ) ) { ?>
          <aside id="sidebar" class="<?php echo shoestrap_sidebar_class(); ?>" role="complementary">
            <?php do_action('shoestrap_pre_sidebar'); ?>
            <?php get_template_part('templates/primary-sidebar'); ?>
            <?php do_action('shoestrap_after_sidebar'); ?>
          </aside>
        <?php } ?>
        <?php if ( in_array ( $layout, array ( 'mps', 'pms', 'smp', 'spm' ) ) && shoestrap_display_sidebar() && shoestrap_display_primary_sidebar() ) { ?>
          </div></div>
        <?php } ?>

        <?php if ( !in_array ( $layout, array ( 'm', 'mp', 'pm' ) ) && shoestrap_display_sidebar() && shoestrap_display_secondary_sidebar() ) { ?>
          <aside id="secondary" class="<?php echo shoestrap_sidebar_class( 'secondary' ); ?>" role="complementary">
            <?php do_action('shoestrap_pre_sidebar'); ?>
            <?php get_template_part('templates/secondary-sidebar'); ?>
            <?php do_action('shoestrap_after_sidebar'); ?>
          </aside>
        <?php } ?>
      <?php endif; ?>

    </div><!-- /#content -->
    <?php do_action('shoestrap_after_content'); ?>
  </div><!-- /#wrap -->
  <?php do_action('shoestrap_after_wrap'); ?>
  
  <?php do_action('shoestrap_pre_footer'); ?>
  <?php get_template_part('templates/footer'); ?>
  <?php do_action('shoestrap_after_footer'); ?>

</body>
</html>

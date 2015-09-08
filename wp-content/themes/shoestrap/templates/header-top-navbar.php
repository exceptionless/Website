<?php
if ( get_theme_mod( 'shoestrap_navbar_fixed' ) == '1' )
  $navbar_class = 'navbar navbar-fixed-top';
else
  $navbar_class = 'navbar navbar-static-top';
?>

<header id="banner" class="topnavbar <?php echo $navbar_class; ?>" role="banner">
  <div class="navbar-inner">
    <div class="<?php shoestrap_fluid_body_classes( 'container' ); ?>">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php if ( get_theme_mod( 'shoestrap_navbar_branding' ) != 0 ) { ?>
        <a class="brand" href="<?php echo home_url(); ?>/">
          <img id="site-logo" src="/assets/exceptionless-logo1.png" alt="Exceptionless - .NET Exception Reporting">
        </a>
      <?php } ?>
      <?php do_action( 'shoestrap_primary_nav_top_left' ); ?>
      <?php do_action( 'shoestrap_nav_top_left' ); ?>
      <nav id="nav-main" class="nav-main nav-collapse collapse" role="navigation">
        <?php
          if ( has_nav_menu( 'primary_navigation' ) ) :
            wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => shoestrap_nav_class_pull() ) );
          endif;
        ?>
      </nav>
      <?php do_action( 'shoestrap_nav_top_right' ); ?>
    </div>
  </div>
  <?php do_action( 'shoestrap_nav_top_bottom' ); ?>
</header>
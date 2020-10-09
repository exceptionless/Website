<div id="footer-wrapper">
  <footer id="content-info" class="<?php shoestrap_fluid_body_classes( 'container' ); ?>" role="contentinfo">
    <div class="row-fluid">
      <div class="span4"><?php dynamic_sidebar( 'sidebar-footer-left' ); ?></div>
      <div class="span4"><?php dynamic_sidebar( 'sidebar-footer-center' ); ?></div>
      <div class="span4"><?php dynamic_sidebar( 'sidebar-footer-right' ); ?></div>
    </div>
  </footer>
  <div class="copyrightContainer">
	<p class="copyright"><?php if ( get_theme_mod( 'shoestrap_footer_text' ) ) { echo get_theme_mod( 'shoestrap_footer_text' ); } else { echo '&copy; ' . date( 'Y' ); ?> <?php bloginfo( 'name' ); } ?></p>
 </div>
</div>

<?php if ( GOOGLE_ANALYTICS_ID ) : ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php endif; ?>

<?php wp_footer(); ?>
<?php if ( get_option( 'shoestrap_load_scripts_on_footer' ) == 1 && is_single() && comments_open() && get_option( 'thread_comments' ) ) wp_print_scripts( 'comment-reply' );

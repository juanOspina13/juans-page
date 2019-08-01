<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */
?>
<?php if(has_nav_menu('onepage_menu')) 
{ ?>
		</div><!-- .site-content -->
<?php } ?>	
<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */

get_header(); ?>

<?php
if(has_nav_menu('onepage_menu')) 
{	?>
<div class='main-container' >
<?php    get_template_part('onepage-menu'); ?>
    	<div class='main-content'>	
			<div class='back-home' >
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' ><i class='ion-ios-arrow-thin-left' ></i> <?php esc_attr_e('Back to Home','reapse')?></a>
			</div>
				<section id='blog' class='blog-section section active' >
					
					<div class='content-block post-block' >
					
						<div class='container-fluid' >
							
							<div class='single-post' >
								
								<?php if(have_posts()): the_post(); ?>
								<em><?php esc_attr_e('Posted by','reapse');?> <a href='#' class='link' ><?php the_author();?></a> <?php esc_attr_e('at','reapse')?> <?php echo get_the_date('m F Y');?></em>
								<?php endif; ?> 
								<h1><?php the_title();?></h1>
								
								
								
								<div class='content' >								
									<?php the_content();?>
									
								</div>
								
								<div class='comments' >
									<?php  if ( comments_open() || get_comments_number() ) {
				                    comments_template();
				                  } ?>											
								</div>
							</div>							
						</div>					
					</div>					
				</section>
		</div>

<?php } else {
get_template_part('multiple-menu'); ?>
<div id="content" class="site-content single-area">
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	

</div><!-- .content-area -->

<?php get_sidebar(); ?>
</div>
<?php } ?>
<?php get_footer(); ?>

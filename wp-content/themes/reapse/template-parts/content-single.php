<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	

	<?php reapse_post_thumbnail(); ?>
	
	<div class="entry-content">
		<div class="metaa">
		    <p class="date"><?php echo get_the_date('M d, Y')?></p>
		    <div class="tags-links">
		        <?php 
		            $counter=0;
		            $posttags = get_the_tags();
		            if ($posttags) { echo 'Tagged : ';
		                foreach($posttags as $tag) {
		                    if($counter!=0){
		                        echo ', ';
		                    	} 
		                    echo esc_attr($tag->name) . '';
		                    $counter++;
		                    }
		                } ?> 
		    </div>
		</div>
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'reapse' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'reapse' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->

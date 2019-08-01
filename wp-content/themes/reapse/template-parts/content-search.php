<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	
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
      /* translators: %s: Name of current post */
      the_excerpt();

      wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'reapse' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'reapse' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );
    ?>    
  </div>
	
	
</article><!-- #post-## -->


<?php
/*
Template name: Frontpage Template
*/
 get_header();?>
 <div class='main-container' > 
 
 <?php get_template_part('onepage-menu'); ?>
<div class='main-content'>

<?php    if ( ( $locations = get_nav_menu_locations() ) && $locations['onepage_menu'] ) {
        $menu = wp_get_nav_menu_object( $locations['onepage_menu'] );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        $include = array();
        foreach($menu_items as $item) {
            if($item->object == 'page')
                
                $include[] = $item->object_id;
        }
        $main_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => $include, 'posts_per_page' => count($include), 'orderby' => 'post__in' ) );
   $i = 1;
    while ($main_query->have_posts()) : $main_query->the_post();
    

    $post_name = $post->post_name;
    
    $post_id = get_the_ID();?>
    <?php $separate_page = get_post_meta( "rnr_separate_page", true); 

    if (($separate_page == false ))
    { ?>
         <section id="<?php echo esc_attr($post->post_name);?>" class="section <?php echo rwmb_meta( 'reapse_sec_ac');?>">
            <div class="container-fluid">
            <?php global $more; $more = 0; the_content('');?>
            </div>
        </section>
       
     <?php } $i++;?>
    <?php endwhile; wp_reset_query(); 
    }

?>
</div>
<?php get_footer();?>
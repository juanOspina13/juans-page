<?php
/*************Post Meta*****************/
add_filter( 'rwmb_meta_boxes', 'lemoni_slider_meta_boxes' );
function lemoni_slider_meta_boxes( $meta_boxes ) {
    $prefix = 'reapse_';
    $meta_boxes[] = array(
        'title'      => __( 'Page Options', 'lemoni' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'   => "{$prefix}sec_ac",
                'name' => __( 'Want to shoe this Page as Active', 'lemoni' ),
                'type' => 'select',
                'options' => array(
                    'home-section active' => __( 'Active Page', 'lemoni' ),
                    'notactive' => __( 'Not Active Page', 'lemoni' ),
                ),
                'multiple'    => false,
                'std'         => 'section',
                'placeholder' => __( 'Select an Item', 'lemoni' ),
            ),          
            
            
        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Education Options', 'lemoni' ),
        'post_types' => 'education',
        'fields'     => array(            
            array(
                'name' => __( 'Name of the Degree', 'your-prefix' ),
                'desc' => __( 'Write Your Name of the Degree', 'lemoni' ),
                'id'   => "{$prefix}ed_deg",
                'type' => 'text',                
            ),
            array(
                'name' => __( 'Education Time Period', 'your-prefix' ),
                'desc' => __( 'Write Your Education Time Period', 'lemoni' ),
                'id'   => "{$prefix}ed_time",
                'type' => 'text',                
            ),             
            
        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Employment Options', 'lemoni' ),
        'post_types' => 'employment',
        'fields'     => array(            
            array(
                'name' => __( 'Name of the Designation', 'your-prefix' ),
                'desc' => __( 'Write Your Name of the Designation', 'lemoni' ),
                'id'   => "{$prefix}em_deg",
                'type' => 'text',                
            ),
            array(
                'name' => __( 'Employment Time Period', 'your-prefix' ),
                'desc' => __( 'Write Your Employment Time Period', 'lemoni' ),
                'id'   => "{$prefix}em_time",
                'type' => 'text',                
            ),             
            
        ),
    );
    
    return $meta_boxes;
}
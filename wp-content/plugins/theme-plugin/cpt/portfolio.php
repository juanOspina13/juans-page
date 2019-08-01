<?php 

add_action( 'init', 'reapse_portfolio_init' );
/**
 * Register a project post type.
 *
 */
function reapse_portfolio_init() {
	$labels = array(
		'name'               => _x( 'Portfolio', 'Reapse Portfolio', 'reapse' ),
		'singular_name'      => _x( 'Portfolio', 'Reapse Portfolio', 'reapse' ),
		'menu_name'          => _x( 'Reapse Portfolio', 'admin menu', 'reapse' ),
		'name_admin_bar'     => _x( 'portfolio', 'add new on admin bar', 'reapse' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'reapse' ),
		'add_new_item'       => __( 'Add New Portfolio', 'reapse' ),
		'new_item'           => __( 'New Portfolio', 'reapse' ),
		'edit_item'          => __( 'Edit Portfolio', 'reapse' ),
		'view_item'          => __( 'View Portfolio', 'reapse' ),
		'all_items'          => __( 'All Portfolio', 'reapse' ),
		'search_items'       => __( 'Search Portfolio', 'reapse' ),
		'parent_item_colon'  => __( 'Parent Portfolio:', 'reapse' ),
		'not_found'          => __( 'No Portfolio found.', 'reapse' ),
		'not_found_in_trash' => __( 'No Portfolio found in Trash.', 'reapse' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'reapse' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'taxonomies' 		 => array('portfolio_category'),
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	register_post_type( 'portfolio', $args );
}
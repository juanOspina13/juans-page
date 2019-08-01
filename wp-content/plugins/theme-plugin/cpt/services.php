<?php 

add_action( 'init', 'mari_service_init' );
/**
 * Register a service post type.
 *
 */
function mari_service_init() {
	$labels = array(
		'name'               => _x( 'Services', 'Mari Services', 'mari' ),
		'singular_name'      => _x( 'Service', 'Mari Service', 'mari' ),
		'menu_name'          => _x( 'Mari services', 'admin menu', 'mari' ),
		'name_admin_bar'     => _x( 'service', 'add new on admin bar', 'mari' ),
		'add_new'            => _x( 'Add New', 'service', 'mari' ),
		'add_new_item'       => __( 'Add New Service', 'mari' ),
		'new_item'           => __( 'New Service', 'mari' ),
		'edit_item'          => __( 'Edit Service', 'mari' ),
		'view_item'          => __( 'View Service', 'mari' ),
		'all_items'          => __( 'All Services', 'mari' ),
		'search_items'       => __( 'Search Services', 'mari' ),
		'parent_item_colon'  => __( 'Parent Services:', 'mari' ),
		'not_found'          => __( 'No Services found.', 'mari' ),
		'not_found_in_trash' => __( 'No Services found in Trash.', 'mari' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'mari' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'service' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'taxonomies' => array('category'),
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_taxonomy('service_category', 'service', array('hierarchical' => true, 'label' => 'Services Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	register_post_type( 'service', $args );
}
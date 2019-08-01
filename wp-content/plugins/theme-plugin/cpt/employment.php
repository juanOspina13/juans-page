<?php 

add_action( 'init', 'reapse_employment_init' );
/**
 * Register a project post type.
 *
 */
function reapse_employment_init() {
	$labels = array(
		'name'               => _x( 'Employment', 'Reapse Employment', 'reapse' ),
		'singular_name'      => _x( 'Employment', 'Reapse Employment', 'reapse' ),
		'menu_name'          => _x( 'Reapse Employment', 'admin menu', 'reapse' ),
		'name_admin_bar'     => _x( 'employment', 'add new on admin bar', 'reapse' ),
		'add_new'            => _x( 'Add New', 'employment', 'reapse' ),
		'add_new_item'       => __( 'Add New Employment', 'reapse' ),
		'new_item'           => __( 'New Employment', 'reapse' ),
		'edit_item'          => __( 'Edit Employment', 'reapse' ),
		'view_item'          => __( 'View Employment', 'reapse' ),
		'all_items'          => __( 'All Employment', 'reapse' ),
		'search_items'       => __( 'Search Employment', 'reapse' ),
		'parent_item_colon'  => __( 'Parent Employment:', 'reapse' ),
		'not_found'          => __( 'No Employment found.', 'reapse' ),
		'not_found_in_trash' => __( 'No Employment found in Trash.', 'reapse' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'reapse' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'employment' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'taxonomies' 		 => array('employment_category'),
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_taxonomy('employment_category', 'employment', array('hierarchical' => true, 'label' => 'Employment Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	register_post_type( 'employment', $args );
}
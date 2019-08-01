<?php 

add_action( 'init', 'reapse_education_init' );
/**
 * Register a project post type.
 *
 */
function reapse_education_init() {
	$labels = array(
		'name'               => _x( 'Education', 'Reapse Education', 'reapse' ),
		'singular_name'      => _x( 'Education', 'Reapse Education', 'mari' ),
		'menu_name'          => _x( 'Reapse Education', 'admin menu', 'mari' ),
		'name_admin_bar'     => _x( 'education', 'add new on admin bar', 'mari' ),
		'add_new'            => _x( 'Add Education', 'education', 'mari' ),
		'add_new_item'       => __( 'Add New Education', 'mari' ),
		'new_item'           => __( 'New Education', 'mari' ),
		'edit_item'          => __( 'Edit Education', 'mari' ),
		'view_item'          => __( 'View Education', 'mari' ),
		'all_items'          => __( 'All Education', 'mari' ),
		'search_items'       => __( 'Search Education', 'mari' ),
		'parent_item_colon'  => __( 'Parent Education:', 'mari' ),
		'not_found'          => __( 'No Education found.', 'mari' ),
		'not_found_in_trash' => __( 'No Education found in Trash.', 'mari' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'mari' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'education' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'taxonomies' 		 => array('education_category'),
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
	register_taxonomy('education_category', 'education', array('hierarchical' => true, 'label' => 'Education Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	register_post_type( 'education', $args );
}
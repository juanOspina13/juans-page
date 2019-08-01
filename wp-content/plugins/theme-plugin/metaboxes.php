<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'lrk_';

global $meta_boxes;

$meta_boxes = array();

global $smof_data;


/* ----------------------------------------------------- */
// Page Sections Metaboxes
/* ----------------------------------------------------- */



/* Page Section Background Settings */

$grid_array = array('2 Columns','3 Columns','4 Columns');

$pagebg_type_array = array(
	'image' => 'Image',
	'gradient' => 'Gradient',
	'color' => 'Color'
);


/* ----------------------------------------------------- */
// Page Settings
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesettings',
	'title' => 'Page Options',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	// List of meta fields
	'fields' => array(

		array(
                'name' => __( 'Want to Active this page ?', 'lemoni' ),
                'id'   => $prefix . 'active',
                'desc'		=> 'Select Which one you want Active / Not',
                'type' => 'select',
                'options' => array(
                    'active' => __( 'First Load You want to Show this page', 'lemoni' ),
                    'no' => __( 'First Load You did not want to Show this page', 'lemoni' ),
                ),
                'multiple'    => false,
                'std'         => 'no',
                'placeholder' => __( 'Select an Item', 'lemoni' ),
            ),
		array(
                'name' => __( 'Want to Dark Border ?', 'lemoni' ),
                'id'   => $prefix . 'dark',
                'desc'		=> 'Select Which one you want Dark / Light',
                'type' => 'select',
                'options' => array(
                    'border-d' => __( 'Page Border Light', 'lemoni' ),
                    'no' => __( 'Page Border Dark', 'lemoni' ),
                ),
                'multiple'    => false,
                'std'         => 'border-d',
                'placeholder' => __( 'Select an Item', 'lemoni' ),
            ),
		array(
			'name'		=> 'Page Background Color :',
			'id'		=> $prefix . 'color',
			'desc'		=> 'Write Your Background Color Code with #',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Page Background Image :',
			'id'		=> $prefix . 'imga',
			'desc'		=> 'Write Your Background Image link',
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
						
	)
);


/* ----------------------------------------------------- */
/* Resume Education Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'resume_info',
	'title' => 'Education Custom Field',
	'pages' => array( 'education' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Degree Of Education :',
			'id'		=> $prefix . 'dg_edu',
			'desc'		=> 'Write Education Time Duration (Eg. 2002-2008 etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Time Duretion :',
			'id'		=> $prefix . 'dg_name',
			'desc'		=> 'Write Education Time Duration (Eg. 2002-2008 etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
	)
);


/* ----------------------------------------------------- */
/* Resume Employment Type Metaboxes
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'resume_info',
	'title' => 'Employment Custom Field',
	'pages' => array( 'employment' ),
	'context' => 'normal',	

	'fields' => array(
		
		array(
			'name'		=> 'Designation  :',
			'id'		=> $prefix . 'em_deg',
			'desc'		=> 'Write Employment Time Duration (Eg. 2002-2008 etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> 'Time Duretion :',
			'id'		=> $prefix . 'em_d',
			'desc'		=> 'Write Employment Time Duration (Eg. 2002-2008 etc.).',
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function rocknrolla_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'rocknrolla_register_meta_boxes' );
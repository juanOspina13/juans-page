<?php
/*
Plugin Name: Reapse Plugin
Plugin URI: http://wordpress.org/extend/plugins/reapse-plugin/
Description: Reapse Plugin for Reapse theme
Author: Uddog
Author URI: http://uddog.org/
Version: 1.0
Text Domain: reapse-plugin
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/


add_action( 'wp_enqueue_scripts', 'front_end_style' );
 
function front_end_style() {
	
	wp_enqueue_style( 'lrk_style',
	plugins_url('/css/style.css',__FILE__), array(), 1.0, 'all' );
	do_action( 'front_end_style' );	
	
}


// Add Custom Post
require dirname( __FILE__ ) . '/cpt/portfolio.php';
require dirname( __FILE__ ) . '/cpt/education.php';
require dirname( __FILE__ ) . '/cpt/employment.php';
require dirname( __FILE__ ) . '/reapse-shortcode/symple-shortcodes.php';



require dirname( __FILE__ ) . '/reapse_option.php';


// Meta box

require dirname( __FILE__ ) . '/meta.php';

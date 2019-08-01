<?php

class reapse_AfterSetupTheme{
	
	
	
	static function reapse_add_theme_support(){		
		
		/********** WP TITLE FILTER ************/
		add_filter( 'wp_title', 'reapse_AfterSetupTheme::reapse_wp_title', 10, 2 );
		
	}
	
	
	static function reapse_return_theme_option($string,$str=null){
		global $reapse_theme;
		if($str!=null)
		return isset($reapse_theme[''.$string.''][''.$str.'']) ? $reapse_theme[''.$string.''][''.$str.''] : null;
		else
		return isset($reapse_theme[''.$string.'']) ? $reapse_theme[''.$string.''] : null;
	}
	
	
	
	
	static function reapse_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'reapse' ), max( $paged, $page ) );
	}

	return $title;
}
}

?>
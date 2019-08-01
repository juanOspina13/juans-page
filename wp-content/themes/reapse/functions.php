<?php
/**
 * Reapse functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */

/**
 * Reapse only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'reapse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own reapse_setup() function to override in a child theme. 
 */
function reapse_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on reapse, use a find and replace
	 * to change 'reapse' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'reapse', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'reapse' ),
		'social'  => esc_html__( 'Social Links Menu', 'reapse' ),
		'onepage_menu'  => esc_html__( 'OnePage Menu', 'reapse' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', reapse_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // reapse_setup
add_action( 'after_setup_theme', 'reapse_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function reapse_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'reapse_content_width', 840 );
}
add_action( 'after_setup_theme', 'reapse_content_width', 0 );

/**
 * Registers a widget area.
 *
 */
function reapse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'reapse' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'reapse' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'reapse_widgets_init' );

if ( ! function_exists( 'reapse_fonts_url' ) ) :
/**
 * Register Google fonts for reapse.
 *
 * Create your own reapse_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */


function reapse_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'reapse' ) ) {
		$fonts[] = 'Lora:400i,700i';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'reapse' ) ) {
		$fonts[] = 'Poppins:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'reapse' ) ) {
		$fonts[] = 'Work+Sans:300,400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


function reapse_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'reapse-fonts', reapse_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'reapse-style', get_stylesheet_uri() );
	wp_enqueue_style( 'reapse', get_template_directory_uri() . '/css/reapse.css', array(), '3.4.1' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.4.1' );
	wp_enqueue_style( 'linea', get_template_directory_uri() . '/css/linea.css', array(), '3.4.1' );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.min.css', array(), '3.4.1' );	
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '3.4.1' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '3.4.1' );
	

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'reapse-ie', get_template_directory_uri() . '/css/ie.css', array( 'reapse-style' ), '20160412' );
	wp_style_add_data( 'reapse-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'reapse-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'reapse-style' ), '20160412' );
	wp_style_add_data( 'reapse-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'reapse-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'reapse-style' ), '20160412' );
	wp_style_add_data( 'reapse-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'reapse-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'reapse-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'reapse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160412', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'reapse-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
	}

	wp_enqueue_script( 'reapse-fn-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );
	//vendor
	wp_enqueue_script('shuffle', get_template_directory_uri() . '/js/js/jquery.shuffle.min.js', array('jquery'), '1.0',true);
	wp_enqueue_script('owlcarousel', get_template_directory_uri() . '/js/js/owl.carousel.min.js', array('jquery'), '1.0',true);
	wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/js/fitvids.js', array('jquery'), '1.0',true);		
	wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/js/jquery.magnific-popup.min.js', array('jquery'), '1.0',true);
	wp_enqueue_script('validator', get_template_directory_uri() . '/js/js/validator.min.js', array('jquery'), '1.0',true);
	wp_enqueue_script('reapse-script', get_template_directory_uri() . '/js/js/script.js', array('jquery'), '1.0',true);
		
		

		


	wp_localize_script( 'reapse-script', 'screenReaderText', array(
		'expand'   => esc_html__( 'expand child menu', 'reapse' ),
		'collapse' => esc_html__( 'collapse child menu', 'reapse' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'reapse_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function reapse_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'reapse_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function reapse_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function reapse_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'reapse_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function reapse_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'reapse_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function reapse_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'reapse_widget_tag_cloud_args' );

// for onepage
class reapse_description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $object, $depth = 0, $args = Array() , $current_object_id = 0) {
           
           global $wp_query;

           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $object->classes ) ? array() : (array) $object->classes;
           $icon_class = $classes[0];
       $classes = array_slice($classes,1);

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           

           $attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
           $attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
           $attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
            
            if( $icon_class != '' ) {
              $icon_classes =  $icon_class;
        }
        else{
          $icon_classes = '';
        }

           if($object->object == 'page')
           {
                $varpost = get_post($object->object_id);                
                $separate_page = get_post_meta($object->object_id, "rnr_separate_page", true);
                $disable_menu = get_post_meta($object->object_id, "rnr_disable_section_from_menu", true);
        $current_page_id = get_option('page_on_front');

                if ( ( $disable_menu != true ) && ( $varpost->ID != $current_page_id ) ) {

                  $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                  if ( $separate_page == true )
                    $attributes .= ! empty( $object->url ) ? ' href="'   . esc_attr( $object->url ) .'"' : '';
                  else{
                    if (is_front_page()) 
                      $attributes .= ' href="#' . $varpost->post_name . '"'; 
                    else 
                      $attributes .= ' href="' . home_url() .'#' . $varpost->post_name . '"';
                  } 

                  $object_output = $args->before;
                $object_output .= '<a'. $attributes .' class="section-link ' .$icon_classes . '">';                
                $object_output .= $args->link_before . '' . apply_filters( 'the_title', $object->title, $object->ID ) . '';
                $object_output .= $args->link_after;                
                $object_output .= '</a>';
                $object_output .= $args->after;    

                 $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );                              
                }
                                         
           }
           else{

              $output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

                $attributes .= ! empty( $object->url ) ? ' href="' . esc_attr( $object->url ) .'"' : '';

              $object_output = $args->before;
              $object_output .= '<a'. $attributes .'>';
              $object_output .= $args->link_before . $icon_classes . '<span>' . apply_filters( 'the_title', $object->title, $object->ID ) . '</span>';
              $object_output .= $args->link_after;
              $object_output .= '</a>';
              $object_output .= $args->after;

               $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $object, $depth, $args );
          }

           
      }
}

require get_template_directory() . '/includes/aftersetuptheme.php';
add_action('after_setup_theme', 'reapse_AfterSetupTheme::reapse_add_theme_support');

// tgm Plugin
require get_template_directory() . '/includes/tgm/tgm-config.php';

function reapse_move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}

add_filter( 'comment_form_fields', 'reapse_move_comment_field_to_bottom' );


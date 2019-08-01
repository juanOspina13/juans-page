<?php
/**
 * Reapse back compat functionality
 *
 * Prevents Reapse from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */

/**
 * Prevent switching to Reapse on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 */
function reapse_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'reapse_upgrade_notice' );
}
add_action( 'after_switch_theme', 'reapse_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Reapse on WordPress versions prior to 4.4.
 *
 * @global string $wp_version WordPress version.
 */
function reapse_upgrade_notice() {
	$message = sprintf( esc_html__( 'Reapse requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'reapse' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 *
 * @global string $wp_version WordPress version.
 */
function reapse_customize() {
	wp_die( sprintf( esc_html__( 'Reapse requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'reapse' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'reapse_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @global string $wp_version WordPress version.
 */
function reapse_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Reapse requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'reapse' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'reapse_preview' );

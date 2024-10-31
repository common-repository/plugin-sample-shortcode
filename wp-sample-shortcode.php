<?php
/**
 * Plugin Name: Plugin Sample Shortcode
 * Plugin URI: http://www.wordpress.org/
 * Description: In this plugin we have create a shoortcode only for sample.
 * Version: 1.0.1
 * Author: Dipendra Pancholi
 * Author URI: http://wordpress.org
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Basic plugin definitions 
 * 
 * @package Plugin Sample Shortcode
 * @since 1.0.0
 */

global $wpdb;

if( !defined( 'WP_PSS_DIR' ) ) {
	define( 'WP_PSS_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WP_PSS_URL' ) ) {
	define( 'WP_PSS_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WP_PSS_BASENAME') ) {
	define( 'WP_PSS_BASENAME', 'wp-sample-shortcode' ); // plugin base name
}
if( !defined( 'WP_PSS_ADMIN' ) ) {
	define( 'WP_PSS_ADMIN', WP_PSS_DIR . '/includes/admin' ); // plugin admin dir
}

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Plugin Sample Shortcode
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wp_pss_install' );

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * stest default values for the plugin options.
 * 
 * @package Plugin Sample Shortcode
 * @since 1.0.0
 */
function woo_cou_promo_install() {
	global $wpdb;	
}

//plugin loaded action
add_action( 'plugins_loaded', 'wp_pss_plugins_loaded' );

/**
 * Plugin Loaded Action
 * 
 * @package Plugin Sample Shortcode
 * @since 1.0.0
 */
function wp_pss_plugins_loaded() {
	
	/**
	 * Load Text Domain
	 * 
	 * This gets the plugin ready for translation.
	 * 
	 * @package Plugin Sample Shortcode
	 * @since 1.0.0
	 */
	load_plugin_textdomain( 'wppss', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	
	
	register_deactivation_hook( __FILE__, 'wp_pss_uninstall');
	
	/**
	 * Deactivation Hook
	 * 
	 * Register plugin deactivation hook.
	 * 
	 * @package Plugin Sample Shortcode
	 * @since 1.0.0
	 */
	function wp_pss_uninstall() {
		
		global $wpdb;
	}
	
	//Global variables
	global $wp_pss_shortcode;
	
	//Shortcode related functionality
	require_once( WP_PSS_DIR . '/includes/class-wp-pss-shortcode.php' );
	$wp_pss_shortcode	= new Wp_Pss_Shortcodes();
	$wp_pss_shortcode->add_hooks();
	
}
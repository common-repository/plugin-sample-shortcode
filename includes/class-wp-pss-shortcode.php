<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Shortcodes Class
 *
 * Handles shortcodes functionality of plugin
 *
 * @package Plugin Sample Shortcode
 * @since 1.0.1
 */
class Wp_Pss_Shortcodes {
	
	function __construct() {
		
	}
	
	/**
	 * shortcode simple tutorial
	 * 
	 * @package Plugin Sample Shortcode
	 * @since 1.0.0
	 */
	function wp_pss_sample_shortcode( $atts ) {
		
		$atts	= shortcode_atts( array(
									'param1'	=> 'parameter 1',
									'param2'	=> 'parameter 2'
								), $atts );
	
		return "param1 = {$atts['param1']}";
	}
	
	/**
	 * Adding Hooks
	 *
	 * Adding proper hoocks for the shortcodes.
	 *
	 * @package Plugin Sample Shortcode
	 * @since 1.0.1
	 */
	public function add_hooks() {
		
		//add sample shortcode
		add_shortcode( 'wp_pss_sample', array( $this, 'wp_pss_sample_shortcode' ) );
	}
}
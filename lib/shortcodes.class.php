<?php
/**
 * WP Shortcoedes Class for this plugin.
 *
 * @package WordPress Admin Toolkit
 */

// Don't load directly
if ( !defined( 'ABSPATH' ) ) die( '-1' );

if ( !class_exists( 'RF_Admin_Toolkit_Shortcodes' ) ) {

	class RF_Admin_Toolkit_Shortcodes {

		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register shortcodes
			add_shortcode( 'monitor_plugins', array(&$this, 'monitor_plugins_shortcode_callback' ));
		}

		//Returns html output
		public static function monitor_plugins_shortcode_callback( $atts )
		{
			$a = shortcode_atts( array(
				'url' => ''
			), $atts );

			if( empty($a['url']) ){
				return;
			}

			// Create html output
			$output = '';

			return $output;
		}

	}

}

?>

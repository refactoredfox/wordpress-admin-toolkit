<?php
/**
 * WP AJAX Class for this plugin.
 *
 * @package WordPress Admin Toolkit
 */

if ( !defined( 'ABSPATH' ) ) die( '-1' );

if(!class_exists('RF_Admin_Toolkit_AJAX'))
{
	class RF_Admin_Toolkit_AJAX
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
			add_action( 'wp_ajax_rf_admin_toolkit_ajax', array(&$this, 'rf_admin_toolkit_ajax') );

			// register front-end actions
			add_action( 'wp_ajax_nopriv_rf_admin_toolkit_ajax', array(&$this, 'rf_admin_toolkit_ajax') );

		} // END public function __construct


		/**
  	 * updates the track id to users usermeta option via ajax
  	 */
		public function rf_admin_toolkit_ajax()
		{

			echo json_encode( '' );

			die();

		}

	} // END class

	/**
	* Set the ajax on load
	*/
	$RF_Admin_Toolkit_AJAX = new RF_Admin_Toolkit_AJAX();

} // END if(!class_exists('RF_Admin_Toolkit_AJAX'))

?>

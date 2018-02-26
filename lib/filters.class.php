<?php
/**
 * WP Filters Class for this plugin.
 *
 * @package WordPress Admin Toolkit
 */

if ( !defined( 'ABSPATH' ) ) die( '-1' );

if(!class_exists('RF_Admin_Toolkit_Filters'))
{
	class RF_Admin_Toolkit_Filters
	{

		/**
		* Start up
		*/
		public function __construct()
		{
			$plugin = plugin_basename(__FILE__);

			// Plugin Filters
			add_filter( 'plugin_action_links_$plugin', array( $this, 'plugin_settings_link'), 10, 1 );

		}

		 // Add the settings link to the plugins page
		 function plugin_settings_link($links)
		 {
			 $settings_link = '<a href="options.php?page=rf_admin_toolkit">Settings</a>';
			 array_unshift($links, $settings_link);
			 return $links;
		 }

	} // End RF_Admin_Toolkit_Filters Class

	/**
	 * Set the filters on load
	 */
	$RF_Admin_Toolkit_Filters = new RF_Admin_Toolkit_Filters();

} // End RF_Admin_Toolkit_Filters If Active

?>

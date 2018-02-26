<?php
/*
Plugin Name: WordPress Admin Toolkit
Plugin URI: http://www.refactoredfox.com
Description: A collection of useful toolskit and site monitoring functions for wordpress sites.
Version: 0.1.0
Author: Refactored Fox Studios
Author URI: http://www.refactoredfox.com
Contributors: Joe Tercero
License: GPL2

Copyright 2018 Refactored Fox Studios

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
|--------------------------------------------------------------------------
| Master TODO List
|--------------------------------------------------------------------------
*/

/*

- Things I would like this plugin to do

-- [X] Restrict access to file editing on production sites
-- [ ] Add in a few frequently used theme helper functions
-- [ ] Monitor a temp debug log and email site admin with issues
-- [X] Allow easy insertion of GA and other analytic code

*/


/*
|--------------------------------------------------------------------------
| CONSTANTS
|--------------------------------------------------------------------------
*/

if ( !defined('RF_ADMIN_TOOLKIT_THEME_DIR') )
	define('RF_ADMIN_TOOLKIT_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());
if ( !defined('RF_ADMIN_TOOLKIT_PLUGIN_DIR') )
	define('RF_ADMIN_TOOLKIT_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
if ( !defined('RF_ADMIN_TOOLKIT_PLUGIN_URL') )
	define('RF_ADMIN_TOOLKIT_PLUGIN_URL', plugin_dir_url( __FILE__ ));
if ( !defined('RF_ADMIN_TOOLKIT_BASE_FILE') )
	define('RF_ADMIN_TOOLKIT_BASE_FILE', basename( __FILE__ ));
if ( ! defined( 'RF_ADMIN_TOOLKIT_BASE_DIR' ) )
	define( 'RF_ADMIN_TOOLKIT_BASE_DIR', dirname( __FILE__ ) );
if ( !defined('RF_ADMIN_TOOLKIT_PREFIX') )
	define('RF_ADMIN_TOOLKIT_PREFIX', 'rf_admin_toolkit');
if ( !defined('RF_ADMIN_TOOLKIT_VERSION_KEY') )
	define('RF_ADMIN_TOOLKIT_VERSION_KEY', 'rf_admin_toolkit_version');
if ( !defined('RF_ADMIN_TOOLKIT_VERSION_NUM') )
	define('RF_ADMIN_TOOLKIT_VERSION_NUM', '0.1.0');
if ( !defined('RF_ADMIN_TOOLKIT_DEBUG') )
	define('RF_ADMIN_TOOLKIT_DEBUG', true);

/*
|--------------------------------------------------------------------------
| PLUGIN CLASS
|--------------------------------------------------------------------------
*/

if(!class_exists('RF_Admin_Toolkit'))
{
	class RF_Admin_Toolkit
	{


	/**
	* Construct the plugin object
	*/
	public function __construct()
	{
		// Require Settings
		require_once(sprintf("%s/www/settings.php", RF_ADMIN_TOOLKIT_BASE_DIR));

		// Add custom plugin functions
		require_once(sprintf("%s/lib/actions.class.php", RF_ADMIN_TOOLKIT_BASE_DIR));
		require_once(sprintf("%s/lib/filters.class.php", RF_ADMIN_TOOLKIT_BASE_DIR));
		require_once(sprintf("%s/lib/ajax.class.php", RF_ADMIN_TOOLKIT_BASE_DIR));
		require_once(sprintf("%s/lib/utils.class.php", RF_ADMIN_TOOLKIT_BASE_DIR));
		require_once(sprintf("%s/lib/form.class.php", RF_ADMIN_TOOLKIT_BASE_DIR));

	} // END public function __construct

	/**
	* Activate the plugin
	*/
	public static function activate()
	{
		if( get_option(RF_ADMIN_TOOLKIT_VERSION_KEY) != RF_ADMIN_TOOLKIT_VERSION_NUM ) {

			update_option( RF_ADMIN_TOOLKIT_VERSION_KEY, RF_ADMIN_TOOLKIT_VERSION_NUM );

		}

	} // END public static function activate

	/**
	* Deactivate the plugin
	*/
	public static function deactivate()
	{

		// Do nothing
	} // END public static function deactivate

	} // END class RF_Admin_Toolkit
} // END if(!class_exists('RF_Admin_Toolkit'))

if(class_exists('RF_Admin_Toolkit'))
{
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('RF_Admin_Toolkit', 'activate'));
	register_deactivation_hook(__FILE__, array('RF_Admin_Toolkit', 'deactivate'));

	// instantiate the plugin class
	$rf_admin_toolkit = new RF_Admin_Toolkit();

	if(isset($rf_admin_toolkit))
	{

		/*
		|--------------------------------------------------------------------------
		| PLUGIN SETTINGS
		|--------------------------------------------------------------------------
		*/

		$RF_Admin_Toolkit_Settings = new RF_Admin_Toolkit_Settings();

		// Check if Disable Editing in Dashboard
		if ( in_array( 'restrict_edit', get_option( RF_ADMIN_TOOLKIT_PREFIX . '_modules', array() ) ) ) {
			if( !defined('DISALLOW_FILE_EDIT') ){
				define( 'DISALLOW_FILE_EDIT', true );
			}
		}

		/*
		|--------------------------------------------------------------------------
		| Custom WordPress Functions
		|--------------------------------------------------------------------------
		*/

	} // End if Plugin Active

} // End Plugin Class

?>

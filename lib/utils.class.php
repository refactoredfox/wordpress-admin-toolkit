<?php
/**
 * Utility Class for this plugin.
 *
 * @package WordPress Admin Toolkit
 */

// Don't load directly
if ( !defined( 'ABSPATH' ) ) die( '-1' );

if ( !class_exists( 'RF_Admin_Toolkit_Utils' ) ) {

	class RF_Admin_Toolkit_Utils {

		/**
		 * Pull a particular property from each assoc. array in a numeric array,
		 * returning and array of the property values from each item.
		 *
		 *  @param  array  $a    Array to get data from
		 *  @param  string $prop Property to read
		 *  @return array        Array of property values
		 */
		public static function pluck ( $a, $prop )
		{
			$out = array();

			for ( $i=0, $len=count($a) ; $i<$len ; $i++ ) {
				$out[] = $a[$i][$prop];
			}

			return $out;
		}

	}

}

?>

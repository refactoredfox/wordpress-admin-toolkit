<?php
/**
 * WP Widgets Class for this plugin.
 *
 * @package WordPress Admin Toolkit
 */

// Don't load directly
if ( !defined( 'ABSPATH' ) ) die( '-1' );

if(!function_exists("rf_admin_toolkit_register_widget"))
{
	function rf_admin_toolkit_register_widget()
	{
		register_widget( 'RF_Admin_Toolkit_Widget' );
	}
}

add_action( 'widgets_init', 'rf_admin_toolkit_register_widget' );

if(!class_exists("RF_Admin_Toolkit_Widget")){

	class RF_Admin_Toolkit_Widget extends WP_Widget {

		/**
		* Constructor
		*/
		function __construct() {

			$description = __('WordPress Admin Toolkit Widget - Displays a blank widget template', RF_ADMIN_TOOLKIT_PREFIX);

			parent::__construct(
				'rf_admin_toolkit_widget', // Base ID
				__( 'WordPress Admin Toolkit Widget', RF_ADMIN_TOOLKIT_PREFIX ), // Name
				array( 'classname' => 'rf-admin-toolkit-widget', 'description' => $description ) // Args
			);
		}

		/**
		 * Widget Display
		 *
		 * @param array $args
		 * @param array $instance
		 */
		function widget($args, $instance) {
			extract( $args );

			$before_widget = '<div>';
			$after_widget .= '</div>';

			$before_title = '<header>'.$before_title;
			$after_title .= '</header>';

			echo $before_widget;
			$title = apply_filters('widget_title', $instance['title'] );

			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
				?>

				<?php
			echo $after_widget;
		}

		/**
		 * Widget Update
		 *
		 * @param array $new_instance
		 * @param array $old_instance
		 *
		 * @return array
		 */
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance["title"] = strip_tags( $new_instance["title"] );

			return $instance;
		}

		/**
		 * Widget Form Creation
		 *
		 * @param array $instance
		 *
		 * @return string|void
		 */
		function form($instance) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '' ));
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', RF_ADMIN_TOOLKIT_PREFIX); ?>:</label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />
			</p>
		<?php
		}

		/**
		* Additional Widget Functions
		*/

	}

}
?>

<?php
/**
 * WP Actions Class for this plugin.
 *
 * @package WordPress Admin Toolkit
 */

if ( !defined( 'ABSPATH' ) ) die( '-1' );

if(!class_exists('RF_Admin_Toolkit_Actions'))
{
	class RF_Admin_Toolkit_Actions
	{

		/**
		* Start up
		*/
		public function __construct()
		{
			// Plugin Actions
			add_action( 'plugins_loaded', array( 'RF_Admin_Toolkit_Templates', 'get_instance' ) );
			add_action( 'wp_head', array( $this, 'display_ga_code'), 10 );
		}

		// GA Code Script
		function display_ga_code() {

			$ga_id = get_option(RF_ADMIN_TOOLKIT_PREFIX . '_gacode');

			if( !empty($ga_id) ): ?>

			<?php ob_start(); ?>

				<script type="text/javascript">
					var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
					document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
				</script>

				<script type="text/javascript">
					try {var pageTracker = _gat._getTracker("");

						pageTracker._trackPageview();
					} catch(err) {}
				</script>

				<script>
					 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

					 ga('create', '<?php echo $ga_id; ?>', 'auto');
					 ga('send', 'pageview');

				</script>

			<?php
				echo ob_get_contents();
				ob_end_clean();

			endif;

		}

	} // End RF_Admin_Toolkit_Actions Class

	/**
	 * Set the actions on load
	 */
	$RF_Admin_Toolkit_Actions = new RF_Admin_Toolkit_Actions();

}// End RF_Admin_Toolkit_Actions If Active

?>

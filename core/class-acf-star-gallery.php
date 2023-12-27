<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Acf_Star_Gallery' ) ) :

	/**
	 * Main Acf_Star_Gallery Class.
	 *
	 * @package		ACFSTARGAL
	 * @subpackage	Classes/Acf_Star_Gallery
	 * @since		1.0.0
	 * @author		Starfish Host
	 */
	final class Acf_Star_Gallery {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Acf_Star_Gallery
		 */
		private static $instance;

		/**
		 * ACFSTARGAL helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Acf_Star_Gallery_Helpers
		 */
		public $helpers;

		/**
		 * ACFSTARGAL settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Acf_Star_Gallery_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'acf-star-gallery' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'acf-star-gallery' ), '1.0.0' );
		}

		/**
		 * Main Acf_Star_Gallery Instance.
		 *
		 * Insures that only one instance of Acf_Star_Gallery exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Acf_Star_Gallery	The one true Acf_Star_Gallery
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Acf_Star_Gallery ) ) {
				self::$instance					= new Acf_Star_Gallery;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Acf_Star_Gallery_Helpers();
				self::$instance->settings		= new Acf_Star_Gallery_Settings();

				//Fire the plugin logic
				new Acf_Star_Gallery_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'ACFSTARGAL/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once ACFSTARGAL_PLUGIN_DIR . 'core/includes/classes/class-acf-star-gallery-helpers.php';
			require_once ACFSTARGAL_PLUGIN_DIR . 'core/includes/classes/class-acf-star-gallery-settings.php';

			require_once ACFSTARGAL_PLUGIN_DIR . 'core/includes/classes/class-acf-star-gallery-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'acf-star-gallery', FALSE, dirname( plugin_basename( ACFSTARGAL_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.
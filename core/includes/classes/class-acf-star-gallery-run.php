<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Acf_Star_Gallery_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		ACFSTARGAL
 * @subpackage	Classes/Acf_Star_Gallery_Run
 * @author		Starfish Host
 * @since		1.0.0
 */
class Acf_Star_Gallery_Run{

	/**
	 * Our Acf_Star_Gallery_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_front_scripts_and_styles' ), 20 );
		add_shortcode('ACF_GALLERY', array($this, 'add_gallery_shortcode'));
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */





	/**
	* Adds action links to the plugin list table
	*
	* @access	public
	* @since	1.0.0
	*
	* @param	array	$links An array of plugin action links.
	*
	* @return	array	An array of plugin action links.
	*/
	public function add_plugin_action_link( $links ) {

		$links['our_shop'] = sprintf( '<a href="%s" title="Custom Link" style="font-weight:700;">%s</a>', 'https://test.test', __( 'Custom Link', 'acf-star-gallery' ) );

		return $links;
	}

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		wp_enqueue_style( 'acfstargal-backend-styles', ACFSTARGAL_PLUGIN_URL . 'core/includes/assets/css/backend-styles.css', array(), ACFSTARGAL_VERSION, 'all' );
		wp_enqueue_script( 'acfstargal-backend-scripts', ACFSTARGAL_PLUGIN_URL . 'core/includes/assets/js/backend-scripts.js', array(), ACFSTARGAL_VERSION, false );
		wp_localize_script( 'acfstargal-backend-scripts', 'acfstargal', array(
			'plugin_name'   	=> __( ACFSTARGAL_NAME, 'acf-star-gallery' ),
		));
	}

	public function enqueue_front_scripts_and_styles() {
		wp_enqueue_style( 'acfstargal-front-slick-styles', ACFSTARGAL_PLUGIN_URL . 'core/includes/assets/css/slick.css', array(), ACFSTARGAL_VERSION, 'all' );
		wp_enqueue_style( 'acfstargal-front-slick-theme-styles', ACFSTARGAL_PLUGIN_URL . 'core/includes/assets/css/slick-theme.css', array(), ACFSTARGAL_VERSION, 'all' );
		wp_enqueue_script( 'acfstargal-front-slick-scripts', ACFSTARGAL_PLUGIN_URL . 'core/includes/assets/js/slick.min.js', array(), ACFSTARGAL_VERSION, false );
		wp_enqueue_script( 'acfstargal-front-slick-setting-scripts', ACFSTARGAL_PLUGIN_URL . 'core/includes/assets/js/slick-setting.js', array(), ACFSTARGAL_VERSION, false );
		wp_localize_script( 'acfstargal-front-scripts', 'acfstargal', array(
			'plugin_name'   	=> __( ACFSTARGAL_NAME, 'acf-star-gallery' ),
		));
	}




	public function add_gallery_shortcode($atts){
		$default = array(
				'key' => '0',
			);
			$a = shortcode_atts($default, $atts);

			$gallery_id = $a['key'];
			$size ='large'

		
		?>
			
			<div class="slick-carousel" id="slick-carousel-container">
			
			<?php
				$images = get_field($gallery_id);
				if( $images ): 
					foreach( $images as $image ): ?>
					<div class="slick-content">
						<img class="slick-content-img" src="<?php echo esc_url($image['sizes'][$size]); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					</div>
					<?php
					endforeach;
				endif;
				?>
			
			</div>
			<?php


		}




}

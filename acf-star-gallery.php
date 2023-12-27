<?php
/**
 * ACF Star Gallery
 *
 * @package       ACFSTARGAL
 * @author        Starfish Host
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   ACF Star Gallery
 * Plugin URI:    https://github.com/Starfish-Host/acf-carrousel.git
 * Description:   A simple ACF image gallery plugin, created with Slick
 * Version:       1.0.0
 * Author:        Starfish Host
 * Author URI:    https://anton.agency
 * Text Domain:   acf-star-gallery
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with ACF Star Gallery. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'ACFSTARGAL_NAME',			'ACF Star Gallery' );

// Plugin version
define( 'ACFSTARGAL_VERSION',		'1.0.0' );

// Plugin Root File
define( 'ACFSTARGAL_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'ACFSTARGAL_PLUGIN_BASE',	plugin_basename( ACFSTARGAL_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'ACFSTARGAL_PLUGIN_DIR',	plugin_dir_path( ACFSTARGAL_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'ACFSTARGAL_PLUGIN_URL',	plugin_dir_url( ACFSTARGAL_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once ACFSTARGAL_PLUGIN_DIR . 'core/class-acf-star-gallery.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Starfish Host
 * @since   1.0.0
 * @return  object|Acf_Star_Gallery
 */
function ACFSTARGAL() {
	return Acf_Star_Gallery::instance();
}

ACFSTARGAL();

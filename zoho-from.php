<?php
/**
* Plugin Name:       Zoho From
* Description:       A test API from plugin
* Version:           1.0.0
* Requires at least: 5.0
* Requires PHP:      7.0
* Author:            Osman
* Author URI:        https://www.linkedin.com/in/osman-haider-adnan/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	die( 'Please run `composer install` on wp-content/plugins/zoho-from directory.' );
}

require_once __DIR__ . '/vendor/autoload.php';


final class Zoho_From {

	const VERSION = '1.0.0';

	protected static $instance = null;

	/**
	 * Initialize plugin
	 */
	public static function init() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
 	}

 	/**
	 * Constructor
	 */
 	private function __construct() {
		$this->define_constants();		
		$this->run_admin_classes();
		$this->run_front_classes();
 	}

	/**
	 * Define necessary constants
	 */
	private function define_constants() {
 		define( 'ZFT__FILE__', __FILE__ );
 		define( 'ZFT_DIR_PATH', plugin_dir_path( __FILE__ ) );
 		define( 'ZFT_DIR_URL', plugin_dir_url( __FILE__ ) );
	}

	/**
	 * Initialize admin classes
	 */
	private function run_admin_classes() {
		new ZFT\Admin\Menu();
		new ZFT\Admin\Ajax();
	}

	/**
	 * Initialize admin classes
	 */
	private function run_front_classes() {
		new ZFT\Front\Shortcode();
		new ZFT\Front\Enqueue();
	}

}

// Start from here.
Zoho_From::init();

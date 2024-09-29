<?php
/**
 * Plugin Name:       Element Bucket Lite for Elementor
 * Plugin URI:        https://elementbucket.com/
 * Description:       A premium widget bucket for elementor.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            CodexShaper
 * Author URI:        https://codexshaper.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       cs-element-bucket-lite
 * Domain Path:       /languages
 *
 * @package ElementBucketLite
 *
 * Elementor tested up to: 3.23.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'CS_ELEMENT_BUCKET_LITE_VERSION', '1.0.0' );
define( 'CS_ELEMENT_BUCKET_LITE_CLI', true );

define( 'CS_ELEMENT_BUCKET_LITE__FILE__', __FILE__ );
define( 'CS_ELEMENT_BUCKET_LITE_PLUGIN_BASE', plugin_basename( CS_ELEMENT_BUCKET_LITE__FILE__ ) );
define( 'CS_ELEMENT_BUCKET_LITE_PATH', plugin_dir_path( CS_ELEMENT_BUCKET_LITE__FILE__ ) );
define( 'CS_ELEMENT_BUCKET_LITE_ASSETS_PATH', CS_ELEMENT_BUCKET_LITE_PATH . 'assets/' );
define( 'CS_ELEMENT_BUCKET_LITE_MODULES_PATH', CS_ELEMENT_BUCKET_LITE_PATH . 'modules/' );
define( 'CS_ELEMENT_BUCKET_LITE_URL', plugins_url( '/', CS_ELEMENT_BUCKET_LITE__FILE__ ) );
define( 'CS_ELEMENT_BUCKET_LITE_ASSETS_URL', CS_ELEMENT_BUCKET_LITE_URL . 'assets/' );
define( 'CS_ELEMENT_BUCKET_LITE_MODULES_URL', CS_ELEMENT_BUCKET_LITE_URL . 'modules/' );

define( 'CS_ELEMENT_BUCKET_LITE_MODULE_PREFIX', 'eb-module' );
define( 'CS_ELEMENT_BUCKET_LITE_WIDGET_PREFIX', 'eb-widget' );

/**
 * Load gettext translate for our text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_cs_element_bucket_lite_plugin() {

	require_once trailingslashit( CS_ELEMENT_BUCKET_LITE_PATH ) . 'vendor/autoload.php';
	require_once trailingslashit( CS_ELEMENT_BUCKET_LITE_PATH ) . 'inc/helpers.php';

	if ( class_exists( 'CodexShaper\ElementBucketLite\Plugin' ) ) {
		CodexShaper\ElementBucketLite\Plugin::instance();
	}

	if ( class_exists( 'CodexShaper\ElementBucketLite\Managers\ConsoleManager' ) ) {
		CodexShaper\ElementBucketLite\Managers\ConsoleManager::instance();
	}
}

add_action( 'plugins_loaded', 'load_cs_element_bucket_lite_plugin' );

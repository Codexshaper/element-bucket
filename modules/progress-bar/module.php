<?php
/**
 * Module module file
 *
 * @category   Module
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Modules\ProgressBar;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use CodexShaper\ElementBucketLite\Base\Module as BaseModule;

/**
 * Module module class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
class Module extends BaseModule {

	/**
	 * Get module name.
	 *
	 * Retrieve the module name.
	 *
	 * @since 1.7.0
	 * @access public
	 *
	 * @return string Module name.
	 */
	public function get_name() {
		return 'eb-module-progress-bar';
	}

	/**
	 * Get the module's associated widgets.
	 *
	 * @return string[]
	 */
	public function get_widgets() {
		return array(
			'Progress_Bar',
		);
	}

	/**
	 * Register styles.
	 *
	 * `/assets/css/eb-eb-widget-progress-bar.min.css`.
	 *
	 * @return void
	 */
	public function register_styles() {
		wp_register_style(
			'eb-widget-progress-bar',
			$this->get_css_assets_url( 'eb-widget-progress-bar', null, true, true ),
			array(),
			ELEMENT_BUCKET_LITE_VERSION
		);
	}
}
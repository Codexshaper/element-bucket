<?php
/**
 * Base Module file
 *
 * @category   Base
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Base;

use Elementor\Core\Base\Module as BaseModule;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Base module class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
abstract class Module extends BaseModule {

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();

		add_action( 'elementor/frontend/after_register_styles', array( $this, 'register_styles' ) );
	}

	/**
	 * Get asset base url
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string
	 */
	public function get_assets_base_url(): string {
		return ELEMENT_BUCKET_LITE_URL;
	}

	/**
	 * Regsiter styles for current module.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return mixed
	 */
	public function register_styles() {}
}

<?php
/**
 * Base Widget file
 *
 * @category   Base
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Base;

use Elementor\Widget_Base;
use CodexShaper\ElementBucketLite\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Base widget class for element bucket
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
abstract class Widget extends Widget_Base {

	/**
	 * Get categories
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array
	 */
	public function get_categories() {
		return Plugin::get_categories();
	}

	/**
	 * Widget activation
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return bool
	 */
	public function is_active() {
		return true;
	}
}

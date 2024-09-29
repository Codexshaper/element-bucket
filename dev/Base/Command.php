<?php
/**
 * Base Command file
 *
 * @category   Base
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Base command class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
abstract class Command {

	/**
	 * List of items
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array list of items.
	 */
	protected $args = array();

	/**
	 * List of options
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array list of options.
	 */
	protected $assoc_args = array();

	/**
	 * Invoke
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $args list of items.
	 * @param array $assoc_args list of options.
	 *
	 * @return void
	 */
	public function __invoke( $args, $assoc_args ) {
		$this->args       = $args;
		$this->assoc_args = $assoc_args;
		$this->handle();
	}

	/**
	 * Handle Command
	 *
	 * @since 1.0.0
	 * @access public
	 * @abstract
	 *
	 * @return mixed
	 */
	abstract public function handle();
}

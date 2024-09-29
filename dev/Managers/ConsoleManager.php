<?php
/**
 * Console manager file
 *
 * @category   Manager
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Managers;

use CodexShaper\ElementBucketLite\Commands\ModuleMake;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Console manager class
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
class ConsoleManager {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var \CodexShaper\ElementBucketLite\Managers\ConsoleManager The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Commands
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @var array List of commands.
	 */
	protected $commands = array(
		ModuleMake::class,
	);

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 * @static
	 *
	 * @return \CodexShaper\ElementBucketLite\Managers\ConsoleManager An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

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
		if ( ELEMENT_BUCKET_LITE_CLI === true && defined( 'WP_CLI' ) && WP_CLI ) {
			$this->register_commands();
		}
	}

	/**
	 * Register commands
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_commands() {
		foreach ( $this->commands as $command ) {

			if ( class_exists( $command ) ) {
				$new_command = new $command();
				\WP_CLI::add_command( $new_command->name, $new_command );
			}
		}
	}
}

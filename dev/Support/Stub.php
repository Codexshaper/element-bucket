<?php
/**
 * Stub support file
 *
 * @category   Support
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucketLite\Support;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Stub Class for handling command template
 *
 * @category   Class
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */
class Stub {

	/**
	 * The stub path.
	 *
	 * @var string
	 */
	protected $path;

	/**
	 * The base path of stub file.
	 *
	 * @var null|string
	 */
	protected static $base_path = null;

	/**
	 * The replacements array.
	 *
	 * @var array
	 */
	protected $replaces = array();

	/**
	 * Constructor
	 *
	 * Perform some compatibility checks to make sure basic requirements are meet.
	 * If all compatibility checks pass, initialize the functionality.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $path the file path.
	 * @param array  $replaces the replaces array.
	 *
	 * @return void
	 */
	public function __construct( $path, array $replaces = array() ) {
		$this->path     = $path;
		$this->replaces = $replaces;
	}

	/**
	 * Create new self instance.
	 *
	 * @param string $path the file path.
	 * @param array  $replaces the replaces array.
	 *
	 * @return self
	 */
	public static function create( $path, array $replaces = array() ) {
		return new static( $path, $replaces );
	}

	/**
	 * Set stub path.
	 *
	 * @param string $path the path.
	 *
	 * @return self
	 */
	public function set_path( $path ) {
		$this->path = $path;

		return $this;
	}

	/**
	 * Get stub path.
	 *
	 * @return string
	 */
	public function get_path() {
		$path = static::get_base_path() . $this->path;

		return file_exists( $path ) ? $path : __DIR__ . '/../stubs/' . ltrim( $this->path, '/' );
	}

	/**
	 * Set base path.
	 *
	 * @param string $path the base path.
	 */
	public static function set_base_path( $path ) {
		static::$base_path = $path;
	}

	/**
	 * Get base path.
	 *
	 * @return string|null
	 */
	public static function get_base_path() {
		return static::$base_path;
	}

	/**
	 * Get stub contents.
	 *
	 * @return mixed|string
	 */
	public function get_contents() {
		$contents = file_get_contents( $this->get_path() );

		foreach ( $this->replaces as $search => $replace ) {
			$contents = str_replace( '$' . strtoupper( $search ) . '$', $replace, $contents );
		}

		return $contents;
	}

	/**
	 * Get stub contents.
	 *
	 * @return string
	 */
	public function render() {
		return $this->get_contents();
	}

	/**
	 * Save stub to specific path.
	 *
	 * @param string $path the destination path.
	 * @param string $filename the destination filename.
	 *
	 * @return bool
	 */
	public function save_to( $path, $filename ) {
		return file_put_contents( $path . '/' . $filename, $this->get_contents() );
	}

	/**
	 * Set replacements array.
	 *
	 * @param array $replaces the replaces array.
	 *
	 * @return $this
	 */
	public function replace( array $replaces = array() ) {
		$this->replaces = $replaces;

		return $this;
	}

	/**
	 * Get replacements.
	 *
	 * @return array
	 */
	public function get_replaces() {
		return $this->replaces;
	}

	/**
	 * Handle magic method __toString.
	 *
	 * @return string
	 */
	public function __toString() {
		return $this->render();
	}
}

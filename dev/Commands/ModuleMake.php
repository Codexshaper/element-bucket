<?php
/**
 * Module make command file
 *
 * @category   Command
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */

namespace CodexShaper\ElementBucket\Commands;

use CodexShaper\ElementBucket\Base\Command;
use CodexShaper\ElementBucket\Support\Stub;

if ( ! defined( 'ABSPATH' ) ) {
	exit(); // exit if access directly.
}

/**
 * Module make command class to generate module
 *
 * @category   Class
 * @package    ElementBucket
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://github.com/codexshaper/element-bucket
 * @since      1.0.0
 */
class ModuleMake extends Command {

	/**
	 * Name
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @var string The command name.
	 */
	public $name = 'eb-module:make';

	/**
	 * Handle Command
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function handle() {

		foreach ( $this->args as $arg ) {

			$module             = strtolower( $arg );
			$module_dir         = trailingslashit( CS_ELEMENT_BUCKET_PATH ) . "modules/{$module}";
			$module_widgets_dir = trailingslashit( CS_ELEMENT_BUCKET_PATH ) . "modules/{$module}/widgets";
			$widgets_css_dir    = trailingslashit( CS_ELEMENT_BUCKET_PATH ) . 'assets/css';

			if ( ! is_dir( $module_widgets_dir ) ) {
				wp_mkdir_p( $module_widgets_dir );
				\WP_CLI::success( "The module {$module}'s module directory has been created at $module_dir this location." );
				\WP_CLI::success( "The module {$module}'s widgets directory has been created at $module_widgets_dir this location." );
			}

			$title                           = ucwords( str_replace( '-', ' ', $module ) );
			$class_name                      = str_replace( ' ', '_', $title );
			$module_name                     = str_replace( ' ', '', $title );
			$module_namespace                = 'CodexShaper\ElementBucket\Modules\\' . $module_name;
			$widget_namespace                = 'CodexShaper\ElementBucket\Modules\\' . $module_name . '\Widgets';
			$module_stub_name                = 'module';
			$widget_stub_name                = 'widget';
			$cs_element_bucket_module_prefix = defined( 'CS_ELEMENT_BUCKET_MODULE_PREFIX' ) ? CS_ELEMENT_BUCKET_MODULE_PREFIX . '-' : '';
			$cs_element_bucket_widget_prefix = defined( 'CS_ELEMENT_BUCKET_WIDGET_PREFIX' ) ? CS_ELEMENT_BUCKET_WIDGET_PREFIX . '-' : '';

			if ( key_exists( 'skip-css', $this->assoc_args ) || key_exists( 'skip:css', $this->assoc_args ) ) {
				$module_stub_name .= '-skip-css';
				$widget_stub_name .= '-skip-css';
			}

			( new Stub(
				"{$module_stub_name}.stub",
				array(
					'NAMESPACE'    => $module_namespace,
					'CLASS'        => 'Module',
					'WIDGET_CLASS' => $class_name,
					'MODULE_NAME'  => $cs_element_bucket_module_prefix . $module,
					'WIDGET_NAME'  => $cs_element_bucket_widget_prefix . $module,
				)
			) )->save_to( $module_dir, 'module.php' );

			\WP_CLI::success( "The module {$module}'s module file has been created at {$module_dir}/module.php this location." );

			( new Stub(
				"{$widget_stub_name}.stub",
				array(
					'NAMESPACE'   => $widget_namespace,
					'CLASS'       => $class_name,
					'WIDGET_NAME' => $cs_element_bucket_widget_prefix . $module,
					'TITLE'       => $title,
				)
			) )->save_to( $module_widgets_dir, $module . '.php' );

			\WP_CLI::success( "The module {$module}'s widget file has been created at {$module_widgets_dir}/{$module}.php this location." );

			if ( ! key_exists( 'skip-css', $this->assoc_args ) && ! key_exists( 'skip:css', $this->assoc_args ) ) {
				( new Stub(
					'css.stub',
					array(
						'CLASS'       => $class_name,
						'WIDGET_NAME' => $cs_element_bucket_widget_prefix . $module,
						'TITLE'       => $title,
					)
				) )->save_to( $widgets_css_dir, $cs_element_bucket_widget_prefix . $module . '.min.css' );

				\WP_CLI::success( "The module {$module}'s css file has been created at {$widgets_css_dir}/{$cs_element_bucket_widget_prefix}{$module}.min.css this location." );
			}
		}
	}
}

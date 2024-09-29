<?php
/**
 * Helper functions file
 *
 * @category   Helper
 * @package    ElementBucketLite
 * @author     CodexShaper <info@codexshaper.com>
 * @license    https://www.gnu.org/licenses/gpl-2.0.html
 * @link       https://elementbucket.com
 * @since      1.0.0
 */

use CodexShaper\ElementBucketLite\Plugin;

/**
 * Get core plugin instance
 *
 * @return Plugin instance.
 */
function get_element_bucket_lite_plugin() {
	return Plugin::instance();
}

/**
 * Get core plugin instance
 *
 * @param string $path The asset path.
 *
 * @return string The asset url.
 */
function get_eb_asset( $path ) {
	return Plugin::asset_url( $path );
}

/**
 * Get svg rules
 *
 * @return array The svg rules.
 */
function get_eb_svg_rules() {

	return array_merge(
		// Default option.
		wp_kses_allowed_html( 'post' ),
		// SVG options.
		array(
			'svg'   => array(
				'class'           => true,
				'aria-hidden'     => true,
				'aria-labelledby' => true,
				'role'            => true,
				'xmlns'           => true,
				'width'           => true,
				'height'          => true,
				'viewbox'         => true,
			),
			'g'     => array( 'fill' => true ),
			'title' => array( 'title' => true ),
			'path'  => array(
				'd'    => true,
				'fill' => true,
			),
		),
	);
}

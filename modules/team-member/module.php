<?php
/**
 * Module for Team Member functionality.
 *
 * This file defines the Team Member module, which is a part of the ElementBucketLite plugin.
 * It registers styles and provides metadata about the module.
 *
 * @package ElementBucketLite\Modules\TeamMember
 */

namespace CodexShaper\ElementBucketLite\Modules\TeamMember;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use CodexShaper\ElementBucketLite\Base\Module as BaseModule;

/**
 * Class Module
 *
 * Handles the Team Member module functionality, including registering styles and defining widget information.
 *
 * @package ElementBucketLite\Modules\TeamMember
 * @since 1.0.0
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
		return 'eb-module-team-member';
	}

	/**
	 * Get the module's associated widgets.
	 *
	 * @return string[]
	 */
	public function get_widgets() {
		return array(
			'Team_Member',
		);
	}

	/**
	 * Register styles.
	 *
	 * `/assets/css/eb-eb-widget-team-member.min.css`.
	 *
	 * @return void
	 */
	public function register_styles() {
		wp_register_style(
			'eb-widget-team-member',
			$this->get_css_assets_url( 'eb-widget-team-member', null, true, true ),
			array(),
			ELEMENT_BUCKET_LITE_VERSION
		);
	}
}
